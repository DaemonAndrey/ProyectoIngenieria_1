<?php
App::uses('ValidAccount', 'Model');

class ValidAccountTest extends CakeTestCase {

	public $fixtures = array(
		'app.valid_account'
	);

	public $autoFixtures = false;

	public function testValidAccountModel() {
		$result = $this->loadFixtures('ValidAccount');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->ValidAccount = ClassRegistry::init('ValidAccount');
	}

	public function tearDown() {
		unset($this->ValidAccount);

		parent::tearDown();
	}

}
