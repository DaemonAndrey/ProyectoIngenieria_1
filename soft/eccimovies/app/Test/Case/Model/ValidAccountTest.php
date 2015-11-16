<?php
App::uses('ValidAccount', 'Model');

/**
 * ValidAccount Test Case
 */
class ValidAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.valid_account'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ValidAccount = ClassRegistry::init('ValidAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ValidAccount);

		parent::tearDown();
	}

}
