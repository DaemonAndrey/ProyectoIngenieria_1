<?php
App::uses('AppModel', 'Model');
class ActorsProduct extends AppModel {

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
