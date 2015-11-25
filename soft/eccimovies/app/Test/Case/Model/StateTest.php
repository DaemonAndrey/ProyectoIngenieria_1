<?php
App::uses('State', 'Model');

class StateTest extends CakeTestCase {

	public $fixtures = array(
		'app.state',
		'app.country',
	);

	public $autoFixtures = false;

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
