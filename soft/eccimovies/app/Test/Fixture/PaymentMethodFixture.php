<?php

class PaymentMethodFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'PaymentMethod',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'issuer' => 'Lorem ipsum dolor sit amet',
			'account' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'name_card' => 'Lorem ipsum dolor sit amet',
			'expiration' => '2015-11-16',
			'security_code' => 'L',
			'enable' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
