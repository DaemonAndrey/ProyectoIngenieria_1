<?php
App::uses('CartsController', 'Controller');

class CartsControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.cart',
		'app.user',
		'app.carts_product',
		'app.product',
	);

	public function testIndex() {
		$result = $this->testAction('/carts/index');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/carts/add');
		debug($result);
	}

	public function testAjaxRequest() {
		$result = $this->testAction('/carts/ajaxRequest');
		debug($result);
	}

	public function testAddToCart() {
/*		$data = array(
			'product_id' => 1,
			'quantity' => 3
		);
		$result = $this->testAction('/carts/addToCart/$data');
		debug($result);
*/	}

	public function testDelete() {
		$result = $this->testAction('/carts/delete/1');
		debug($result);
	}

	public function testEditCartProduct() {
/*		$result = $this->testAction('/carts/editCartProduct/1');
		debug($result);
*/	}

	public function testEdit() {
		$result = $this->testAction('/carts/edit/1');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/carts/view/1');
		debug($result);
	}

	public function testRemoveProductFromCart() {
		$result = $this->testAction('/carts/removeProductFromCart/1/1');
		debug($result);
	}

}
