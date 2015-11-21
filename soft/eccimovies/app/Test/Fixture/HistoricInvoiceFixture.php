<?php

class HistoricInvoiceFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'HistoricInvoice',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'shippping_price' => '',
			'tax' => '',
			'total' => '',
			'payment_method_account' => 'Lorem ipsum dolor sit amet',
			'address_full_address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'user_gender' => 'Lorem ipsum dolor sit ame',
			'user_first_name' => 'Lorem ipsum dolor sit amet',
			'user_last_name' => 'Lorem ipsum dolor sit amet',
			'invoice_date' => '2015-11-16 02:40:49',
			'invoice_status' => 'Lorem ipsum dolor sit amet'
		),
	);

}
