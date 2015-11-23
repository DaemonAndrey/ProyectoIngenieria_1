<?php

class ValidAccountFixture extends CakeTestFixture {

	public $useDbConfig = 'test';

	public $import = array(
		'connection' => 'default',
		'model' => 'ValidAccount',
		'records' => true
	);

}

?>
