<?php
/**
 * CartProduct Fixture
 */
class CartProductFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'CartProduct', 'records' => true);

	public $records = array(
		array(
			'id'				=> 1,
			'cart_id'			=> 1,
			'product_id'		=> 5,
			'quantity'			=> 6,
		)
	);

}
