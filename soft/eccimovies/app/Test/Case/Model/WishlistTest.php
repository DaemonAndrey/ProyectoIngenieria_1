<?php
App::uses('Wishlist', 'Model');

class WishlistTest extends CakeTestCase {

	public $fixtures = array(
		'app.wishlist',
	);

	public $autoFixtures = false;

	public function testWishlistModel() {
		$result = $this->loadFixtures('Wishlist');
		debug($result);
	}

	public function setUp() {
		parent::setUp();
		$this->Wishlist = ClassRegistry::init('Wishlist');
	}

	public function tearDown() {
		unset($this->Wishlist);

		parent::tearDown();
	}

}
