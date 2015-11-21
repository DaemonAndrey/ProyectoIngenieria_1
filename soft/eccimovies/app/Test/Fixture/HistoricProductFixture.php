<?php

class HistoricProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Address',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'product_quantity' => 1,
			'product_price' => '',
			'product_name' => 'Lorem ipsum dolor sit amet',
			'product_format' => 'Lorem ipsum dolor sit amet'
		),
	);

}
