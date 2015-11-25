<?php

class InvoiceFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Invoice',
	//	'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'shippping_price' => '',
			'tax' => '',
			'total' => '',
			'payment_method_id' => 1,
			'address_id' => 1,
			'date' => '2015-11-16'
		),
	);

}
