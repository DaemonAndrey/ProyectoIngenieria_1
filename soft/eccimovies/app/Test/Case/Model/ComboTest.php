<?php
App::uses('Combo', 'Model');

class ComboTest extends CakeTestCase {

	public $fixtures = array(
		'app.combo',
	);

	public $autoFixtures = false;

	public function testComboModel() {
		$result = $this->loadFixtures('Combo');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Combo = ClassRegistry::init('Combo');
	}

	public function tearDown() {
		unset($this->Combo);

		parent::tearDown();
	}

}
