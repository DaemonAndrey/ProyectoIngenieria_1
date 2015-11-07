<?php

App::uses('AppModel', 'Model');

class CartProduct extends AppModel
{
    public $useTable = 'carts_products';
    public $belongsTo = array('Cart','Product');
    
    public $validate = array
    (
        'quantity' => array
        (
            'regla1' => array
            (
                'rule' => 'numeric',
                'message' => 'Only numbers greater than 0 are allowed.'
            )
        )
    );
}

?>