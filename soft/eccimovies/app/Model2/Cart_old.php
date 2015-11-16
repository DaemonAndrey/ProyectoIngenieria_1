<?php

App::uses('AppModel', 'Model');

class Cart extends AppModel
{
    public $belongsTo = array
    (
        'User' => array('className' => 'User',
						'foreignKey' => 'user_id',
						'conditions' => array('User.enable' => '1'),
						'fields' => 'id'
					)
    );
	
	public $hasMany = array('CartProduct');
    
    public $hasAndBelongsToMany = array
    (
        'Product' => array(	'className' => 'Product',
							'joinTable' => 'carts_products',
							'foreignKey' => 'cart_id',
							'associationForeignKey' => 'product_id',
							'unique' => 'keepExisting',
							'fields' => array('name','price')
						)
    );
    
    public $validate = array(	'user_id' => array(	'regla1' => array(	'rule' => array('notBlank'),
																		'message' => 'The cart must be link to a user.'
																	),
													'regla2' => array(	'rule' => 'isUnique',
																		'message' => 'You already have a cart!'
																	)
												),
								'subtotal' => array('regla1' => array(	'rule' => array('comparison', '>=', 0),
																		'message' => 'The subtotal cannot be a negative number.'
																	)
												)
							);
}
?>