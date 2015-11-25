<?php
App::uses('CombosController', 'Controller');

class CombosControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.combo',
		'app.combos_product',
		'app.product',
		'app.subcategory',
		'app.category',
	);

	public function testIndex() {
		$result = $this->testAction('/combos/index');
		debug($result);
	}

	public function testCombos() {
		$result = $this->testAction('/combos/combos');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/combos/view/1');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/combos/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/combos/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/combos/delete/1');
		debug($result);
	}

}
