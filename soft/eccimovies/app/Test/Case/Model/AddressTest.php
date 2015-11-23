<?php
App::uses('Address', 'Model');

class AddressTest extends CakeTestCase {

	public $fixtures = array(
		'app.address',
		'app.user',
		'app.state',
		'app.invoice'
	);

	public $autoFixtures = false;

	public function testAddressModel() {
		$result = $this->loadFixtures('Address');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Address = ClassRegistry::init('Address');
	}

	public function tearDown() {
		unset($this->Address);

		parent::tearDown();
	}

}
