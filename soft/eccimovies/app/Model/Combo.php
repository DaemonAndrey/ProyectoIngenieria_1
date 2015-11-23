<?php
App::uses('AppModel', 'Model');

class Combo extends AppModel {

	public $displayField = 'code';

	public $validate = array(
		'code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a unique code',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'A combo with this code already exists'
			)
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a name for the combo',
				'allowEmpty' => false,
			),
		),
		'Product' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please choose some products from the list',
				'allowEmpty' => false,
			),
		),
	);

	public $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'combos_products',
			'foreignKey' => 'combo_id',
			'associationForeignKey' => 'product_id',
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
