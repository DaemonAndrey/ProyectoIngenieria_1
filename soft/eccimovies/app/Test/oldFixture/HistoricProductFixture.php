<?php
/**
 * HistoricProduct Fixture
 */
class HistoricProductFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'HistoricProduct', 'records' => true);

	public $records = array(
		array(
			'id'				=> 1,
			'product_quantity'			=> 3,
			'product_price'			=> 10.34,
			'product_name'			=> 'Pixels',
			'product_format'			=> 'Blu-Ray',
		)
	);

}
