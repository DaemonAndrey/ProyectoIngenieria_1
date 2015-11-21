<?php
App::uses('Wishlist', 'Model');

class WishlistTest extends CakeTestCase {

	public $fixtures = array(
		'app.wishlist',
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
		'app.products_wishlist'
	);

	public $autoFixtures = false;

	public function testWishlistModel() {
		$result = $this->loadFixtures('Wishlist');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Wishlist = ClassRegistry::init('Wishlist');
	}

	public function tearDown() {
		unset($this->Wishlist);

		parent::tearDown();
	}

}
