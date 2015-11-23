<?php
App::uses('User', 'Model');

class UserTest extends CakeTestCase {

	public $fixtures = array(
		'app.user',
		'app.address',
		'app.state',
		'app.country',
		'app.invoice',
		'app.payment_method',
		'app.product',
		'app.subcategory',
		'app.category',
		'app.actor',
		'app.actors_product',
		'app.cart',
		'app.carts_product',
		'app.combo',
		'app.combos_product',
		'app.invoices_product',
		'app.wishlist',
		'app.products_wishlist'
	);

	public $autoFixtures = false;

	public function testUserModel() {
		$result = $this->loadFixtures('User');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
