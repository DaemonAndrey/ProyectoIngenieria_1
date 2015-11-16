<?php
/**
 * Invoice Fixture
 */
class InvoiceFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Invoice', 'records' => true);

	public $records = array(
		array(
			'id'				=> 1,
			'shippping_price'			=> 10.00,
			'tax'			=> 22.38,
			'total'			=> 246.20,
			'payment_method_id'			=> 1,
			'address_id'			=> 1,
			'date'		=> NULL,
		)
	);

}
