<?php
App::uses('Subcategory', 'Model');

class SubcategoryTest extends CakeTestCase {
	public $fixtures = array('plugin.debug_kit.subcategory');
	public $useDbConfig = 'test';
	public $dropTables = false;
	
	public function testSubcategoriesModel() {
        $result = $this->loadFixtures('Subcategory');
		debug($result);
    }
}
?>
