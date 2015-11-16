<?php
App::uses('CartProduct', 'Model');

/**
 * CartProduct Test Case
 */
class CartProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cart_product',
		'app.cart',
//		'app.product',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CartProduct = ClassRegistry::init('CartProduct');
	}

	public function testCartProductModel() {
		$result = $this->loadFixtures('CartProduct');
		debug($result);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CartProduct);

		parent::tearDown();
	}

}
