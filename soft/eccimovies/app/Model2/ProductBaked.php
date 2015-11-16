<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Subcategory $Subcategory
 * @property Actor $Actor
 * @property Cart $Cart
 * @property Combo $Combo
 * @property Invoice $Invoice
 * @property Wishlist $Wishlist
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Actor' => array(
			'className' => 'Actor',
			'joinTable' => 'actors_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'actor_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Cart' => array(
			'className' => 'Cart',
			'joinTable' => 'carts_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'cart_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Combo' => array(
			'className' => 'Combo',
			'joinTable' => 'combos_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'combo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Invoice' => array(
			'className' => 'Invoice',
			'joinTable' => 'invoices_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'invoice_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Wishlist' => array(
			'className' => 'Wishlist',
			'joinTable' => 'products_wishlists',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'wishlist_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
