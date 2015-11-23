<?php
App::uses('CombosProduct', 'Model');

class CombosProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.combos_product',
		'app.combo',
		'app.product'
	);

	public $autoFixtures = false;

	public function testCombosProductModel() {
		$result = $this->loadFixtures('CombosProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->CombosProduct = ClassRegistry::init('CombosProduct');
	}

	public function tearDown() {
		unset($this->CombosProduct);

		parent::tearDown();
	}

}
