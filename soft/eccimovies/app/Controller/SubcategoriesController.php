<?php

App::uses('AppController', 'Controller');

class SubcategoriesController extends AppController
{
	public $helpers = array('Html', 'Form');
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
		$this->set('subcategories', $this->Subcategory->find('all'));
	}

    public function view($id = null)
	{
        if (!$id) {
            throw new NotFoundException(__('Invalid subcategory'));
        }

        $subcategory = $this->Subcategory->findById($id);

        if (!$subcategory) {
            throw new NotFoundException(__('Invalid subcategory'));
        }

        $this->set('subcategory', $subcategory);
    }

	public function add($id = null)
	{
		if ($this->request->is('post'))
		{
			if (isset( $this->request->data['cancel']))
			{
				$this->Flash->success(__('Acción cancelada.', true));
				return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
			}

			$this->Subcategory->create();

			if ($this->Subcategory->save($this->request->data))
			{
				$this->Flash->success(__('Ha creado una nueva subcategoría.'));
				return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
			}

			$this->Flash->error(__('No se pudo crear la subcategoría.'));
		}
		else
		{
			$this->request->data['Subcategory']['category_id'] = $id;
			$this->set('categories', $this->Subcategory->Category->find('list', array('fields' => 'category_name')));
		}
	}

	public function edit($id = null)
	{
		if (!$id)
		{
			throw new NotFoundException(__('Subcategoría no válida'));
		}

		$subcategory = $this->Subcategory->findById($id);

		if (!$subcategory)
		{
			throw new NotFoundException(__('Subcategoría no válida'));
		}

		if ($this->request->is(array('post', 'put')))
		{
			if (isset( $this->request->data['cancel']))
			{
				$this->Flash->success(__('Acción cancelada.', true));
				return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
			}

			$this->Subcategory->id = $id;

			if ($this->Subcategory->save($this->request->data))
			{
				$this->Flash->success(__('Ha modificado la subcategoría.'));
				return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
			}

			$this->Flash->error(__('No pudo modificar la subcategoría.'));
		}
		else
		{
			$this->set('categories', $this->Subcategory->Category->find('list', array('fields' => 'category_name')));
		}

		if (!$this->request->data)
		{
			$this->request->data = $subcategory;
		}
	}

	public function delete($id)
	{
		if ($this->request->is('get'))
		{
			throw new MethodNotAllowedException();
		}

		$this->Subcategory->id = $id;
		$name = $this->Subcategory->field('subcategory_name');

		if ($this->Subcategory->delete($id))
		{
			$this->Flash->success(__('Ha borrado la subcategoría: %s.', $name));
		}
		else
		{
			$this->Flash->error(__('No se pudo eliminar la subcategoría: %s.', $name));
		}

		return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
	}

	public function getByCategory() {
		$category_id = $this->request->data['Product']['category_id'];
		$subcategories = $this->Subcategory->find('list', array(
			'conditions' => array('Subcategory.category_id' => $category_id),
			'recursive' => -1));
		$this->set('subcategories', $subcategories);
		$this->layout = 'ajax';
	}

}
?>
