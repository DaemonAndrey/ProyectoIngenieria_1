<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class PaymentMethod extends AppModel
{
    public $belongsTo = array('User' => array(
											'className'  => 'User',
											'foreignKey' => false,
											'conditions' => 'PaymentMethod.user_id = User.username'
											),
							);

    // Valida los campos de la tabla Productos a la hora de agregar
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
?>
