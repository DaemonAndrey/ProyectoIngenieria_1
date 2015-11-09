<?php
App::uses('Invoice', 'Model');

/**
 * Invoice Test Case
 */
class InvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoice',
/*		'app.address',
		'app.state',
		'app.country',
		'app.payment_method',
		'app.user',
//		'app.product',
		'app.cart_product',
		'app.cart',
		'app.invoices_product'*/
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Invoice = ClassRegistry::init('Invoice');
	}

	public function testInvoiceModel() {
		$result = $this->loadFixtures('Invoice');
		debug($result);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Invoice);

		parent::tearDown();
	}

}
