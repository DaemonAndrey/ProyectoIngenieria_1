<?php
App::uses('InvoicesController', 'Controller');

class InvoicesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.invoice',
		'app.address',
		'app.state',
		'app.payment_method',
		'app.invoices_product',
		'app.product',
		'app.cart',
		'app.carts_product',
		'app.historic_invoice',
		'app.historic_invoices_historic_product',
		'app.historic_product',
		'app.user',
		'app.subcategory',
		'app.actors_product',
		'app.actor',
	);

	public function testIndex() {
/*		$result = $this->testAction('/invoices/index/1');
		debug($result);*/
	}

	public function testView() {
/*		$result = $this->testAction('/invoices/view/1');
		debug($result);*/
	}

	public function testAdd() {
		$result = $this->testAction('/invoices/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/invoices/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/invoices/delete/1');
		debug($result);
	}

	public function testCheck() {
		$result = $this->testAction('/invoices/check');
		debug($result);
	}

	public function testMyInvoices() {
/*		$result = $this->testAction('/invoices/my_invoices');
		debug($result);*/
	}

	public function testViewInvoice() {
		$result = $this->testAction('/invoices/view_invoice/1');
		debug($result);
	}

}
