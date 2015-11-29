<?php
App::uses('WishlistsProduct', 'Model');

class WishlistsProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.wishlists_product',
	);

	public $autoFixtures = false;

	public function testProductsWishlistModel() {
		$result = $this->loadFixtures('WishlistsProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->ProductsWishlist = ClassRegistry::init('WishlistsProduct');
	}

	public function tearDown() {
		unset($this->ProductsWishlist);

		parent::tearDown();
	}

}
