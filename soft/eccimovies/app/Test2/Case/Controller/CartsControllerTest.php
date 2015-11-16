<?php
App::uses('CartsController', 'Controller');

/**
 * CartsController Test Case
 */
class CartsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cart',
/*		'app.user',
		'app.cart_product',
		'app.product',*/
	);

/**
 * testIndex method
 *
 * @return void
 */
/*	public function testIndex() {
		$result = $this->testAction('/carts/index');
		debug($result);
	}*/

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$result = $this->testAction('/carts/add');
		debug($result);
	}

/**
 * testAjaxRequest method
 *
 * @return void
 */
/*	public function testAjaxRequest() {
		$result = $this->testAction('/carts/ajax_request');
		debug($result);
	}*/

/**
 * testAddToCart method
 *
 * @return void
 */
/*	public function testAddToCart() {
		$result = $this->testAction('/carts/AddToCart/2');
		debug($result);
	}*/

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$result = $this->testAction('/carts/delete/1');
		debug($result);
	}

/**
 * testEditCartProduct method
 *
 * @return void
 */
/*	public function testEditCartProduct() {
		$result = $this->testAction('/carts/EditCartProduct');
		debug($result);
	}*/

/**
 * testEdit method
 *
 * @return void
 */
/*	public function testEdit() {
		$result = $this->testAction('/carts/edit/1');
		debug($result);
	}*/

/**
 * testView method
 *
 * @return void
 */
/*	public function testView() {
		$result = $this->testAction('/carts/view/1');
		debug($result);
	}*/

/**
 * testRemoveProductFromCart method
 *
 * @return void
 */
	public function testRemoveProductFromCart() {
		$result = $this->testAction('/carts/removeProductFromCart');
		debug($result);
	}

}
