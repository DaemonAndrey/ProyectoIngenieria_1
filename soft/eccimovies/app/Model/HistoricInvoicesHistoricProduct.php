<?php
App::uses('AppModel', 'Model');
class HistoricInvoicesHistoricProduct extends AppModel {

	public $validate = array(
		'historic_invoice_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'historic_product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $belongsTo = array(
		'HistoricInvoice' => array(
			'className' => 'HistoricInvoice',
			'foreignKey' => 'historic_invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'HistoricProduct' => array(
			'className' => 'HistoricProduct',
			'foreignKey' => 'historic_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
