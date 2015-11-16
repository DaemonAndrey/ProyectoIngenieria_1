<?php
class CategoryControllerTest extends ControllerTestCase {
	public $fixtures = array('app.category');
	public $dropTables = false;
	
	public function truncate($db){ return null;	}

    public function drop($db){ return null; }

	public function testCategoriasAdminIndex() {
		$result = $this->testAction('/categories/admin_index');
		debug($result);
	}

	public function testAgregarCategorias() {
		$result = $this->testAction('/categories/add');
		debug($result);
	}

	public function testEditarCategorias() {
		$result = $this->testAction('/categories/edit/1');
		debug($result);
	}
}
?>
