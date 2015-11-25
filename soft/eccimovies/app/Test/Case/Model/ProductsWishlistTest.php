<?php
App::uses('ProductsWishlist', 'Model');

class ProductsWishlistTest extends CakeTestCase {

	public $fixtures = array(
		'app.products_wishlist',
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
