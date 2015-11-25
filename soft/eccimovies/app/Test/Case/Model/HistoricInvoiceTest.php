<?php
App::uses('HistoricInvoice', 'Model');

class HistoricInvoiceTest extends CakeTestCase {

	public $fixtures = array(
		'app.historic_invoice',
	);

	public $autoFixtures = false;

	public function testHistoricInvoiceModel() {
		$result = $this->loadFixtures('HistoricInvoice');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->HistoricInvoice = ClassRegistry::init('HistoricInvoice');
	}

	public function tearDown() {
		unset($this->HistoricInvoice);

		parent::tearDown();
	}

}
