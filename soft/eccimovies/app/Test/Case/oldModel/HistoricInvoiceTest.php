<?php
App::uses('HistoricInvoice', 'Model');

/**
 * HistoricInvoice Test Case
 */
class HistoricInvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.historic_invoice'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HistoricInvoice = ClassRegistry::init('HistoricInvoice');
	}

	public function testHistoricInvoiceModel() {
		$result = $this->loadFixtures('HistoricInvoice');
		debug($result);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HistoricInvoice);

		parent::tearDown();
	}

}
