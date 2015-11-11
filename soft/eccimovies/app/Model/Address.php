<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property User $User
 * @property Invoice $Invoice
 */
class Address extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'full_address';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'full_address' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'You must enter your full address',
				'allowEmpty' => false,
				'required' => true,
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'You must enter your full address',
				'allowEmpty' => false,
				'required' => true,
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'You must enter your full address',
				'allowEmpty' => false,
				'required' => true,
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'address_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
