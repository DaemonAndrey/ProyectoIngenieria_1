<?php
App::uses('UsersController', 'Controller');

class UsersControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.user'
	);

	public function testIndex() {
		$result = $this->testAction('/users/index');
		debug($result);
	}

	public function testMyAccount() {
		$result = $this->testAction('/users/my_account');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/users/view/1');
		debug($result);
	}

	public function testSignup() {
		$result = $this->testAction('/users/signup');
		debug($result);
	}

	public function testLogin() {
		$result = $this->testAction('/users/login');
		debug($result);
	}

	public function testManage() {
		$result = $this->testAction('/users/manage');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/users/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/users/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/users/delete/1');
		debug($result);
	}

	public function testSettings() {
		$result = $this->testAction('/users/settings');
		debug($result);
	}

	public function testChange() {
		$result = $this->testAction('/users/change/1');
		debug($result);
	}

}
