<?php
App::uses('AppModel', 'Model');
/**
 * HistoricProduct Model
 *
 * @property HistoricInvoice $HistoricInvoice
 */
class HistoricInvoicesHistoricProduct extends AppModel {


	public $belongsTo = array('HistoricInvoice','HistoricProduct');


}
