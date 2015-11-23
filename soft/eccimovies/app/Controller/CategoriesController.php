<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
    	
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
         $this->set('categories', $this->Category->find('all'));
		 $this->loadModel('Subcategory');
		 $this->set('subcategories', $this->Subcategory->find('all'));
    }

    public function viewcategory($category_name = null)
	{
        $this->loadModel('Subcategory');
		$this->set('subcategories', $this->Subcategory->find('all'));
		$this->loadModel('Product');
		$this->set('products', $this->Product->find('all'));
        $this->loadModel('Page');
        $this->set('catego',$this->Page->find('all'));
		
		if (!$category_name)
		{
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findByCategoryName($category_name);
		
        if (!$category)
		{
            throw new NotFoundException(__('Invalid category'));
        }
		
        $this->set('category', $category);
    }
	
	public function viewsubcategory($subcategory_name = null)
	{
		$this->loadModel('Product');
		$this->set('products', $this->Product->find('all'));
		$this->loadModel('Subcategory');
        $this->loadModel('Page');
        $this->set('catego',$this->Page->find('all'));
		
        if (!$subcategory_name)
		{
            throw new NotFoundException(__('Invalid subcategory'));
        }

        $subcategory = $this->Subcategory->findBySubcategoryName($subcategory_name);
		
        if (!$subcategory)
		{
            throw new NotFoundException(__('Invalid subcategory'));
        }
		
        $this->set('subcategory', $subcategory);
    }

	public function add()
	{
		if ($this->request->is('post'))
		{
			if (isset( $this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}
			
			$this->Category->create();
			
			if ($this->Category->save($this->request->data))
			{
				$this->Flash->success(__('New category added successfully!'));
				return $this->redirect(array('action' => 'index'));
			}
			
			$this->Flash->error(__('Could not add category.'));
		}
	}

	public function edit($id = null)
	{
		if (!$id)
		{
			throw new NotFoundException(__('Invalid category'));
		}

		$category = $this->Category->findById($id);
		
		if (!$category)
		{
			throw new NotFoundException(__('Invalid category'));
		}

		if ($this->request->is(array('post', 'put')))
		{
			if (isset( $this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}
			
			$this->Category->id = $id;
			
			if ($this->Category->save($this->request->data))
			{
				$this->Flash->success(__('Category updated successfully!'));
				return $this->redirect(array('action' => 'index'));
			}
			
			$this->Flash->error(__('Could not update category.'));
		}

		if (!$this->request->data)
		{
			$this->request->data = $category;
		}
	}

	public function delete($id)
	{
		if ($this->request->is('get'))
		{
			throw new MethodNotAllowedException();
		}

		if ($this->Category->delete($id))
		{
			$this->Flash->success(__('Category %s deleted successfully!', h($id)));
		}
		else
		{
			$this->Flash->error(__('Could not delete category %s.', h($id)));
		}

		return $this->redirect(array('action' => 'index'));
	}
    
    public function view_bluray()
	{	
        $this->loadModel('Page');
        $this->set('catego',$this->Page->find('all'));
        
        $this->loadModel('Product');
        
        $this->set('product',
                   $this->Product->find('all',
                                          array('conditions' => array('Product.enable' => '1',
                                                                      'Product.format' => 'Blu-Ray'
                                                                     ),
                                                'order' => array('Product.name')
                                               )
                                         )
                  );
    }
    
    public function view_dvd()
	{		
        $this->loadModel('Page');
        $this->set('catego',$this->Page->find('all'));
        
        $this->loadModel('Product');
        
        $this->set('product',
                   $this->Product->find('all',
                                          array('conditions' => array('Product.enable' => '1',
                                                                      'Product.format' => 'DVD'
                                                                     ),
                                                'order' => array('Product.name')
                                               )
                                         )
                  );
    }
}
?>

