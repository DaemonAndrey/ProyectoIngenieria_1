<?php
class SubcategoryControllerTest extends ControllerTestCase{

	public $fixtures = array('app.subcategory');
	//public $dropTables = false;
	//public function truncate($db){ return null; }
    //public function drop($db){ return null; }

	public function testAdminIndex() {
		$result = $this->testAction('/subcategories/admin_index');
		debug($result);
	}

	public function testAgregarSubcategorias() {
		$result = $this->testAction('/subcategories/add');
		debug($result);
	}

	public function testEditarSubcategorias() {
		$result = $this->testAction('/subcategories/edit/1');
		debug($result);
	}
}
?>
