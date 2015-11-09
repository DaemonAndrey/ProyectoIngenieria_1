<?php
/**
 * HistoricInvoice Fixture
 */
class HistoricInvoiceFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'HistoricInvoice', 'records' => true);

	public $records = array(
		array(
			'id'				=> 1,
			'shippping_price'			=> 10.00,
			'tax'			=> 22.38,
			'total'			=> 246.20,
			'payment_method_account'			=> '6496041476353349',
			'address_full_address'			=> '2956 Princeton, Boston, Massachusetts, United States, 02086',
		)
	);

}
