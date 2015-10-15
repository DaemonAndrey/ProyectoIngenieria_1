<?php
class CategoryFixture extends CakeTestFixture {

	public $useDbConfig = 'test';
	public function truncate($db){ return null;	}
    public function drop($db){ return null; }
	
	public $fields = array('id' => array('type' => 'integer', 'key' => 'primary'),
		                   'category_name' => array(
												   'type' => 'string',
												   'length' => 32,
													),
							);
	public function init() {
		$records = array( array('id' => 1,
									   'category_name' => 'Drama'
									  ),
								 array('id' => 2,
									   'category_name' => 'Comedia'
									  ),
								 array('id' => 6,
									   'category_name' => 'Acción'
									  ),
								 array('id' => 7,
									   'category_name' => 'Familiar'
									  ),
								 array('id' => 8,
									   'category_name' => 'Crimen'
									  ),
								 array('id' => 9,
									   'category_name' => 'Fantasía'
									  ),
								 array('id' => 10,
									   'category_name' => 'Histórica'
									  ),
								 array('id' => 12,
									   'category_name' => 'Romántica'
									  ),
								 array('id' => 15,
									   'category_name' => 'Ciencia ficción'
									  ),
								 array('id' => 17,
									   'category_name' => 'Terror'
									  )
								);
		parent::init();
	}
}
?>
