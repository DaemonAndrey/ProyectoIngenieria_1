<?php
App::uses('AppModel', 'Model');
/**
 * HistoricProduct Model
 *
 * @property HistoricInvoice $HistoricInvoice
 */
class HistoricInvoicesHistoricProduct extends AppModel {


	publci $belongsTo = array('HistoricInvoice','HistoricProduct');


}
