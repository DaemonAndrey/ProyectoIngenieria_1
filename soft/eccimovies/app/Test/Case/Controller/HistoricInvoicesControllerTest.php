<?php
App::uses('HistoricInvoicesController', 'Controller');

class HistoricInvoicesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.historic_invoice',
		'app.category',
		'app.subcategory',
	);

	public function testEditStatus() {
		$result = $this->testAction('/historic_invoices/edit_status/1');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/historic_invoices/view');
		debug($result);
	}

	public function testPrintData() {
		$result = $this->testAction('/historic_invoices/printData');
		debug($result);
	}

}
