<?php
/**
 * InvoiceProduct Fixture
 */
class InvoiceProductFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'InvoiceProduct', 'records' => true);

	public $records = array(
		array(
			'id'				=> 1,
			'invoice_id'			=> 10,
			'product_id'			=> 1,
			'quantity'			=> 3,
			'price'			=> 10.34,
		)
	);

}
