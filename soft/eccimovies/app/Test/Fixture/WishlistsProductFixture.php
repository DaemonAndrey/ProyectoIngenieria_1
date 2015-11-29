<?php

class WishlistsProductFixture extends CakeTestFixture {

	public $import = array(
		'connection' => 'default',
		'model' => 'WishlistsProduct',
		'records' => true
	);

	public $records = array(
		array(
			'id' => 1,
			'wishlist_id' => 1,
			'user_id' => 1,
			'product_id' => 1
		),
	);

}
