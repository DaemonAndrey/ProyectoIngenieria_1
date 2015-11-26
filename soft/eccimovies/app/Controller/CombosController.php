<?php
App::uses('AppController', 'Controller');

class CombosController extends AppController {

	public $components = array('Paginator', 'Flash', 'Session');

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
        $this->Combo->recursive = 0;
		$this->set('combos', $this->Paginator->paginate());
	}
    
    public function view_combos()
    {   
        $this->loadModel('Page');
        $this->set('catego',$this->Page->find('all'));
        
        $combos = $this->Combo->find('all');
		$this->set('comb', $combos);
	}

	public function view($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
		//$this->Combo->Product->contain('Subcategory');
		//$this->Combo->Product->Subcategory->contain('Category');
		$options = array(
			'conditions' => array('Combo.' . $this->Combo->primaryKey => $id),
			'contain' => array(
				'Product' => array(
					'Subcategory' => array('Category')
				)
			)
		);

		$this->set('combo', $this->Combo->find('first', $options));
		//debug($this->Combo->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			if (isset( $this->request->data['cancel'])) {
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect( array('action' => 'index'));
			}
            
            $sum = 0;
            $stock_quantity = PHP_INT_MAX;
            //debug($this->request->data);
            $combo = $this->request->data['Product'];
            foreach ($combo['Product'] as $id):
                $product = $this->Combo->Product->findById($id);
                //debug($product);
                $sum += $product['Product']['price'];
                if ($stock_quantity > $product['Product']['stock_quantity']):
				    $stock_quantity = $product['Product']['stock_quantity'];
                endif;
            endforeach;
            $comboPrice = $sum; //* (1 - $this->request->data['Combo']['discount'] / 100.0);
            
			$this->Combo->Product->create();
			$data = array(
                'code' => $this->request->data['Combo']['code'],
                'name' => $this->request->data['Combo']['name'],
                'price' => $comboPrice,
                'discount' => $this->request->data['Combo']['discount'],
                'stock_quantity' => $stock_quantity,
                'subcategory_id' => 2
            );
            
            if ($this->Combo->Product->save($data)) 
            {
				$this->Flash->success(__('The combo has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
            
            $this->Combo->create();
			$data['product_id'] = $this->Combo->Product->id;
            $lista = $this->request->data['Product'];
            $data['Product'] = $lista;
            //debug($data);
            
            if ($this->Combo->save($data)) 
            {
				$this->Flash->success(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

	public function edit($id = null) 
    {
		if (!$this->Combo->exists($id)) 
        {
			throw new NotFoundException(__('Invalid combo'));
		}
		
        if ($this->request->is(array('post', 'put'))) 
        {
			if (isset( $this->request->data['cancel'])) 
            {
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect( array('action' => 'index'));
			}

            $sum = 0;
            $stock_quantity = PHP_INT_MAX;
            //debug($this->request->data);
            $combo = $this->request->data['Product'];
            foreach ($combo['Product'] as $id):
                $product = $this->Combo->Product->findById($id);
                //debug($product);
                $sum += $product['Product']['price'];
                if ($stock_quantity > $product['Product']['stock_quantity']):
				    $stock_quantity = $product['Product']['stock_quantity'];
                endif;
            endforeach;
            $comboPrice = $sum; //* (1 - $this->request->data['Combo']['discount'] / 100.0);
            
            $productId = $this->Combo->findByCode($this->request->data['Combo']['code']);
            
            if ($this->Combo->save($this->request->data)) 
            {
                $comboId = $productId['Combo']['product_id'];
                
				$data = array(
                    'code' => "'".$this->request->data['Combo']['code']."'",
                    'name' => "'".$this->request->data['Combo']['name']."'",
                    'price' => $comboPrice,
                    'discount' => $this->request->data['Combo']['discount'],
                    'stock_quantity' => $stock_quantity
                );
                debug($data);

                if ($this->Combo->Product->updateAll($data, array('Product.id' => $comboId))) 
                {
                    $this->Flash->success(__('The combo has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                } 
                else 
                {
                    $this->Flash->error(__('The products in the combo could not be updated. Please, try again.'));
                }
            } 
            else 
            {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		} 
        else 
        {
			$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
			$this->request->data = $this->Combo->find('first', $options);
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

	public function delete($id = null) {
		if( !$id ) {
			throw new NotFoundException(__('Invalid combo.'));
		}
		if( $this->request->is('get') ) {
			throw new MethodNotAllowedException();
		}
		$combo = $this->Combo->findById($id);
		if( !$combo ) {
			throw new NotFoundException(__('Invalid combo.'));
		}
		if( $this->request->is(array('post', 'put')) ) {
			if( $this->Combo->updateAll(array("enable" => "0"),array("Combo.id" => "$id")) ) {
				$this->Flash->success(__('Combo deleted successfully!'));
				//return $this->redirect(array('action' => 'index'));
			} else
				$this->Flash->error(__('Could not delete combo.'));
		}
/*
		if( !$this->Combo->product_id ) {
			throw new NotFoundException(__('Invalid product.'));
		}
		if( $this->request->is('get') ) {
			throw new MethodNotAllowedException();
		}
		$product = $this->Combo->Product->findById($this->Combo->product_id);
		if( !$product ) {
			throw new NotFoundException(__('Invalid product.'));
		}
		if( $this->request->is(array('post', 'put')) ) {
			if( $this->Combo->Product->updateAll(array("enable" => "0"),array("Product.id" => "$this->Combo->product_id")) ) {
				$this->Flash->success(__('Product deleted successfully!'));
				//return $this->redirect(array('action' => 'index'));
			} else
				$this->Flash->error(__('Could not delete product.'));
		}*/
		return $this->redirect(array('action' => 'index'));

/*		$this->Combo->id = $id;
		if (!$this->Combo->exists()) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Combo->delete()) {
			$this->Flash->success(__('The combo has been deleted.'));
		} else {
			$this->Flash->error(__('The combo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

}
