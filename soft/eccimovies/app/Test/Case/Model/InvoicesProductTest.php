<?php
App::uses('InvoicesProduct', 'Model');

class InvoicesProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.invoices_product',
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
