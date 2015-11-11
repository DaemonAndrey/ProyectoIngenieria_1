<?php
App::uses('Combo', 'Model');

/**
 * Combo Test Case
 */
class ComboTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.combo',
		'app.product',
		'app.combos_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Combo = ClassRegistry::init('Combo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Combo);

		parent::tearDown();
	}

}
