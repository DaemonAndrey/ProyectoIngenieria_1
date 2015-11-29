<?php
App::uses('ProductsController', 'Controller');

class ProductsControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.product',
		'app.subcategory',
		'app.carts_product',
		'app.actors_product',
		'app.actor',
		'app.category',
	);
    
	public function testIndex() {
		$result = $this->testAction('/products/index');
		debug($result);
	}

	public function testView() {
		$result = $this->testAction('/products/view/1');
		debug($result);
	}

	public function testAdd() {
		$result = $this->testAction('/products/add');
		debug($result);
	}

	public function testEdit() {
		$result = $this->testAction('/products/edit/1');
		debug($result);
	}

	public function testDelete() {
		$result = $this->testAction('/products/delete/1');
		debug($result);
	}

	public function testBuscar() {
/*		$result = $this->testAction('/products/buscar');
		debug($result);*/
	}

	public function testSearchTitle() {
/*		$result = $this->testAction('/products/searchTitle/');
		debug($result);*/
	}

	public function testSearchActor() {
/*		$result = $this->testAction('/products/searchActor/');
		debug($result);*/
	}

	public function testSearchDirector() {
/*		$result = $this->testAction('/products/searchDirector/');
		debug($result);*/
	}
	public function testUpdateDiscount() {
		$result = $this->testAction('/products/UpdateDiscount');
		debug($result);
	} 
}
