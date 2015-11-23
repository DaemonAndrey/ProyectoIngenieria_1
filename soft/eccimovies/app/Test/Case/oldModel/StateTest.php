<?php
App::uses('State', 'Model');

class StateTest extends CakeTestCase {

	public $useDbConfig = 'test';

	public $fixtures = array(
		'app.state',
		'app.country'
	);

	public $autoFixtures = false;

	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

	public function testStateModel() {
		$result = $this->loadFixtures('State', 'Country');
	}

	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}

}
