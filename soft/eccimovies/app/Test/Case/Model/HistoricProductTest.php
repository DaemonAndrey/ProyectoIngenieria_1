<?php
App::uses('HistoricProduct', 'Model');

class HistoricProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.historic_product',
		'app.historic_invoice',
		'app.historic_invoices_historic_product'
	);

	public $autoFixtures = false;

	public function testHistoricProductModel() {
		$result = $this->loadFixtures('HistoricProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->HistoricProduct = ClassRegistry::init('HistoricProduct');
	}

	public function tearDown() {
		unset($this->HistoricProduct);

		parent::tearDown();
	}

}
