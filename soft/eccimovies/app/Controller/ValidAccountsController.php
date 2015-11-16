<?php
App::uses('AppController', 'Controller');
/**
 * ValidAccounts Controller
 *
 * @property ValidAccount $ValidAccount
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ValidAccountsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ValidAccount->recursive = 0;
        $this->Paginator->settings = $this->paginate;
		$this->set('validAccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    
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
	public function view($id = null) {
		if (!$this->ValidAccount->exists($id)) {
			throw new NotFoundException(__('Invalid valid account'));
		}
		$options = array('conditions' => array('ValidAccount.' . $this->ValidAccount->primaryKey => $id));
		$this->set('validAccount', $this->ValidAccount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ValidAccount->create();
			if ($this->ValidAccount->save($this->request->data)) {
				$this->Flash->success(__('The valid account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The valid account could not be saved. Please, try again.'));
			}
		}
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

                $this->ValidAccount->create();
				
                // Si pudo agregar el metodo de pago
                if($this->ValidAccount->save($this->request->data))
                {
                    $this->Flash->set(__('New valid account added successfully!'));
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

                $this->ValidAccount->create();
				
                $this->request->data['ValidAccount']['issuer'] = 'PayPal';
                // Si pudo agregar el metodo de pago
                if($this->ValidAccount->save($this->request->data))
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

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ValidAccount->exists($id)) {
			throw new NotFoundException(__('Invalid valid account'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ValidAccount->save($this->request->data)) {
				$this->Flash->success(__('The valid account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The valid account could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ValidAccount.' . $this->ValidAccount->primaryKey => $id));
			$this->request->data = $this->ValidAccount->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ValidAccount->id = $id;
		if (!$this->ValidAccount->exists()) {
			throw new NotFoundException(__('Invalid valid account'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ValidAccount->delete()) {
			$this->Flash->success(__('The valid account has been deleted.'));
		} else {
			$this->Flash->error(__('The valid account could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
