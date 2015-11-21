<?php

class ComboFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Combo',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'code' => 'Lorem ',
			'discount' => ''
		),
	);

}
