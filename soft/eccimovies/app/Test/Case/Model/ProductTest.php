<?php
App::uses('Product', 'Model');

class ProductTest extends CakeTestCase {

	public $fixtures = array(
		'app.product',
	);

	public $autoFixtures = false;

	public function testProductModel() {
		$result = $this->loadFixtures('Product');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('Product');
	}

	public function tearDown() {
		unset($this->Product);

		parent::tearDown();
	}

}
