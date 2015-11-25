<?php

App::uses('AppModel', 'Model');

class Wishlist extends AppModel
{
    public $belongsTo = array
    (
        'User' => array('className' => 'User',
						'foreignKey' => 'user_id',
						'conditions' => array('User.enable' => '1'),
						'fields' => 'id'
					)
    );
	
	public $hasMany = array('WishlistProduct');
    

    
    public $validate = array(	'user_id' => array(	'regla1' => array(	'rule' => array('notBlank'),
																		'message' => 'The wishlist must be link to a user.'
																	),
													'regla2' => array(	'rule' => 'isUnique',
																		'message' => 'You already have a wishlist!'
																	)
												)
							);
}
?>