<?php
App::uses('Address', 'Model');

/**
 * Address Test Case
 */
class AddressTest extends CakeTestCase {

	public $useDbConfig = 'test';
	//public $fixtures = array('plugin.debug_kit.address');
	public $dropTables = false;

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.address',
		//'app.user',
		//'app.cart',
		//'app.product',
		//'app.subcategory',
		//'app.category',
		//'app.actor',
		//'app.actors_product',
		//'app.carts_product',
		//'app.invoice',
		//'app.payment_method',
		//'app.invoices_product',
		//'app.wishlist',
		//'app.products_wishlist'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Address = ClassRegistry::init('Address');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Address);

		parent::tearDown();
	}

	public function testAddressModel() {
		$result = $this->loadFixtures('Address');
		debug($result);
	}

}
