<?php

class CartFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Cart',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'subtotal' => 20,
		),
	);

}
