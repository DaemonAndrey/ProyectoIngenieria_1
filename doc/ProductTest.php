<?php
class ProductTest extends CakeTestCase {
	
    public $fixtures = array('plugin.debug_kit.product');
	public $dropTables = false;
	
	public function testProductModel(){
        $this->loadFixtures('Product');
    }
}
?>