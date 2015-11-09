<?php
App::uses('Cart', 'Model');

/**
 * Cart Test Case
 */
class CartTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cart',
		'app.cart_product',
//		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cart = ClassRegistry::init('Cart');
	}

	public function testCartModel() {
		$result = $this->loadFixtures('Cart');
		debug($result);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cart);

		parent::tearDown();
	}

}
