<?php
App::uses('Address', 'Model');

class AddressTest extends CakeTestCase {

	public $useDbConfig = 'test';

	public $fixtures = array(
		'app.address',
		'app.state',
		'app.country'
	);

	public $autoFixtures = false;

	public function setUp() {
		parent::setUp();
		$this->Address = ClassRegistry::init('Address');
	}

	public function testAddressModel() {
		$result = $this->loadFixtures('Address', 'State', 'Country');
		debug($result);
	}

	public function tearDown() {
		unset($this->Address);

		parent::tearDown();
	}

}
