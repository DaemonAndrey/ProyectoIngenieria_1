<?php
App::uses('CombosProduct', 'Model');

/**
 * CombosProduct Test Case
 */
class CombosProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.combos_product',
		'app.combo',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CombosProduct = ClassRegistry::init('CombosProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CombosProduct);

		parent::tearDown();
	}

}
