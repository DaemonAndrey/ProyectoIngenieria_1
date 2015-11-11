<?php
App::uses('AppController', 'Controller');
/**
 * Invoices Controller
 * Generated by Petit Four the online baking tool for CakePHP: http://patisserie.keensoftware.com
 * @property Invoice $Invoice
 */
class InvoicesController extends AppController {


	public $helpers = array('Html', 'Form', 'Flash','Js');
    public $components = array('Flash', 'Paginator');
    
    var $shippingPrice = 10.00;
    var $totalTax = 0.00;
    var $totalAmmount = 0.00;
    var $subtotal = 0.00;
    var $paymentMethods2;

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
    
    public function index($id = null, &$subtotal = null, &$totalTax = null , &$shippingPrice = null, &$totalAmmount = null) {
        
        $this->loadModel('Address');
        $this->loadModel('PaymentMethod');
        $this->loadModel('Cart');
        $this->loadModel('CartsProduct');
        $this->loadModel('Product');
        
        $id = $this->Auth->User('id');
        $tax = 0.10;
        
        $this->set('shippingPrice', 10);
        
        $conditions[] = array('Address.user_id '=> $id);
        $this->set('addresses', $this->Address->find('list', array ('recursive'=> -1, 'conditions'=> $conditions, 'fields' => 'Address.full_address')));
        
        $conditions1[] = array('PaymentMethod.user_id '=> $id);
        $this->set('paymentMethods', $this->PaymentMethod->find('list', array ('recursive'=> -1, 'conditions'=> $conditions1, 'fields' => array('PaymentMethod.account'))));
        
        $this->set('carts_products', $this->CartsProduct->find('all'));
        $this->set('products', $this->Product->find('all'));
        
        $conditions2[]= array('Cart.user_id '=>$id);
        
        $carts= $this->Cart->find('first', array ('recursive'=> -1, 'conditions'=> $conditions2, 'fields' => array('id','Cart.subtotal')));
        $this->subtotal = $carts['Cart']['subtotal'];
        $this->set('carts', $carts);
        
        $this->totalTax = ($this->subtotal+$this->shippingPrice)*$tax;
        $this->set('totalTaxes', $this->totalTax);
        
        $this->totalAmmount = ($this->totalTax+$this->subtotal+$this->shippingPrice);
        $this->set('totalAmmount', $this->totalAmmount);
        
        
		//$this->Invoice->recursive = 0;
		//$this->set('invoices', $this->paginate());
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
    
    /*
	public function view($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
		$this->set('invoice', $this->Invoice->find('first', $options));
	}*/
    
    public function view($id = null, &$subtotal = null, &$totalTax = null , &$shippingPrice = null, &$totalAmmount = null) {    
        
        $this->loadModel('Address');
        $this->loadModel('PaymentMethod');
        $this->loadModel('Cart');
        $this->loadModel('CartsProduct');
        $this->loadModel('Product');
        $this->loadModel('HistoricInvoice');
        $this->loadModel('HistoricProduct');
        $this->loadModel('HistoricInvoicesHistoricProduct');
        $this->loadModel('InvoicesProduct');
        $this->loadModel('ValidAccount');
        $this->loadModel('User');
        
        $id = $this->Auth->User('id');
        $tax = 0.10;
        
        $conditions2[]= array('Cart.user_id '=>$id);
        $carts= $this->Cart->find('first', array ('recursive'=> -1, 'conditions'=> $conditions2, 'fields' => array('id','Cart.subtotal')));
        $this->subtotal = $carts['Cart']['subtotal'];
        
        $this->totalTax = ($this->subtotal+$this->shippingPrice)*$tax;
        
        $this->totalAmmount = ($this->totalTax+$this->subtotal+$this->shippingPrice);
        $this->set('totalAmmount', $this->totalAmmount);
        
        if ($this->request->is('post')) {
			$this->Invoice->create();
             
            $conditions6[] = array('PaymentMethod.id '=> $this->request->data['payment_method_id']);
            $method = $this->PaymentMethod->find('list', array ('recursive'=> -1, 'conditions'=> $conditions6, 'fields' => array('PaymentMethod.account')));
            $conditions7[] = array('ValidAccount.account' => $method);
             $fund = $this->ValidAccount->find('first',array ('recursive'=> -1, 'conditions'=> $conditions7, 'fields' => 'ValidAccount.funds'));
            
        }
        if($fund['ValidAccount']['funds'] >= $this->totalAmmount){
            
            $this->set('tax', 0.10);
            $this->set('shippingPrice', 10);
            $this->set('carts', $carts);
            $this->set('totalTaxes', $this->totalTax);
            $this->set('totalAmmount', $this->totalAmmount); 
            
            $conditions[] = array('Address.user_id '=> $id);
            $this->set('addresses', $this->Address->find('list', array ('recursive'=> -1, 'conditions'=> $conditions, 'fields' => 'Address.full_address')));
        
            $conditions1[] = array('PaymentMethod.user_id '=> $id);
        $this->set('paymentMethods', $this->PaymentMethod->find('list', array ('recursive'=> -1, 'conditions'=> $conditions1, 'fields' => array('PaymentMethod.account'))));
            
            $carts_products= $this->CartsProduct->find('all');
            $this->set('carts_products', $carts_products);
                 
            $products=$this->Product->find('all');    
            $this->set('products', $this->Product->find('all'));
             
            $conditions3[] = array('Address.id '=> $this->request->data['address_id']);
            $address2 =  $this->Address->find('first', array ('recursive'=> -1, 'conditions'=> $conditions3, 'fields' => 'Address.full_address'));
            $this->set('addresses2', $address2);
        
            $conditions4[] = array('PaymentMethod.id '=> $this->request->data['payment_method_id']);
            $paymentMethodAccount = $this->PaymentMethod->find('first', array ('recursive'=> -1, 'conditions'=> $conditions4, 'fields' => array('PaymentMethod.name_card','PaymentMethod.issuer','PaymentMethod.account')));
            $this->set('paymentMethods2',$paymentMethodAccount);
        
            $conditions5[] = array('ValidAccount.account'=> $paymentMethodAccount['PaymentMethod']['account']);
            $validAccount_account=  $this->ValidAccount->find('first', array ('recursive'=> -1, 'conditions'=> $conditions5, 'fields' => array('ValidAccount.id','ValidAccount.funds')));
            
            $conditions8[] = array('User.id'=> $id);
            $users=  $this->User->find('first', array ('recursive'=> -1, 'conditions'=> $conditions8, 'fields' => array('User.gender','User.first_name','User.last_name')));
            $this->set('users',$users);
            
            date_default_timezone_set('America/Costa_Rica');
            $date = date('Y-m-d H:i:s');
            
            $status = "Preparing for shipment";
        
 
            $this->ValidAccount->id=$validAccount_account['ValidAccount']['id'];
            $this->request->data['ValidAccount']['funds']=($validAccount_account['ValidAccount']['funds']-$this->totalAmmount);
        $this->ValidAccount->save($this->request->data);
        
            if ($this->Invoice->save($this->request->data)) {
                
                $this->request->data['Invoice']['tax'] = $this->totalTax;
                $this->request->data['Invoice']['shippping_price'] = $this->shippingPrice;
                $this->request->data['Invoice']['total'] = $this->totalAmmount;
                $this->Invoice->save($this->request->data);
                 
                $this->request->data['HistoricInvoice']['shippping_price'] = $this->shippingPrice;
                $this->request->data['HistoricInvoice']['tax'] = $this->totalTax;
                $this->request->data['HistoricInvoice']['total'] = $this->totalAmmount;
                $this->request->data['HistoricInvoice']['payment_method_account'] = $paymentMethodAccount['PaymentMethod']['account'];
                $this->request->data['HistoricInvoice']['address_full_address'] = $address2['Address']['full_address'];
                $this->request->data['HistoricInvoice']['user_gender'] = $users['User']['gender'];
                $this->request->data['HistoricInvoice']['user_first_name'] = $users['User']['first_name'];
                $this->request->data['HistoricInvoice']['user_last_name'] = $users['User']['last_name'];
                $this->request->data['HistoricInvoice']['invoice_date'] = $date;
                $this->request->data['HistoricInvoice']['invoice_status'] = $status;
                $this->HistoricInvoice->save($this->request->data);
            
                foreach ($carts_products as $carts_product): 
                    if($carts_product['CartsProduct']['cart_id']==$carts['Cart']['id']):
                        foreach ($products as $product):
                            if($product['Product']['id']==$carts_product['CartsProduct']['product_id']):
                                $this->InvoicesProduct->create();
                                $this->request->data['InvoicesProduct']['invoice_id'] = $this->Invoice->id;
                                $this->request->data['InvoicesProduct']['product_id'] = $product['Product']['id'];
                                $this->request->data['InvoicesProduct']['quantity'] = $carts_product['CartsProduct']['quantity'];
                                $this->request->data['InvoicesProduct']['price'] = $product['Product']['price'];
                                $this->InvoicesProduct->save($this->request->data);
                                
                                $this->HistoricProduct->create();
                                $this->request->data['HistoricProduct']['product_quantity'] = $carts_product['CartsProduct']['quantity'];
                                $this->request->data['HistoricProduct']['product_price'] = $product['Product']['price'];
                                $this->request->data['HistoricProduct']['product_name'] = $product['Product']['name'];
                                $this->request->data['HistoricProduct']['product_format'] = $product['Product']['format'];
                                $this->HistoricProduct->save($this->request->data);
                
                                $this->HistoricInvoicesHistoricProduct->create();
                                $this->request->data['HistoricInvoicesHistoricProduct']['historic_invoice_id'] =  $this->HistoricInvoice->id;
                                $this->request->data['HistoricInvoicesHistoricProduct']['historic_product_id'] = $this->HistoricProduct->id;
                                $this->HistoricInvoicesHistoricProduct->save($this->request->data);
                                
                
                                $this->Product->id=$product['Product']['id'];
                                $this->request->data['Product']['stock_quantity']=($product['Product']['stock_quantity']-$carts_product['CartsProduct']['quantity']);
                                $this->Product->save($this->request->data);              
                            endif;
                        endforeach;
                        unset($product);
                    endif;
                endforeach;
                unset($carts_product); 
                
                $this->CartsProduct->deleteAll(array('CartsProduct.cart_id' => $carts['Cart']['id']), false);
                
                $this->Cart->id=$carts['Cart']['id'];
                $this->request->data['Cart']['user_id']=null;
                $this->request->data['Cart']['subtotal']=null;
                $this->Cart->save($this->request->data);
                $this->Cart->deleteAll(array('Cart.id' => $carts['Cart']['id']), false);
            }
            
        }else{
                $this->redirect(array('action' => 'check'));
            //$this->Flash->set(__('The invoice could not be saved. Please, try again.'));
            
            }
              
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'));
			}
		}
		$addresses = $this->Invoice->Address->find('list');
		$paymentMethods = $this->Invoice->PaymentMethod->find('list');
		$products = $this->Invoice->Product->find('list');
		$this->set(compact('addresses', 'paymentMethods', 'products'));
	}

	public function edit($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Invoice->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
			$this->request->data = $this->Invoice->find('first', $options);
		}
		$addresses = $this->Invoice->Address->find('list');
		$paymentMethods = $this->Invoice->PaymentMethod->find('list');
		$products = $this->Invoice->Product->find('list');
		$this->set(compact('addresses', 'paymentMethods', 'products'));
	}

	public function delete($id = null) {
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Invoice->delete()) {
			$this->Session->setFlash(__('The invoice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invoice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
    public function check(){

        
    }
	
	public function my_invoices()
    {
        $this->loadModel('HistoricInvoice');
        $this->loadModel('PaymentMethod');
		$this->Invoice->recursive = 0;
        
        $this->set('paymentMethods', $this->PaymentMethod->find('all'));        
        $this->set('historicInvoices', $this->HistoricInvoice->find('all'));
    }
    
    public function view_invoice( $id = null )
    {
        $this->loadModel('HistoricInvoice');
        $this->loadModel('HistoricProduct');
        $this->loadModel('HistoricInvoicesHistoricProduct');
        $this->loadModel('PaymentMethod');
        
        if( !$id )
        {
            throw new NotFoundException(__('Invalid ID for invoice.'));
        }

        $invoice_id = $this->HistoricInvoice->findById($id);

        if( !$invoice_id )
        {
            throw new NotFoundException(__('Invalid ID for invoice.'));
        }

        $this->set('post', $invoice_id);
        $this->set('paymentMethods', $this->PaymentMethod->find('all')); 
        $this->set('historicProducts', $this->HistoricProduct->find('all')); 
        $this->set('historicInvoiceProduct', $this->HistoricInvoicesHistoricProduct->find('all')); 
    }
}
