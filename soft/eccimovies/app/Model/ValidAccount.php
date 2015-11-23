<?php
App::uses('AppModel', 'Model');
/**
 * ValidAccount Model
 *
 */
class ValidAccount extends AppModel {

/**
 * Validation rules

 * @var array
 */
    
        public $validate = array(	
							'issuer' => array(
												'regla1' => array(
																'rule' => array('inList', array('Visa', 'MasterCard', 'AmericanExpress', 'PayPal')),
																'allowEmpty' => false,
																'message' => 'Introduce a payment method.'
																)
											),
											
							'account' => array(
												'regla1' => array
																(
																'rule' => array('notBlank'),
																'message' => 'Introduce your card number or paypal account.'
																)
											)
							);
    


}
