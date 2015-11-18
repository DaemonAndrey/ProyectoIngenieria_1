<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController 
{
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
	
	public function beforeFilter()
	{
        parent::beforeFilter();
        $this->Auth->allow('signup');
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

	// Se pasa a la vista de HOME
	public function index()
	{
        $this->User->recursive = 0;
        $this->set('Pagina Principal', $this->paginate());
        $this->set('users', $this->User->find('all'));
    }
	
	public function view($id = null)
	{
		if (!$this->User->exists($id))
		{
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->find('first', array('conditions' => array('User.id' => $id), 'recursive' => 2));

		if( !$user )
		{
			throw new NotFoundException(__('Invalid user.'));
		}

		$this->set('user', $user);
    }
    
	
	// Se pasa a la vista de REGISTRO
	public function signup()
	{	
		// Por si falla el INSERT
		try
		{
			if ($this->request->is('post'))
			{
				$this->User->create();
				
				// Si pudo registrar el usuario
				if ($this->User->save($this->request->data))
				{
					$this->Flash->set(__('¡ Usuario registrado exitosamente !'));
					return $this->redirect(array('action' => 'login')); // Se pasa a la vista de LOGIN
				}
				// Si no pudo registrar el usuario
				else
				{
					throw new Exception('Exception');
				}
			}
		}
		catch(Exception $e)
		{	
			// Si la excepcion es por PRIMARY KEY
			if( $e->getCode() == 23000 )
			{
				$this->Flash->set(__('Lo sentimos, ese correo ya está registrado') );
			}
			// Si la excepcion es por otra cosa
			else
			{
				$this->Flash->set(__('Oops ! Algo ha salido mal. Inténtalo de nuevo.') );
			}
		}
    }
	
	// Se pasa a la vista de LOGIN
	public function login()
	{
		// Por si falla el INSERT
		try
		{
			if ($this->request->is('post'))
			{
				// Si pudo autenticar
				if ($this->Auth->login())
				{
							$this->loadModel('Cart');
							$_SESSION['Auth']['User']['cart'] = $this->Cart->field('id',array('user_id' => $this->Auth->User('id')));
					return $this->redirect($this->Auth->redirectURL());
					//return $this->redirect(array('action' => 'view')); // Se pasa a la vista de LOGEADO
				}
				else
				{
					throw new Exception('Exception');
				}
			}
		}
		catch( Exception $e )
		{
			$this->Flash->set(__('Correo o contraseña inválido'));
		}
	}
	
	// Hace logout
	public function logout()
	{
		if($this->Auth->User('id') != null)
		{
			return $this->redirect($this->Auth->logout($this->data));
		}
	}
	
	// Para administrar
	public function manage()
	{
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
				$this->User->create();
				// Si pudo agregar el usuario
				if($this->User->save($this->request->data))
				{
					$this->Flash->set(__('New user added successfully!'));
					return $this->redirect(array('action' => 'index'));
				}
				// Si no puedo agregar el usuario
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
				$this->Flash->set(__('Lo sentimos, ese correo ya está registrado'));
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
			throw new NotFoundException(__('Invalid user.'));
		}
		$user = $this->User->findById($id);
		if( !$user )
		{
			throw new NotFoundException(__('Invalid user.'));
		}
		if($this->request->is(array('post', 'put')))
		{
			if(isset($this->request->data['cancel']))
			{
				$this->Flash->success(__('Action canceled.', true));
				return $this->redirect(array('action' => 'index'));
			}
			$this->User->id = $id;
			if( $this->User->save( $this->request->data ) )
			{
				$this->Flash->success(__('User updated successfully.'));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				//debug($this->Product->validationErrors);
				$this->Flash->error(__('Could not update user.'));
			}
		}
		else
        {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => 2);
			$this->request->data = $this->User->find('first', $options);
		}
		if(!$this->request->data)
		{
			$this->request->data = $user;
		}
	}
    
    	public function delete( $id = null )
	{
		if( !$id )
		{
			throw new NotFoundException(__('Invalid user.'));
		}
		if( $this->request->is('get') )
		{
			throw new MethodNotAllowedException();
		}
		$user = $this->User->findById($id);
		if( !$user )
		{
			throw new NotFoundException(__('Invalid user.'));
		}
		if( $this->request->is(array('post', 'put')) )
		{
			if( $this->User->updateAll(array("enable" => "0"),array("User.id" => "$id")) )
			{
				$this->Flash->success(__('User deleted successfully!'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Could not delete user.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    
    public function settings()
	{
		$this->set('settings', $this->User->find('all', array('recursive' => 2)));
	}
}
?>