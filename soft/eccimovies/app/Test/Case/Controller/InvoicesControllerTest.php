<?php
App::uses('InvoicesController', 'Controller');

/**
 * InvoicesController Test Case
 */
class InvoicesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoice',
/*		'app.address',
		'app.payment_method',
		'app.user',
		'app.product',
		'app.cart_product',
		'app.cart',
//		'app.invoice_product'*/
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$result = $this->testAction('/invoices/index');
		debug($result);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$result = $this->testAction('/invoices/view/1');
		debug($result);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$result = $this->testAction('/invoices/add');
		debug($result);
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$result = $this->testAction('/invoices/edit/1');
		debug($result);
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$result = $this->testAction('/invoices/delete/1');
		debug($result);
	}

/**
 * testCheck method
 *
 * @return void
 */
	public function testCheck() {
		$result = $this->testAction('/invoices/check');
		debug($result);
	}

/**
 * testMyInvoices method
 *
 * @return void
 */
	public function testMyInvoices() {
		$result = $this->testAction('/invoices/my_invoices');
		debug($result);
	}

/**
 * testViewInvoice method
 *
 * @return void
 */
	public function testViewInvoice() {
		$result = $this->testAction('/invoices/view_invoice');
		debug($result);
	}

}
