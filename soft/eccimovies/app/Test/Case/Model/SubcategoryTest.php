<?php
App::uses('Subcategory', 'Model');

class SubcategoryTest extends CakeTestCase {

	public $fixtures = array(
		'app.subcategory',
	);

	public $autoFixtures = false;

	public function testSubcategoryModel() {
		$result = $this->loadFixtures('Subcategory');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Subcategory = ClassRegistry::init('Subcategory');
	}

	public function tearDown() {
		unset($this->Subcategory);

		parent::tearDown();
	}

}
