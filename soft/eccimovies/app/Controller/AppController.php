<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $component = array('DebugKit.Toolbar');
	
	
	public $components = array(
							'Session',
							'Auth' => array(
										'loginRedirect' => array(
															'controller' => 'pages',
															'action' => 'home', 'display'
															),
										'logoutRedirect' => array(
															'controller' => 'pages',
															'action' => 'home', 'display'
															),
										'authenticate' => array(
															'Form' => array(
																		'passwordHasher' => 'Blowfish'
																		)
															),
										'authorize' => array('Controller'),
										'flash' => array('element' => 'auth_error')
                                
										)
							);
							
	public function isAuthorized($user)
	{
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 1)
		{
			return true;
		}

		// Default deny
		return false;
	}
	
// Se deslogea
	public function logout()
	{
		return $this->redirect($this->Auth->logout($this->data));
	}
    
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
	
}
