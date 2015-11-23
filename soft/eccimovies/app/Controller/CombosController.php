<?php
App::uses('AppController', 'Controller');
/**
 * Combos Controller
 *
 * @property Combo $Combo
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CombosController extends AppController {

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
		$this->Combo->recursive = 0;
		$this->set('combos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Combo->create();
			if ($this->Combo->save($this->request->data)) {
				$this->Flash->success(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Combo->save($this->request->data)) {
				$this->Flash->success(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
			$this->request->data = $this->Combo->find('first', $options);
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Combo->id = $id;
		if (!$this->Combo->exists()) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Combo->delete()) {
			$this->Flash->success(__('The combo has been deleted.'));
		} else {
			$this->Flash->error(__('The combo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Combo->recursive = 0;
		$this->set('combos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
		$this->set('combo', $this->Combo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Combo->create();
			if ($this->Combo->save($this->request->data)) {
				$this->Flash->success(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Combo->save($this->request->data)) {
				$this->Flash->success(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The combo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
			$this->request->data = $this->Combo->find('first', $options);
		}
		$products = $this->Combo->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Combo->id = $id;
		if (!$this->Combo->exists()) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Combo->delete()) {
			$this->Flash->success(__('The combo has been deleted.'));
		} else {
			$this->Flash->error(__('The combo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
