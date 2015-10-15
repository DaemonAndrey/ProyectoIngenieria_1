<?php
class ProductTest extends CakeTestCase {
    public $fixtures = array('plugin.debug_kit.product');
	
	public function testProductModel()
	{
        $this->loadFixtures('Product');
    }
	public $dropTables = false;
}
?>