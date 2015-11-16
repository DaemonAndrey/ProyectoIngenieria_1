<?php
App::uses('PaymentMethod', 'Model');

class PaymentMethodTest extends CakeTestCase {

	public $fixtures = array(
		'app.payment_method',
		'app.user',
		'app.invoice',
		'app.address',
		'app.state',
		'app.product',
		'app.invoices_product'
	);

	public $autoFixtures = false;

	public function testPaymentMethodModel() {
		$result = $this->loadFixtures('PaymentMethod');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->PaymentMethod = ClassRegistry::init('PaymentMethod');
	}

	public function tearDown() {
		unset($this->PaymentMethod);

		parent::tearDown();
	}

}
