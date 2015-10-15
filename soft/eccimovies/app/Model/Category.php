<?php
class Category extends AppModel {
	public $hasMany = 'Subcategory';

	public $validate = array(
		'category_name' => array(
			'rule' => 'notBlank'
		)
	);
}
?>
