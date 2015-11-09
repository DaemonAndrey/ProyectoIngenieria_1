<?php
class ProductTest extends CakeTestCase {

    public $fixtures = array('app.product');
	//public $dropTables = false;

	public function testProductModel(){
        $this->loadFixtures('Product');
    }
}
?>
