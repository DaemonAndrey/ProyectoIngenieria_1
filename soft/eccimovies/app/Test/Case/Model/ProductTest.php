<?php
App::uses('Product', 'Model');

class ProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.product',
		'app.subcategory',
		'app.actor',
		'app.actors_product',
		'app.cart',
		'app.user',
		'app.carts_product',
		'app.combo',
		'app.combos_product',
		'app.invoice',
		'app.payment_method',
		'app.address',
		'app.state',
		'app.invoices_product',
		'app.wishlist',
		'app.products_wishlist'
	);

	public $autoFixtures = false;

	public function testProductModel() {
		$result = $this->loadFixtures('Product');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('Product');
	}

	public function tearDown() {
		unset($this->Product);

		parent::tearDown();
	}

}
