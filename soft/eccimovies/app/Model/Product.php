<?php
App::uses('AppModel', 'Model');
class Product extends AppModel {

	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $belongsTo = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
