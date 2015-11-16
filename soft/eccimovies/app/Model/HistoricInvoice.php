<?php
App::uses('AppModel', 'Model');
class HistoricInvoice extends AppModel {

	public $validate = array(
		'payment_method_account' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $hasAndBelongsToMany = array(
		'HistoricProduct' => array(
			'className' => 'HistoricProduct',
			'joinTable' => 'historic_invoices_historic_products',
			'foreignKey' => 'historic_invoice_id',
			'associationForeignKey' => 'historic_product_id',
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
