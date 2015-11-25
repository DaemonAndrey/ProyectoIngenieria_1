<?php
App::uses('CartsProduct', 'Model');

class CartsProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.carts_product',
	);

	public $autoFixtures = false;

	public function testCartsProductModel() {
		$result = $this->loadFixtures('CartsProduct');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->CartsProduct = ClassRegistry::init('CartsProduct');
	}

	public function tearDown() {
		unset($this->CartsProduct);

		parent::tearDown();
	}

}
