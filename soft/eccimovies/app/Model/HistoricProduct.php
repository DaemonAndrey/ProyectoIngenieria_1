<?php
App::uses('AppModel', 'Model');
class HistoricProduct extends AppModel {

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
