<?php
App::uses('Subcategory', 'Model');

class SubcategoryTest extends CakeTestCase {

	public $fixtures = array(
		'app.subcategory',
		'app.category',
		'app.product',
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
		'app.country',
		'app.invoices_product',
		'app.wishlist',
		'app.products_wishlist'
	);

	public $autoFixtures = false;

	public function testSubcategoryModel() {
		$result = $this->loadFixtures('Subcategory');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Subcategory = ClassRegistry::init('Subcategory');
	}

	public function tearDown() {
		unset($this->Subcategory);

		parent::tearDown();
	}

}
