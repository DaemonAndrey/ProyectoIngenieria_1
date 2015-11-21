<?php

class WishlistFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'Wishlist',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1
		),
	);

}
