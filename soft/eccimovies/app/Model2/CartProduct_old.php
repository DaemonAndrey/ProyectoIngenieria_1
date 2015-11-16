<?php

App::uses('AppModel', 'Model');

class CartProduct extends AppModel
{
    public $useTable = 'carts_products';
    public $belongsTo = array('Cart','Product');
}

?>