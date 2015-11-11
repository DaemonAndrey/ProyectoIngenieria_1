<?php

App::uses('AppController', 'Controller');

class CartsController extends AppController
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
        $this->Cart->recursive = 0;

        // Muestra todos los carritos
        $this->set('carts', $this->Cart->find('all'));
    }

    public function add()
    {
        // Por si falla el INSERT
        try
        {
            // Si el método que se utiliza es post
            if( $this->request->is('post') )
            {
                // Se crea el nuevo carrito
                $this->Cart->create();

                // Si se pudo agregar el carrito
                if( $this->Cart->save($this->request->data) )
                {
                    // Se pone un mensaje indicando que se creó el carrito exitosamente
                    $this->Flash->set(__('The cart has been created successfully!'));

                    // Se redirige a la página principal de este controlador
                    return $this->redirect( array( 'action' => 'index' ) );
                }
                else
                {
                    $this->Flash->set(__('The has been an error while we were trying to create your cart!'));
                    return $this->redirect( array('action' => 'index' ) );
                }
            }
        }
        catch( Exception $e )
        {
            // Si la excepción es por PRIMARY KEY
            if( $e->getCode() == 23000 )
            {
                // Se pone un mensaje indicando que ya existe un carrito con ese id
                $this->Flash->set(__('¡There is already an existent cart!'));
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
                //La siguiente consulta es para verificar si el usuario ya tiene un carrito o no.
               $user = $this->Cart->find('all', array('recursive'=>-1,'fields'=>array('Cart.user_id'), 'conditions'=>array('Cart.user_id'=>$this->request->data['user_id'])));

               if(count($user) == 0)
               {
                   $this->Cart->create();

                   if ($this->Cart->save($this->request->data))
                   {
                       //Ahora obtenemos el carrito del usuario para guardarlo en el session
                       $cartId = $this->Cart->field('id',array('user_id' => $this->request->data['user_id']));
                       $_SESSION['Auth']['User']['cart'] = $cartId;
                       $this->set('id',$cartId);
                       $this->addToCart($this->request->data);
                   }
                   else
                   {
                       throw new Exception('Exception');
                       render('view');
                   }


               }
               else
               {
                   $this->addToCart($this->request->data);
               }

              $this->render('success');
            }
            catch (Exception $e)
            {
            }
        }
    }

	public function addToCart($data)
    {
        $user = $this->Cart->field('id',array('user_id' => $this->request->data['user_id']));

        $this->loadModel('CartProduct');
        $this->CartProduct->id = $this->CartProduct->field(	'id',
															array('product_id'=> $data['product_id'],
															'cart_id'=>$user)
														);

        if($this->CartProduct->id)
        {
            $this->CartProduct->saveField('quantity', $data['quantity']);
        }
        else
        {
            $finalData = array(	'cart_id' => $user,
								'product_id' => $data['product_id'],
								'quantity' => $data['quantity']
							);
            try
            {
                $this->CartProduct->save($finalData);

            }
            catch (Exception $e)
            {
                throw new Exception('Exception');
            }
        }
    }

    public function delete( $id = null )
    {
        // Si se intenta utilizar el método get para hacer la eliminación
        if( $this->request->is('get') )
        {
            throw new MethodNotAllowedException();
        }

        // Si se pudo eliminar el carrito
        if( $this->Cart->delete( $id ) )
        {
            // Se pone un mensaje indicando que se eliminó el carrito exitosamente
            $this->Flash->success(__('The cart has been eliminated successfully!'));
        }
        // Si no se pudo eliminar el carrito
        else
        {
            // Se pone un mensaje indicando que no se pudo eliminar el carrito
            $this->Flash->error(__('There has been an error while we were trying to delete your cart!'));
        }

        // Se redirige a la página principal de este controlador
        return $this->redirect( array( 'action' => 'index' ) );
    }

	public function editCartProduct( $idCartProduct = null )
    {
        if( !$idCartProduct )
        {
            throw new NotFoundException(__('Invalid request!'));
        }

        $this->loadModel('CartProduct');
        $cartProduct = $this->CartProduct->findById( $idCartProduct );
        $idCart = $cartProduct['Cart']['id'];
        //$quantity = $cartProduct['quantity'];

        if( !$cartProduct )
        {
            throw new NotFoundException(__('Invalid product!'));
        }

        if( $this->request->is( array('post', 'put') ) )
        {
            //if( $this->CartProduct->save( $this->request->data, false ) )
            $data = $this->request->data;
            $this->CartProduct->id = $idCartProduct;

            if( $this->CartProduct->saveField('quantity', $data['CartProduct']['quantity']) )
            {
                $this->Flash->success(__('Quantity of the product updated!'));
                return $this->redirect( array( 'action' => 'edit', $idCart ) );
            }
            else
            {
                $this->Flash->error(__('Could not update the quantity of the product'));
                return $this->redirect( array( 'action' => 'edit', $idCart ) );
            }
        }
    }

    public function edit( $id = null )
    {
        // Si no se pasa un id por parámetro
        if( !$id )
        {
			 return $this->redirect(array('controller' => 'pages', 'action'=>'home'));
        }

        // Se busca el carrito asociado a ese id
        $this->Cart->recursive = 2;
        $cart = $this->Cart->findById( $id );
        //debug($cart);

        // Si el id del carrito no es válido
        if( !$cart )
        {
            return $this->redirect(array('controller' => 'pages', 'action'=>'home'));
        }

		$this->set('post', $cart);

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
            $this->Cart->id = $id;

            // Si se pudo guardar
            if( $this->Cart->save( $this->request->data ) )
            {
                // Se pone un mensaje indicando que se editó exitosamente
                $this->Flash->success(__('The cart has been updated successfully!'));

                // Se redirige a la página principal de este controlador
                return $this->redirect(array( 'action' => 'index' ) );
            }
            // Si no se pudo guardar
            else
            {
                $this->Flash->error(__('There has been an error while we were trying to update your cart!'));
            }
        }
        else
        {
            $this->request->data = $cart;
        }

        // Si no hay datos nuevos
        if( !$this->request->data )
        {
            // Se ponen los datos que había antes
            $this->request->data = $cart;
        }
    }

    public function view( $id = null )
    {
        // Si no se pasa un id por parámetro
        if( !$id )
        {
            throw new NotFoundException(__('Invalid cart!'));
        }

        // Se busca el carrito asociado a ese id
        $cart = $this->Cart->findById( $id );

        // Si el id del carrito no es válido
        if( !$cart )
        {
            throw new NotFoundException(__('The cart you are trying to access does not exist!'));
        }

        // Si se pasa un id y es válido entonces muestra el carrito
        $this->set('post', $cart);
    }

    public function removeProductFromCart( $idCartProduct = null, $idCart = null )
    {
        // Si se intenta utilizar el método get para hacer la eliminación
        if( $this->request->is('get') )
        {
            throw new MethodNotAllowedException();
        }

        // Si el id del item en el carrito es válido
        if( $idCartProduct && $idCart )
        {
            // Se crea un ¿¿¿¿¿modelo temporal????? para CartsProducts
            $cartProduct = ClassRegistry::init('CartsProducts');

            // Si se pudo borrar el item del carrito
            if( $cartProduct->delete( $idCartProduct, false) )
            {
                // Consulta que devuelve la cantidad de items de un carrito
                $consulta = 'SELECT COUNT(cart_id) FROM carts_products WHERE cart_id = '.$idCart;
                $resultado = $cartProduct->query($consulta);

                // Cantidad de items en el carrito
                //$conditions = array('carts_products.cart_id' => $idCart);
                //$cantidad = $cartProduct->find('count', array('conditions' => $conditions));
                $cantidad = $resultado[0][0]['COUNT(cart_id)'];

                // Si ya no hay items en el carrito
                if( $cantidad == 0 )
                {
                    // Si se pudo eliminar el carrito
                    if( $this->Cart->delete( $idCart, false ) )
                    {
                        // Se redirige al home
                        return $this->redirect(array('controller' => 'products', 'action' => 'index'));
                    }
                    // Si no se pudo eliminar el carrito
                    else
                    {
                        // Se muestra un mensaje de error
                        $this->Flash->error(__('Noooo! There has been a terrible error!'));
                    }
                }
                // Si todavía quedan items en el carrito
                else
                {
                    // Se redirige a la vista del carrito
                    return $this->redirect( array( 'action' => 'edit', $idCart ) );
                }

                // Se pone un mensaje indicando que se eliminó el carrito exitosamente
                $this->Flash->success(__('The product has been removed from your cart successfully!'));
            }
            //Si no se pudo borrar el item del carrito
            else
            {
                // Se pone un mensaje indicando que no se pudo borrar el item del carrito
                $this->Flash->error(__('There has been an error while we were trying to remove this product from your cart!'));
            }
        }
        // Si el id del item en el carrito no es válido
        else
        {
            $this->Flash->error(__('There is no id!'));
        }
    }
}
?>
