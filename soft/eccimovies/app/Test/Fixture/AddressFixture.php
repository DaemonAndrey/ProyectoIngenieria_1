<?php

class AddressFixture extends CakeTestFixture {

	public $useDbConfig = 'test';

	public $import = array(
		'connection' => 'default',
		'model' => 'Address',
		'records' => true
	);

}

?>
