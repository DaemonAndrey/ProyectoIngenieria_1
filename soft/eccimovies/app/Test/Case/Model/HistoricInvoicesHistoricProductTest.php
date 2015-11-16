<?php
App::uses('HistoricInvoicesHistoricProduct', 'Model');

class HistoricInvoicesHistoricProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.historic_invoices_historic_product',
		'app.historic_invoice',
		'app.historic_product'
	);

	public $autoFixtures = false;

	public function testHistoricInvoicesHistoricProductModel() {
		$result = $this->loadFixtures('HistoricInvoicesHistoricProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->HistoricInvoicesHistoricProduct = ClassRegistry::init('HistoricInvoicesHistoricProduct');
	}

	public function tearDown() {
		unset($this->HistoricInvoicesHistoricProduct);

		parent::tearDown();
	}

}
