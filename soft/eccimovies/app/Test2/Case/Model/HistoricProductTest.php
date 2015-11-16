<?php
App::uses('HistoricProduct', 'Model');

/**
 * HistoricProduct Test Case
 */
class HistoricProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.historic_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HistoricProduct = ClassRegistry::init('HistoricProduct');
	}

	public function testHistoricProductModel() {
		$result = $this->loadFixtures('HistoricProduct');
		debug($result);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HistoricProduct);

		parent::tearDown();
	}

}
