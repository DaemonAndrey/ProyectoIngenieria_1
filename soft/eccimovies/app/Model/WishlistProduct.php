<?php

App::uses('AppModel', 'Model');

class WishlistProduct extends AppModel
{
    public $useTable = 'wishlists_products';
    public $belongsTo = array('Wishlist','Product');
}

?>