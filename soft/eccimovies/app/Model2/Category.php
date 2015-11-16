
<?php
	App::uses('AppModel', 'Model');


class Category extends AppModel {
	public $useTable = 'categories';

	public $displayField = 'category_name';

	public $hasMany = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $validate = array(
		'category_name' => array(
			'rule' => 'notBlank'
		)
	);
}
?>



