<?php
App::uses('ProductsWishlist', 'Model');

class ProductsWishlistTest extends CakeTestCase {

	public $fixtures = array(
		'app.products_wishlist',
		'app.wishlist',
		'app.user',
		'app.product',
		'app.subcategory',
		'app.actor',
		'app.actors_product',
		'app.cart',
		'app.carts_product',
		'app.combo',
		'app.combos_product',
		'app.invoice',
		'app.payment_method',
		'app.address',
		'app.state',
		'app.invoices_product'
	);

	public $autoFixtures = false;

	public function testProductsWishlistModel() {
		$result = $this->loadFixtures('ProductsWishlist');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->ProductsWishlist = ClassRegistry::init('ProductsWishlist');
	}

	public function tearDown() {
		unset($this->ProductsWishlist);

		parent::tearDown();
	}

}
