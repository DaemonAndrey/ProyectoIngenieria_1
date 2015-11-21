<?php
App::uses('Country', 'Model');

class CountryTest extends CakeTestCase {

	public $useDbConfig = 'test';

	public $fixtures = array(
		'app.country',
	);

	public $autoFixtures = false;

	public function setUp() {
		parent::setUp();
		$this->Country = ClassRegistry::init('Country');
	}

	public function testCountryModel() {
		$result = $this->loadFixtures('Country');
	}

	public function tearDown() {
		unset($this->Country);

		parent::tearDown();
	}

}
