<?php

App::uses('AppController', 'Controller');

class HistoricInvoicesController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash','Js');
    public $components = array('Flash', 'Paginator');

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

    public function edit_status( $id = null )
	{
		if( !$id )
		{
			throw new NotFoundException(__('Invalid invoice.'));
		}

		$hInvoice = $this->HistoricInvoice->findById($id);

		if( !$hInvoice )
		{
			throw new NotFoundException(__('Invalid invoice.'));
		}

        $this->set('thisInvoice', $this->HistoricInvoice->findById($id));

		if($this->request->is(array('post', 'put')))
		{
			if(isset($this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('controller' => 'invoices', 'action' => 'view_invoice', $id));
			}

			$this->HistoricInvoice->id = $id;

			if( $this->HistoricInvoice->save( $this->request->data ) )
			{
				$this->Flash->success(__('Invoice updated successfully.'));
				return $this->redirect(array('controller' => 'invoices', 'action' => 'view_invoice', $id));
			}
			else
			{
				//debug($this->Product->validationErrors);
				$this->Flash->error(__('Could not update invoice.'));
			}
		}
		if(!$this->request->data)
		{
			$this->request->data = $hInvoice;
		}
	}


	public function chart()
	{

	}

	public function table()
	{
		
	}

    public function view()
	{


		$this->loadModel('Category');
		 $this->set('categories', $this->Category->find('all', array('conditions' => array('category_name != '=>'Unclassified'))));

	}

	public function printData()
	{
		$this->Session->write('subcategories',array());
		if ($this->request->is('ajax'))
		{
			$this->loadModel('Category');
			$this->loadModel('Subcategory');

			$this->Session->write('subcategories',$this->Category->find('all',
			 array('conditions'=> array( 'category_name'=> $this->request->data ))));

		}
	}

	public function getProducts()
	{
		$this->Session->write('products',array());
		if ($this->request->is('ajax'))
		{
			$catego = array();
			$tempo = $this->Session->read('subcategories');
			for($i = 0; $i < count($tempo); ++$i)
			{
				array_push($catego,$tempo[$i]['Category']['category_name']);
			}

			$this->loadModel('Category');
			$this->loadModel('Subcategory');

			$var = $var[0]['Category']['category_name'];
			$values = $this->Subcategory->find('all',array('conditions'=>array('subcategory_name'=>$this->request->data,'category_name '=>$catego)));

			$this->Session->write('products',$values);

		}
	}
}
