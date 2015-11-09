<?php
App::uses('PaymentMethodsController', 'Controller');

class PaymentMethodsControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.payment_method',
		'app.user'
	);

	public $autoFixtures = false;

	public function testIsOwnedBy() {
		//$result = $this->testAction('/payment_methods/');
		//debug($result);
	}

	public function testIndex() {
		$result = $this->testAction('/payment_methods/index');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/payment_methods/view/1');
		debug($result);
	}

	public function testAddCard() {
		$result = $this->testAction('/payment_methods/add_card');
		debug($result);
	}

	public function testAddPaypal() {
		$result = $this->testAction('/payment_methods/add_paypal');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/payment_methods/delete/1');
		debug($result);
	}

}

?>
