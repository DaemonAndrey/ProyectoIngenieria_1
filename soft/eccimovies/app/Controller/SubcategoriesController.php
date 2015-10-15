<?php
class SubcategoriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Flash');

	public function index() {
		$this->set('subcategories', $this->Subcategory->find('all'));
	}

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid subcategory'));
        }

        $subcategory = $this->Subcategory->findById($id);
        if (!$subcategory) {
            throw new NotFoundException(__('Invalid subcategory'));
        }
        $this->set('subcategory', $subcategory);
    }
	public function admin_index() {
		$this->set('subcategories', $this->Subcategory->find('all'));
	}

	public function add($id = null) {
		if ($this->request->is('post')) {
			if (isset( $this->request->data['cancel'])) {
				$this->Flash->success(__('Acción cancelada.', true));
				return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
			}
			$this->Subcategory->create();
			if ($this->Subcategory->save($this->request->data)) {
				$this->Flash->success(__('Ha creado una nueva subcategoría.'));
				return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
			}
			$this->Flash->error(__('No se pudo crear la subcategoría.'));
		} else {
			$this->request->data['Subcategory']['category_id'] = $id;
			$this->set('categories', $this->Subcategory->Category->find('list', array('fields' => 'category_name')));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}

		$subcategory = $this->Subcategory->findById($id);
		if (!$subcategory) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if (isset( $this->request->data['cancel'])) {
				$this->Flash->success(__('Acción cancelada.', true));
				return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
			}
			$this->Subcategory->id = $id;
			if ($this->Subcategory->save($this->request->data)) {
				$this->Flash->success(__('Ha modificado la subcategoría.'));
				return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
			}
			$this->Flash->error(__('No pudo modificar la subcategoría.'));
		}

		if (!$this->request->data) {
			$this->request->data = $subcategory;
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		$this->Subcategory->id = $id;
		$name = $this->Subcategory->field('subcategory_name');
		if ($this->Subcategory->delete($id)) {
			$this->Flash->success(
				__('Ha borrado la subcategoría: %s.', $name)
			);
		} else {
			$this->Flash->error(
				__('No se pudo eliminar la subcategoría: %s.', $name)
			);
		}

		return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
	}
}
?>
