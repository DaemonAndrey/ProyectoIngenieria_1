<?php
App::uses('ActorsProduct', 'Model');

class ActorsProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.actors_product',
	);

	public $autoFixtures = false;

	public function testActorsProductModel() {
		$result = $this->loadFixtures('ActorsProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->ActorsProduct = ClassRegistry::init('ActorsProduct');
	}

	public function tearDown() {
		unset($this->ActorsProduct);

		parent::tearDown();
	}

}
