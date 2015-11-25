<?php
App::uses('AddressesController', 'Controller');

class AddressesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.address',
		'app.state',
		'app.country',
		'app.user',
		'app.invoice',
	);

	public function testIndex() {
		$result = $this->testAction('/addresses/index');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/addresses/view/1');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/addresses/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/addresses/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/addresses/delete/1');
		debug($result);
	}

}
