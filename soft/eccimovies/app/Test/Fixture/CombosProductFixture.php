<?php

class CombosProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Address',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'combo_id' => 1,
			'product_id' => 1
		),
	);

}
