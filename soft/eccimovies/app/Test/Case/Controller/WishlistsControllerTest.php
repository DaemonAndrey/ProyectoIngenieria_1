<?php
App::uses('CartsController', 'Controller');

class WishlistsControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.wishlist',
		'app.user',
        'app.wishlists_product',
		'app.product',
        'app.subcategory',
        'app.carts_product',
        'app.actors_product',
        'app.actor',
	);

	public function testIndex() {
		$result = $this->testAction('/wishlists/index');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/wishlists/add');
		debug($result);
	}

	public function testAjaxRequest() {
		$result = $this->testAction('/wishlists/ajaxRequest');
		debug($result);
	}

	public function testAddToWishlist() {
/*		$data = array(
			'product_id' => 1,
			'quantity' => 3
		);
		$result = $this->testAction('/carts/addToCart/$data');
		debug($result);
*/	}

	public function testDelete() {
		$result = $this->testAction('/wishlists/delete/1');
		debug($result);
	}

	public function testEditWishlistProduct() {
/*		$result = $this->testAction('/wishlists/editWishlistProduct/1');
		debug($result);
*/	}

	public function testEdit() {
		$result = $this->testAction('/wishlists/edit/1');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/wishlists/view/1');
		debug($result);
	}

	public function testRemoveProductFromWishlist() {
		$result = $this->testAction('/wishlists/removeProductFromWishlist/1/1');
		debug($result);
	}

}
