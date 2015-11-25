<?php
App::uses('AppModel', 'Model');
/**
 * ProductsWishlist Model
 *
 * @property Wishlist $Wishlist
 * @property Product $Product
 */
class ProductsWishlist extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Wishlist' => array(
			'className' => 'Wishlist',
			'foreignKey' => 'wishlist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
