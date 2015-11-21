<?php
App::uses('Category', 'Model');

class CategoryTest extends CakeTestCase {
	
	public $useDbConfig = 'test';
	public $fixtures = array('plugin.debug_kit.category');
	public $dropTables = false;
	
	public function testCategoryModel()
	{
        $result = $this->loadFixtures('Category');
		debug($result);
    }	
}
?>
	