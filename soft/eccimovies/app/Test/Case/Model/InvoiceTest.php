<?php
App::uses('Invoice', 'Model');

class InvoiceTest extends CakeTestCase {

	public $fixtures = array(
		'app.invoice',
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
