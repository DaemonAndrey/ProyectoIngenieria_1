<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
    

/**
 * This controller does not use a model
 *
 * @var array
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
    
	public $uses = array();

    
    public function home()
    {
        $this->set('catego',$this->Page->find('all'));
        
        $products = $this->getNewReleases();
        
        $this->set('Product', $products);
    }
    
    /**
    Esta función devuelve las películas más recientes
    **/
    private function getNewReleases()
    {
        $this->loadModel('Product');
        
        /**La siguiente instrucción es para obtener cuál es el año más reciente**/
        
        $lastYear = $this->Product->find('all', array( 'fields'=>array('MAX(Product.release_year)')));
        
        /**La siguiente instrucción utiliza el dato obtenido anteriormente para filtrar la consulta**/
        $products = $this->Product->find('all',array('recursive' => -1, 'conditions' => array('Product.release_year '=>$lastYear[0][0]), 'fields'=>array('Product.id','Product.name', 'Product.code')));
        
        return $products;
        
    }
    
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
    

}
