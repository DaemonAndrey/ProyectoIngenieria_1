<?php
App::uses('PaymentMethod', 'Model');

class PaymentMethodTest extends CakeTestCase {

	public $useDbConfig = 'test';

	public $fixtures = array(
		'app.payment_method',
//		'app.user'
	);

	public $autoFixtures = false;

	public function setUp() {
		parent::setUp();
		$this->PaymentMethod = ClassRegistry::init('PaymentMethod');
	}

	public function testPaymentMethodModel() {
		//$result = $this->loadFixtures('PaymentMethod');
	}

	public function tearDown() {
		unset($this->PaymentMethod);

		parent::tearDown();
	}

}
