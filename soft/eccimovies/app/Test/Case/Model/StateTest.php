<?php
App::uses('State', 'Model');

class StateTest extends CakeTestCase {

	public $fixtures = array(
		'app.state',
		'app.country',
		'app.address'
	);

	public $autoFixtures = false;
	//public $dropTables = false;

	public function testStateModel() {
		$result = $this->loadFixtures('State','Country');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}

}
