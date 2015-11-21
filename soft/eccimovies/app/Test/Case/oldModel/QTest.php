<?php
App::uses('q', 'Model');

/**
 * q Test Case
 */
class qTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_method',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->q = ClassRegistry::init('q');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->q);

		parent::tearDown();
	}

}
