<?php
App::uses( 'AppModel', 'Model' );
class Actor extends AppModel {
    public $actsAs = array('Containable');
    public $hasAndBelongsToMany = array(
        'Product' =>
            array(
                'className' => 'Product',
                'joinTable' => 'actors_products',
                'foreignKey' => 'actor_id',
                'associationForeignKey' => 'product_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => ''
            )
    );
}
