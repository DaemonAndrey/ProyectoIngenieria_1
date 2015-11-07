<?php
App::uses('AddressesController', 'Controller');

/**
 * AddressesController Test Case
 */
class AddressesControllerTest extends ControllerTestCase {

	public $dropTables = false;

	public function truncate($db){ return null;	}

	public function drop($db){ return null; }

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.address',
		//'app.user',
		//'app.cart',
		//'app.product',
		//'app.subcategory',
		//'app.category',
		//'app.actor',
		//'app.actors_product',
		//'app.carts_product',
		//'app.invoice',
		//'app.payment_method',
		//'app.invoices_product',
		//'app.wishlist',
		//'app.products_wishlist'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$result = $this->testAction('/addresses/index');
		debug($result);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$result = $this->testAction('/addresses/view/1');
		debug($result);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$result = $this->testAction('/addresses/add');
		debug($result);
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$result = $this->testAction('/addresses/edit/1');
		debug($result);
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$result = $this->testAction('/addresses/delete/1');
		debug($result);
	}

}
