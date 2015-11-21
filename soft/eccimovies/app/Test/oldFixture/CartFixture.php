<?php
/**
 * Cart Fixture
 */
class CartFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Cart');

	public $records = array(
		array(
			'id'				=> 1,
			'user_id'			=> 1,
			'subtotal'			=> 5452,
		)
	);

}
