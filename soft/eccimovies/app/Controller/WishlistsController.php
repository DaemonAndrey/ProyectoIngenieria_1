<?php

App::uses('AppController', 'Controller');

class WishlistsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Js');
    public $components = array('Flash','RequestHandler');

	public function beforeFilter()
	{
        parent::beforeFilter();
        $this->Auth->allow();
		$this->Auth->authError = 'Please login to view that page';
		$this->set('custom',$this->_isCustomer());
		$this->set('admin',$this->_isAdmin());
		$this->set('manager',$this->_isManager());
		$this->set('user_id', $this->Auth->User('id'));
		$this->set('username', $this->Auth->User('username'));
    }

	function _isCustomer()
	{
		$custom = FALSE;
		if ($this->Auth->User('role') == 0)
		{
			$custom = TRUE;
		}
		return $custom;
	}

	function _isAdmin()
	{
		$admin = FALSE;
		if ($this->Auth->User('role') == 1)
		{
			$admin = TRUE;
		}
		return $admin;
	}

	function _isManager()
	{
		$manager = FALSE;
		if ($this->Auth->User('role') == 2)
		{
			$manager = TRUE;
		}
		return $manager;
	}

    public function index()
    {
        $this->Wishlist->recursive = 0;

        // Muestra todos los wishlists
        $this->set('wishlists', $this->Wishlist->find('all'));
    }

    public function add()
    {
        // Por si falla el INSERT
        try
        {
            // Si el método que se utiliza es post
            if( $this->request->is('post') )
            {
                // Se crea el nuevo wishlist
                $this->Wishlist->create();

                // Si se pudo agregar el wishlist
                if( $this->Wishlist->save($this->request->data) )
                {
                    // Se pone un mensaje indicando que se creó el wishlist exitosamente
                    $this->Flash->set(__('The wishlist has been created successfully!'));

                    // Se redirige a la página principal de este controlador
                    return $this->redirect( array( 'action' => 'index' ) );
                }
                else
                {
                    $this->Flash->set(__('The has been an error while we were trying to create your Wishlist!'));
                    return $this->redirect( array('action' => 'index' ) );
                }
            }
        }
        catch( Exception $e )
        {
            // Si la excepción es por PRIMARY KEY
            if( $e->getCode() == 23000 )
            {
                // Se pone un mensaje indicando que ya existe un wishlist con ese id
                $this->Flash->set(__('¡There is already an existent Wishlist!'));
            }
            // Si la excepción es por otra cosa
            else
            {
                // Se pone un mensaje indicando que algo salió mal
                $this->Flash->set(__('Oops! Something went wrong! Try again later!'));
            }
        }
    }

	public function ajaxRequest()
    {
        if ($this->request->is('ajax'))
        {
            try
            {
                //La siguiente consulta es para verificar si el usuario ya tiene un Wishlist o no.
               $user = $this->Wishlist->find('all', array('recursive'=>-1,'fields'=>array('Wishlist.user_id'), 'conditions'=>array('Wishlist.user_id'=>$this->request->data['user_id'])));

               if(count($user) == 0)
               {
                   $this->Wishlist->create();

                   if ($this->Wishlist->save($this->request->data))
                   {
                       //Ahora obtenemos el wishlist del usuario para guardarlo en el session
                       $wishlistId = $this->Wishlist->field('id',array('user_id' => $this->request->data['user_id']));
                       $_SESSION['Auth']['User']['wishlist'] = $wishlistId;
                       $this->set('id',$wishlistId);
                       $this->addToWishlist($this->request->data);
                   }
                   else
                   {
                       throw new Exception('Exception');
                       render('view');
                   }


               }
               else
               {
                   $this->addToWishlist($this->request->data);
               }

              $this->render('success');
            }
            catch (Exception $e)
            {
            }
        }
    }

	public function addToWishlist($data)
    {
        $user = $this->Wishlist->field('id',array('user_id' => $this->request->data['user_id']));

        $this->loadModel('WishlistProduct');
        $this->WishlistProduct->id = $this->WishlistProduct->field(	'id',
															array('product_id'=> $data['product_id'],
															'wishlist_id'=>$user)
														);
        $finalData = array(	'wishlist_id' => $user,
								'product_id' => $data['product_id']
							);
            try
            {
                $this->WishlistProduct->save($finalData);

            }
            catch (Exception $e)
            {
                throw new Exception('Exception');
            } 

    }

    public function delete( $id = null )
    {
        // Si se intenta utilizar el método get para hacer la eliminación
        if( $this->request->is('get') )
        {
            throw new MethodNotAllowedException();
        }

        // Si se pudo eliminar el wishlist
        if( $this->Wishlist->delete( $id ) )
        {
            // Se pone un mensaje indicando que se eliminó el wishlist exitosamente
            $this->Flash->success(__('The wishlist has been eliminated successfully!'));
        }
        // Si no se pudo eliminar el wishlist
        else
        {
            // Se pone un mensaje indicando que no se pudo eliminar el wishlist
            $this->Flash->error(__('There has been an error while we were trying to delete your wishlist!'));
        }

        // Se redirige a la página principal de este controlador
        return $this->redirect( array( 'action' => 'index' ) );
    }

	public function editWishlistProduct( $idWishlistProduct = null )
    {
        if( !$idWishlistProduct )
        {
            throw new NotFoundException(__('Invalid request!'));
        }

        $this->loadModel('WishlistProduct');
        $wishlistProduct = $this->WishlistProduct->findById( $idWishlistProduct );
        $idWishlist = $wishlistProduct['Wishlist']['id'];

        if( !$wishlistProduct )
        {
            throw new NotFoundException(__('Invalid product!'));
        }

        if( $this->request->is( array('post', 'put') ) )
        {
            //if( $this->WishlistProduct->save( $this->request->data, false ) )
            $data = $this->request->data;
            $this->WishlistProduct->id = $idWishlistProduct;


        }
    }
    

    public function edit( $id = null )
    {
        // Si no se pasa un id por parámetro
        if( !$id )
        {
            return $this->redirect(array('controller' => 'pages', 'action'=>'home'));
        }

        // Se busca el wishlist asociado a ese id
        $this->Wishlist->recursive = 2;
        $wishlist = $this->Wishlist->findById( $id );
        $this->loadModel('Product');
		$this->set('products', $this->Product->find('all'));

        // Si el id del wishlist no es válido
        if( !$wishlist )
        {
            return $this->redirect(array('controller' => 'pages', 'action'=>'home'));
        }

		$this->set('post', $wishlist);

        // Si la solicitud se hace por medio de los métodos post o put
        if( $this->request->is('post', 'put'))
        {
            // Si se desea cancelar la acción
            if( isset($this->request->data['cancel']) )
            {
                // Se pone un mensaje indicando que se canceló la acción
                $this->Flash->success(__('The action was cancelled!'));

                // Se redirige a la página principal de este controlador
                return $this->redirect( array( 'action' => 'index' ) );
            }

            // Se pasa el id que se quiere actualizar
            $this->Wishlist->id = $id;

            // Si se pudo guardar
            if( $this->Wishlist->save( $this->request->data ) )
            {
                // Se pone un mensaje indicando que se editó exitosamente
                $this->Flash->success(__('The wishlist has been updated successfully!'));

                // Se redirige a la página principal de este controlador
                return $this->redirect(array( 'action' => 'index' ) );
            }
            // Si no se pudo guardar
            else
            {
                $this->Flash->error(__('There has been an error while we were trying to update your wishlist!'));
            }
        }
        else
        {
            $this->request->data = $wishlist;
        }

        // Si no hay datos nuevos
        if( !$this->request->data )
        {
            // Se ponen los datos que había antes
            $this->request->data = $wishlist;
        }
    }

    public function view( $id = null )
    {
        // Si no se pasa un id por parámetro
        if( !$id )
        {
            throw new NotFoundException(__('Invalid wishlist!'));
        }

        // Se busca el wishlist asociado a ese id
        $wishlist = $this->Wishlist->findById( $id );

        // Si el id del wishlist no es válido
        if( !$wishlist )
        {
            throw new NotFoundException(__('The wishlist you are trying to access does not exist!'));
        }

        // Si se pasa un id y es válido entonces muestra el wishlist
        $this->set('post', $wishlist);
    }

    public function removeProductFromWishlist( $idWishlistProduct = null, $idWishlist = null )
    {
        // Si se intenta utilizar el método get para hacer la eliminación
        if( $this->request->is('get') )
        {
            throw new MethodNotAllowedException();
        }

        // Si el id del item en el wishlist es válido
        if( $idWishlistProduct && $idWishlist )
        {
            // Se crea un ¿¿¿¿¿modelo temporal????? para WishlistsProducts
            $wishlistProduct = ClassRegistry::init('WishlistsProducts');

            // Si se pudo borrar el item del wishlist
            if( $wishlistProduct->delete( $idWishlistProduct, false) )
            {
                // Consulta que devuelve la cantidad de items de un wishlist
                $consulta = 'SELECT COUNT(wishlist_id) FROM wishlists_products WHERE wishlist_id = '.$idWishlist;
                $resultado = $wishlistProduct->query($consulta);

                $cantidad = $resultado[0][0]['COUNT(wishlist_id)'];
                // Si ya no hay items en el wishlist
                if( $cantidad == 0 )
                {
                    // Si se pudo eliminar el wishlist
                    if( $this->Wishlist->delete( $idWishlist, false ) )
                    {
                        // Se redirige al home
                        return $this->redirect(array('controller' => 'products', 'action' => 'index'));
                    }
                    // Si no se pudo eliminar el wishlist
                    else
                    {
                        // Se muestra un mensaje de error
                        $this->Flash->error(__('Noooo! There has been a terrible error!'));
                    }
                }
                // Si todavía quedan items en el wishlist
                else
                {
                    // Se redirige a la vista del wishlist
                    return $this->redirect( array( 'action' => 'edit', $idWishlist ) );
                }

                // Se pone un mensaje indicando que se eliminó el wishlist exitosamente
                $this->Flash->success(__('The product has been removed from your wishlist successfully!'));
            }
            //Si no se pudo borrar el item del wishlist
            else
            {
                // Se pone un mensaje indicando que no se pudo borrar el item del wishlist
                $this->Flash->error(__('There has been an error while we were trying to remove this product from your wishlist!'));
            }
        }
        // Si el id del item en el wishlist no es válido
        else
        {
            $this->Flash->error(__('There is no id!'));
        }
    }
}
?>
