<?php

class CartProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'CartProduct',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'cart_id' => 1,
			'product_id' => 1,
			'quantity' => 1
		),
	);

}
