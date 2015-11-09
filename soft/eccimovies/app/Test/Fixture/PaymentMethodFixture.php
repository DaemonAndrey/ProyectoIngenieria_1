<?php

class PaymentMethodFixture extends CakeTestFixture {

	public $useDbConfig = 'test';

	public $import = array(
		'connection' => 'default',
		'model' => 'PaymentMethod',
		'records' => true
	);

}

?>
