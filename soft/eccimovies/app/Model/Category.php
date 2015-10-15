
<?php
    App::uses('AppModel', 'Model');


class Category extends AppModel {
	public $useTable = 'categories';
    
    
    public $hasMany = 'Subcategory';

	public $validate = array(
		'category_name' => array(
			'rule' => 'notBlank'
		)
	);
}
?>



