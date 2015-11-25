<?php
App::uses('SubcategoriesController', 'Controller');

class SubcategoriesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.subcategory',
		'app.category',
		'app.product',
	);

	public function testIndex() {
		$result = $this->testAction('/subcategories/index');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/subcategories/view/1');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/subcategories/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/subcategories/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/subcategories/delete/1');
		debug($result);
	}

	public function testGetByCategory() {
/*		$result = $this->testAction('/subcategories/getByCategory');
		debug($result);*/
	}

}
