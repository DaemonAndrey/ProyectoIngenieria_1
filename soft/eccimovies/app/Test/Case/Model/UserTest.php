<?php
App::uses('User', 'Model');

class UserTest extends CakeTestCase {

	public $fixtures = array(
		'app.user',
	);

	public $autoFixtures = false;

	public function testUserModel() {
		$result = $this->loadFixtures('User');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
