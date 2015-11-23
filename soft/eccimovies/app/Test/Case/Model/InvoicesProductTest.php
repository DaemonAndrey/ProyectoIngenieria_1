<?php
App::uses('InvoicesProduct', 'Model');

class InvoicesProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.invoices_product',
		'app.invoice',
		'app.payment_method',
		'app.address',
		'app.user',
		'app.state',
		'app.product'
	);

	public $autoFixtures = false;

	public function testInvoicesProductModel() {
		$result = $this->loadFixtures('InvoicesProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->InvoicesProduct = ClassRegistry::init('InvoicesProduct');
	}

	public function tearDown() {
		unset($this->InvoicesProduct);

		parent::tearDown();
	}

}
