<?php

class HistoricInvoicesHistoricProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'HistoricInvoicesHistoricProduct',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'historic_invoice_id' => 1,
			'historic_product_id' => 1
		),
	);

}
