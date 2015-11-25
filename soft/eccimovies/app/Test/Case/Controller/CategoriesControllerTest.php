<?php
App::uses('CategoriesController', 'Controller');

class CategoriesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.category',
		'app.subcategory',
		'app.product',
	);

	public function testIndex() {
		$result = $this->testAction('/categories/index');
		debug($result);
	}

	public function testViewcategory() {
/*		$result = $this->testAction('/categories/viewcategory/Action');
		debug($result);*/
	}

	public function testViewsubcategory() {
/*		$result = $this->testAction('/categories/viewsubcategory/Action');
		debug($result);*/
	}

	public function testAdd() {
		$result = $this->testAction('/categories/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/categories/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/categories/delete/1');
		debug($result);
	}

	public function testViewBluray() {
/*		$result = $this->testAction('/categories/view_bluray');
		debug($result);*/
	}

	public function testViewDvd() {
/*		$result = $this->testAction('/categories/view_dvd');
		debug($result);*/
	}

}
