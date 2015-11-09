<?php

class PaymentMethodFixture extends CakeTestFixture {

	public $import = 'PaymentMethod';

	public $records = array(
		array(
			'id'				=> 1,
			'user_id'			=> 1,
			'issuer'			=> 'Visa',
			'account'			=> '6464376427754650',
			'password'			=> '???',
			'name_card'			=> 'Alani Estes',
			'expiration'		=> '2021-07-01',
			'security_code'		=> '234',
			'enable'			=> 1
		)
	);

}

?>
