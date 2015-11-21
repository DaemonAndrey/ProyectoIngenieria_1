<?php
App::uses('Invoice', 'Model');

class InvoiceTest extends CakeTestCase {

	public $fixtures = array(
		'app.invoice',
		'app.payment_method',
		'app.address',
		'app.user',
		'app.state',
		'app.product',
		'app.invoices_product'
	);

	public $autoFixtures = false;

	public function testInvoiceModel() {
		$result = $this->loadFixtures('Invoice');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Invoice = ClassRegistry::init('Invoice');
	}

	public function tearDown() {
		unset($this->Invoice);

		parent::tearDown();
	}

}
