<?php
App::uses('Cart', 'Model');

class CartTest extends CakeTestCase {

	public $fixtures = array(
		'app.cart',
		'app.user',
		'app.product',
		'app.carts_product'
	);

	public $autoFixtures = false;

	public function testCartModel() {
		$result = $this->loadFixtures('Cart');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Cart = ClassRegistry::init('Cart');
	}

	public function tearDown() {
		unset($this->Cart);

		parent::tearDown();
	}

}
