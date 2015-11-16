<?php
App::uses('AppModel', 'Model');
/**
 * HistoricProduct Model
 *
 * @property HistoricInvoice $HistoricInvoice
 */
class HistoricProduct extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'HistoricInvoice' => array(
			'className' => 'HistoricInvoice',
			'joinTable' => 'historic_invoices_historic_products',
			'foreignKey' => 'historic_product_id',
			'associationForeignKey' => 'historic_invoice_id',
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
