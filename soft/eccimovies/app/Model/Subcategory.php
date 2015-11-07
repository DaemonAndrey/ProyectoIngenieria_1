<?php
class Subcategory extends AppModel {
	public $belongsTo = 'Category';
	public $hasMany = 'Product';

	public $validate = array(
		'category_name' => array(
			'rule' => 'notBlank'
		)
	);
}
?>
