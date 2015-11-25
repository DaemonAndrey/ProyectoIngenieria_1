<?php
App::uses('AppModel', 'Model');
/**
 * ActorsProduct Model
 *
 * @property Actor $Actor
 * @property Product $Product
 */
class ActorsProduct extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Actor' => array(
			'className' => 'Actor',
			'foreignKey' => 'actor_id',
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
