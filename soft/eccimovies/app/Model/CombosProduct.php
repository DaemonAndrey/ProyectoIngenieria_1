<?php
App::uses('AppModel', 'Model');
class CombosProduct extends AppModel {

	public $belongsTo = array(
		'Combo' => array(
			'className' => 'Combo',
			'foreignKey' => 'combo_id',
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
