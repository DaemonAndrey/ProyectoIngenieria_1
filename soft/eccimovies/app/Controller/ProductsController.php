<?php
App::uses('AppController', 'Controller');
class ProductsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash', 'Js');
	public $components = array('Flash', 'Paginator','RequestHandler');
	// Permite que los productos se muestren por páginas
	public $paginate = array(
		'limit' => 15,
		'order' => array('Product.name' => 'asc')
	);

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
	// Se pasa a la vista principal de Administrar Productos
	public function index()
	{
		$this->Product->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('products', $this->Paginator->paginate());
	}
	public function view( $id = null )
	{
		$this->loadModel('Page');

		if( !$id )
		{
			throw new NotFoundException(__('Invalid Product.'));
		}
		$product = $this->Product->findById($id);
		if( !$product )
		{
			throw new NotFoundException(__('Invalid Product.'));
		}
		$this->set('post', $product);

		$this->set('catego',$this->Page->find('all'));
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
					$this->Flash->success(__('Action canceled.', true));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Product->create();
				// Si pudo agregar el producto
				if($this->Product->save($this->request->data))
				{
					$this->Flash->set(__('New product added successfully!'));
					return $this->redirect(array('action' => 'index'));
				}
				// Si no puedo agregar el producto
				else
				{
					throw new Exception('Exception');
				}
			} else {
				$categories = $this->Product->Subcategory->Category->find('list');
				//debug($categories);
				$subcategories = $this->Product->Subcategory->find('list');
				//debug($subcategories);
				$this->set(compact('categories', 'subcategories'));
			}
		}
		catch( Exception $e )
		{
			// Si la excepción es por PRIMARY KEY
			if( $e->getCode() == 23000 )
			{
				$this->Flash->set(__('This code is already registered!'));
			}
			// Si la excepción es por otra cosa
			else
			{
				$this->Flash->set(__('Oops! Something went wrong. Try again.'));
			}
		}
	}
	public function edit( $id = null )
	{
		if( !$id )
		{
			throw new NotFoundException(__('Invalid product.'));
		}
		$product = $this->Product->findById($id);
		if( !$product )
		{
			throw new NotFoundException(__('Invalid product.'));
		}
		if($this->request->is(array('post', 'put')))
		{
			if(isset($this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Product->id = $id;
			if( $this->Product->save( $this->request->data ) )
			{
				$this->Flash->success(__('Product updated successfully.'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				//debug($this->Product->validationErrors);
				$this->Flash->error(__('Could not update product.'));
			}
		}
		else
		{
			$categories = $this->Product->Subcategory->Category->find('list');
			$subcategories = $this->Product->Subcategory->find('list');
			$this->set(compact('categories', 'subcategories'));
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id), 'recursive' => 2);
			$this->request->data = $this->Product->find('first', $options);
			$this->request->data['Product']['category_id'] = $this->request->data['Subcategory']['category_id'];
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
			throw new NotFoundException(__('Invalid product.'));
		}
		if( $this->request->is('get') )
		{
			throw new MethodNotAllowedException();
		}
		$product = $this->Product->findById($id);
		if( !$product )
		{
			throw new NotFoundException(__('Invalid product.'));
		}
		if( $this->request->is(array('post', 'put')) )
		{
			if( $this->Product->updateAll(array("enable" => "0"),array("Product.id" => "$id")) )
			{
				$this->Flash->success(__('Product deleted successfully!'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Could not delete product.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function buscar()
	{
		if($this->request->is('post'))
		{
			$condition = explode(' ', trim($this->request->data('name')));
			$condition = array_diff($condition,array(''));

			switch($this->request->data['filter'])
			{
				case "0":	//Title
					$products = $this->searchTitle($condition);
					break;

				case "1":	//Actor
					$products = $this->searchActor($condition);
					break;

				case "2":	//Director
					$products = $this->searchDirector($condition);
					break;
				 default:	//All
					 $products = array_merge($this->searchTitle($condition), $this->searchActor($condition), $this->searchDirector($condition));
			}
			if(count($products)>0)
			{
				$this->set('Product',$products);
			} else
			{
				$this->Flash->set(__('No matches found.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

	function searchTitle($condition)
	{
		foreach($condition as $rules)
		{
			$conditions[] = array('Product.name LIKE '=>$rules.'%');
			$products= $this->Product->find('all', array('recursive'=>-1, 'conditions'=>$conditions, 'fields'=>array('Product.id','Product.code','Product.name')));
		 }
		return $products;
	}

	function searchActor($condition)
	{
		$this->loadModel('ActorsProduct');
		$this->Product->Actor->recursive = -1;
		foreach($condition as $rules)
		{

		   $options['conditions'] = array('Actor.full_name LIKE '=> $rules.'%');
		   $options['contain'] = array('Product' => array('fields' => array('Product.id', 'Product.name', 'Product.code')));
		   $products= $this->Product->Actor->find('all', $options);
		}

		$length = count($products);

		if($length > 0)
		{
			//Los siguiente es una limpieza a los resultados devueltos por la consulta.
			//Es necesaria la limpieza porque en la vista se trabaja general, entonces todos los resultados deben
			// tener el mismo formato

			for($i = 0; $i < $length; ++$i)
			{
				unset($products[$i]['Actor']);
				$products[$i]['Product'] = $products[$i]['Product'][0];
				unset($products[$i]['Product']['ActorsProduct']);
			}
		}
		return $products;
	}

	function searchDirector($condition)
	{
		foreach($condition as $rules){
			$conditions[] = array('Product.more_details LIKE '=> 'Directed'.'%'.$rules.'%');
			$products= $this->Product->find('all', array('recursive'=>-1, 'conditions'=>$conditions, 'fields'=>array('Product.id', 'Product.name','Product.code')));
		 }

		return $products;
	}
}
?>
