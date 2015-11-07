<?php
App::uses('AppController', 'Controller');

class AddressesController extends AppController
{

	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Paginator', 'Flash', 'Session');
	
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

/**
 * index method
 * @return void
 */
	public function index()
	{
		//$this->Address->recursive = 0;
		//$this->Paginator->settings = $this->paginate;
		$this->set('addresses', $this->Address->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null)
	{
		if (!$this->Address->exists($id))
		{
			throw new NotFoundException(__('Invalid address'));
		}
		$address = $this->Address->findById($id);
		
		if( !$address )
        {
            throw new NotFoundException(__('Invalid address.'));
        }

        $this->set('address', $address);
	}

/**
 * add method
 *
 * @return void
 */
	public function add()
	{
		try
		{
			if ($this->request->is('post'))
			{
				if (isset( $this->request->data['cancel']))
				{
					$this->Flash->success(__('Action canceled.', true));
					return $this->redirect( array('action' => 'index'));
				}
				$this->Address->create();
				$this->request->data['Address']['user_id'] = $this->Auth->User('id');
				if ($this->Address->save($this->request->data))
				{
					$this->Flash->success(__('New address added successfully!'));
					return $this->redirect(array('action' => 'index'));
				}
				// Si no puedo agregar
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
                $this->Flash->set(__('This address is already registered!'));
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
	public function edit($id = null)
	{
        
		if (!$this->Address->exists($id))
		{
			throw new NotFoundException(__('Invalid address'));
		}
        $address = $this->Address->findById($id);

        $this->set('address', $address);
        
		if ($this->request->is(array('post', 'put')))
		{
			if (isset( $this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}
			if ($this->Address->save($this->request->data))
			{
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		}
		else
		{
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null)
	{
		$this->Address->id = $id;
		if (!$this->Address->exists())
		{
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Address->delete())
		{
			$this->Flash->success(__('The address has been deleted.'));
		}
		else
		{
			$this->Flash->error(__('The address could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
}
