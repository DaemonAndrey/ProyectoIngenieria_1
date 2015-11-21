<?php

class InvoicesProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'InvoicesProduct',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'invoice_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'price' => ''
		),
	);

}
