<?php

App::uses('AppController', 'Controller');

class PaymentMethodsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash','Js');
    public $components = array('Flash', 'Paginator');

    // Permite que los métodos de pago se muestren por páginas
    public $paginate = array(
        'limit' => 5,
        'order' => array('PaymentMethod.account' => 'asc')
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
	
	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->PaymentMethod->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	public function isOwnedBy($paymentMethod, $user) {
		return $this->field('id', array('id' => $paymentMethod, 'user_id' => $user)) !== false;
	}
	
	public function index()
    {
		$this->PaymentMethod->recursive = 0;
        $this->set('paymentMethods', $this->PaymentMethod->find('all'));
    }
	
	public function view( $id = null )
    {
        if( !$id )
        {
            throw new NotFoundException(__('Invalid ID for payment method.'));
        }

        $pMethod = $this->PaymentMethod->findById($id);

        if( !$pMethod )
        {
            throw new NotFoundException(__('Invalid ID for payment method.'));
        }

        $this->set('post', $pMethod);
    }
	
    public function add_card()
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

                $this->PaymentMethod->create();
				
				$this->request->data['PaymentMethod']['user_id'] = $this->Auth->User('id');
                // Si pudo agregar el metodo de pago
                if($this->PaymentMethod->save($this->request->data))
                {
                    $this->Flash->set(__('New payment method added successfully!'));
                    return $this->redirect(array('action' => 'index'));
                }
                // Si no puedo agregar el producto
                else
                {
                    throw new Exception('Exception');
                }
            }
        }
        catch( Exception $e )
        {
            // Si la excepción es por PRIMARY KEY
            if( $e->getCode() == 23000 )
            {
                $this->Flash->set(__('This account is already registered!'));
            }
            // Si la excepción es por otra cosa
            else
            {
				echo $e->getCode();
                $this->Flash->set(__('Oops! Something went wrong. Try again.'));
            }
        }
    }
	
	public function add_paypal()
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

                $this->PaymentMethod->create();
				
				$this->request->data['PaymentMethod']['user_id'] = $this->Auth->User('id');
				$this->request->data['PaymentMethod']['issuer'] = 'PayPal';
                // Si pudo agregar el metodo de pago
                if($this->PaymentMethod->save($this->request->data))
                {
                    $this->Flash->set(__('New payment method added successfully!'));
                    return $this->redirect(array('action' => 'index'));
                }
                // Si no puedo agregar el producto
                else
                {
                    throw new Exception('Exception');
                }
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
				echo $e->getCode();
                $this->Flash->set(__('Oops! Something went wrong. Try again.'));
            }
        }
    }
	
	/*
    public function edit( $id = null )
    {
        if( !$id )
        {
            throw new NotFoundException(__('Invalid ID for payment method.'));
        }

        $pMethod = $this->PaymentMethod->findById($id);
		
        if( !$pMethod )
        {
            throw new NotFoundException(__('Invalid ID for payment method.'));
		}

        $this->set('post', $pMethod);
		
		if($this->request->is(array('post', 'put')))
		{
			if(isset($this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}

			$this->PaymentMethod->id = $id;
			if( $this->PaymentMethod->save( $this->request->data ) )
			{
				$this->Flash->success(__('Payment method updated successfully!'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				debug($this->PaymentMethod->validationErrors);
				$this->Flash->error(__('Unable to update payment method.'));
			}
		}

        if(!$this->request->data)
        {
            $this->request->data = $pMethod;
        }
    }
	*/

    public function delete( $id = null )
    {
		try
		{
			if( !$id )
			{
				throw new NotFoundException(__('Invalid ID for payment method.'));
			}

			if( $this->request->is('get') )
			{
				throw new MethodNotAllowedException();
			}

			$pMethod = $this->PaymentMethod->findById($id);
			
			if( !$pMethod )
			{
				throw new NotFoundException(__('Invalid ID for payment method.'));
			}
			
			$this->PaymentMethod->id = $id;
			
			// Si me pertenece el metodo de pago
			if( ($this->Auth->User('id') == $this->PaymentMethod->field('user_id')))
			{
				if( $this->request->is(array('post', 'put')) )
				{
					if( $this->PaymentMethod->updateAll(array("enable" => "0"),array("PaymentMethod.id" => "$id")) )
					{
						$this->Flash->success(__('Payment method successfully deleted!'));
						return $this->redirect(array('action' => 'index'));
					}
					$this->Flash->error(__('Unable to delete payment method.'));
				}
			}
			return $this->redirect(array('action' => 'index'));
		}
		catch( Exception $e )
		{
			//vacio
		}
    }
}
?>
