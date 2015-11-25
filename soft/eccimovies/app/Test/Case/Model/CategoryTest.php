<?php
App::uses('Category', 'Model');

class CategoryTest extends CakeTestCase {

	public $fixtures = array(
		'app.category',
	);

	public $autoFixtures = false;

	public function testCategoryModel() {
		$result = $this->loadFixtures('Category');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Category = ClassRegistry::init('Category');
	}

	public function tearDown() {
		unset($this->Category);

		parent::tearDown();
	}

}
