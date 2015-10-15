<?php
class ProductsControllerTest extends ControllerTestCase {
	
    public $fixtures = array('app.product');
	public $dropTables = false;
	public function truncate($db) { return null; }
    public function drop($db) { return null; }
	
	public function testAgregarProducto() {
        $data = array('Product' => array('id'             => 'GMR-2072',
									     'name'           => 'Whiplash',
									     'price'          =>  16.31,
									     'stock_quantity' =>  383,
									     'format'         => 'Bluray',
									     'languages'      => 'Inglés, Español',
								         'subtitles'      => 'Español, Inglés, Francés, Alemán',
									     'release_year'   => '2014',
									     'runtime'        =>  107,
									     'more_details'   => 'Director: Damien Chazelle; Productor: David Lancaste',
									    )
					);
        $result = $this->testAction('/products/add',
									array('data' => $data, 'method' => 'post')
								   );
        debug($result);
    }
	
	public function testBorrarProducto() {	
		$data = array('Product' => array('id'             => 'GMR-2072',
									     'name'           => 'Whiplash',
									     'price'          =>  16.31,
									     'stock_quantity' =>  383,
									     'format'         => 'DVD',
									     'languages'      => 'Inglés, Chino',
									     'subtitles'      => 'Español, Inglés, Francés, Chino',
									     'release_year'   => '2014',
									     'runtime'        =>  107,
								         'more_details'   => 'Director: Damien Chazelle; Productor: David Lancaste',
									    )
					);
        $result = $this->testAction('/products/delete/'.$data['Product']['id']);
        debug($result);
	}
	
	public function testEditarProducto() {
		$data = array('Product' => array('id'             => 'GMR-2072',
									     'name'           => 'Whiplash',
									     'price'          =>  16.31,
									     'stock_quantity' =>  383,
									     'format'         => 'DVD',
									     'languages'      => 'Inglés, Chino',
									     'subtitles'      => 'Español, Inglés, Francés, Chino',
									     'release_year'   => '2014',
								         'runtime'        =>  107,
								         'more_details'   => 'Director: Damien Chazelle; Productor: David Lancaste',
									    )
					);
        $result = $this->testAction('/products/edit/'.$data['Product']['id']);
        debug($result);
	}
}
?>