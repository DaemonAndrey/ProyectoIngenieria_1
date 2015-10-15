<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash','Js');
    public $components = array('Flash', 'Paginator');

    // Permite que los productos se muestren por páginas
    public $paginate = array(
        'limit' => 15,
        'order' => array('Product.name' => 'asc')
    );

    // Se pasa a la vista principal de Administrar Productos
    public function admin_index()
    {
        $this->Product->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('products', $this->Paginator->paginate());
    }

    public function admin_view( $id = null )
    {
        if( !$id )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        $product = $this->Product->findById($id);

        if( !$product )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        $this->set('post', $product);
    }

    public function add()
    {
        // Por si falla el INSERT
        try
        {
            if($this->request->is('post'))
            {
                if(isset($this->request->data['cancel']))
                {
                    $this->Flash->success(__('Acción cancelada.', true));
                    return $this->redirect(array('action' => 'admin_index'));
                }

                $this->Product->create();

                // Si pudo agregar el producto
                if($this->Product->save($this->request->data))
                {
                    $this->Flash->set(__('¡Producto agregado correctamente!'));
                    return $this->redirect(array('action' => 'admin_index'));
                }
                // Si no puedo agregar el producto
                else
                {
                    throw new Exception('Exception');
                }
            }
            else 
            {
				$this->set('subcategories', $this->Product->Subcategory->find('list', array('fields' => 'subcategory_name')));
			}
        }
        catch( Exception $e )
        {
            // Si la excepción es por PRIMARY KEY
            if( $e->getCode() == 23000 )
            {
                $this->Flash->set(__('¡Este código ya está registrado!'));
            }
            // Si la excepción es por otra cosa
            else
            {
                $this->Flash->set(__('Oops! Algo ha salido mal. Inténtelo de nuevo'));
            }
        }
    }

    public function edit( $id = null )
    {
        if( !$id )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        $product = $this->Product->findById($id);
        if( !$product )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        if($this->request->is(array('post', 'put')))
        {
            if(isset($this->request->data['cancel']))
            {
                $this->Flash->success(__('Acción cancelada.', true));
                return $this->redirect(array('action' => 'admin_index'));
            }

            $this->Product->id = $id;
            if( $this->Product->save( $this->request->data ) )
            {
                $this->Flash->success(__('El producto se actualizó correctamente.'));
                return $this->redirect(array('action' => 'admin_index'));
            }
            else
            {
                debug($this->Product->validationErrors);
                $this->Flash->error(__('No se ha podido actualizar el producto.'));
            }
        }
        else
        {
            $this->request->data = $product;
			$this->set('categories', $this->Product->Category->find('list', array('fields' => 'category_name')));
			$this->set('subcategories', $this->Product->Subcategory->find('list', array('fields' => 'subcategory_name')));
        }

        if(!$this->request->data)
        {
            $this->request->data = $product;
        }
    }

    public function delete( $id = null )
    {
        if( !$id )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        if( $this->request->is('get') )
        {
            throw new MethodNotAllowedException();
        }

        $product = $this->Product->findById($id);
        if( !$product )
        {
            throw new NotFoundException(__('Producto inválido.'));
        }

        if( $this->request->is(array('post', 'put')) )
        {
            if( $this->Product->updateAll(array("enable" => "0"),array("id" => "$id")) )
            {
                $this->Flash->success(__('El producto ha sido eliminado correctamente.'));
                return $this->redirect(array('action' => 'admin_index'));
            }
            $this->Flash->error(__('No se ha podido eliminar el producto.'));
        }

        return $this->redirect(array('action' => 'admin_index'));
    }
    
    public function getByCategory() 
    {
		$category_id = $this->request->data['category'];
		$subcategories = $this->Subcategory->find('list', array(
			'conditions' => array(
				'Subcategory.category_id' => $category_id),
				'recursive' => -1
			)
		);
		$this->set('subcategories', $subcategories);
		$this->layout = 'ajax';
	}
}
?>
