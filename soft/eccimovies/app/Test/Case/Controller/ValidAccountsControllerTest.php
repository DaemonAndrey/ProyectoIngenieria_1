<?php
App::uses('ValidAccountsController', 'Controller');

class ValidAccountsControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.valid_account'
	);

	public function testIndex() {
		$result = $this->testAction('/valid_accounts/index');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/valid_accounts/view/1');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/valid_accounts/add');
		debug($result);
	}

	public function testAddCard() {
		$result = $this->testAction('/valid_accounts/add_card');
		debug($result);
	}

	public function testAddPaypal() {
		$result = $this->testAction('/valid_accounts/add_paypal');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/valid_accounts/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/valid_accounts/delete/1');
		debug($result);
	}

}
