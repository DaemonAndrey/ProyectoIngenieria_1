<?php
App::uses('AppModel', 'Model');
/**
 * HistoricInvoicesHistoricProduct Model
 *
 * @property HistoricInvoice $HistoricInvoice
 * @property HistoricProduct $HistoricProduct
 */
class HistoricInvoicesHistoricProduct extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
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
