<?php
App::uses('Actor', 'Model');

class ActorTest extends CakeTestCase {

	public $fixtures = array(
		'app.actor',
	);

	public $autoFixtures = false;

	public function testActorModel() {
		$result = $this->loadFixtures('Actor');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Actor = ClassRegistry::init('Actor');
	}

	public function tearDown() {
		unset($this->Actor);

		parent::tearDown();
	}

}
