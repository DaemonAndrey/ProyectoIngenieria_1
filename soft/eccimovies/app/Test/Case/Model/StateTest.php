<?php
App::uses('State', 'Model');

class StateTest extends CakeTestCase {

	public $fixtures = array(
		'app.state',
		'app.country',
		'app.address',
		'app.user',
		'app.invoice',
		'app.payment_method',
		'app.product',
		'app.subcategory',
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

	public function testStateModel() {
		$result = $this->loadFixtures('State');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}

}
