<?php
class SubcategoryFixture extends CakeTestFixture {

	public $useDbConfig = 'test';
	public function truncate($db){ return null; }
    public function drop($db){ return null; }

	public $fields = array('id' => array('type' => 'integer', 'key' => 'primary'),
		                                 'category_id' => 'integer',
		                                 'subcategory_name' => array('type' => 'string',
			                                                         'length' => 32,
		                                                             ),
	                       );
	public function init() {
	       $records = array( array('id' => 1,
			                       'category_id' => 1,
			                       'subcategory_name' => 'Docudrama'
		                          ),
							 array('id' => 2,
								   'category_id' => 1,
								   'subcategory_name' => 'Tragedia'
								  ),
							 array('id' => 3,
								   'category_id' => 6,
								   'subcategory_name' => 'Espía'
							      ),
							 array('id' => 4,
								   'category_id' => 6,
								   'subcategory_name' => 'Thriller'
							      ),
							 array('id' => 5,
								   'category_id' => 6,
								   'subcategory_name' => 'Artes marciales'
							      ),
							 array('id' => 6,
								   'category_id' => 6,
								   'subcategory_name' => 'Lejano oeste'
							      ),
							 array('id' => 7,
								   'category_id' => 8,
								   'subcategory_name' => 'Detective'
								  ),
							 array('id' => 8,
								   'category_id' => 8,
								   'subcategory_name' => 'Mafia'
							      ),
							 array('id' => 9,
								   'category_id' => 8,
								   'subcategory_name' => 'Judicial'
							      ),
							 array('id' => 10,
								   'category_id' => 9,
								   'subcategory_name' => 'Superhéroe'
							      ),
							 array('id' => 11,
								   'category_id' => 9,
								   'subcategory_name' => 'Heróica'
							      ),
							 array('id' => 12,
								   'category_id' => 9,
								   'subcategory_name' => 'Épica'
							      ),
							 array('id' => 13,
								   'category_id' => 9,
								   'subcategory_name' => 'Hadas'
								  ),
							 array('id' => 14,
								   'category_id' => 10,
								   'subcategory_name' => 'Desastre'
							      ),
							array('id' => 15,
								  'category_id' => 10,
								  'subcategory_name' => 'Biografía'
							     ),
							array('id' => 16,
								  'category_id' => 12,
								  'subcategory_name' => 'Chick flick'
							     ),
							array('id' => 17,
								  'category_id' => 12,
								  'subcategory_name' => 'Melodrama'
							     ),
							array('id' => 18,
								  'category_id' => 7,
								  'subcategory_name' => 'Aventura'
							),
							array('id' => 19,
								  'category_id' => 7,
								  'subcategory_name' => 'Animada'
							),
							array('id' => 20,
								  'category_id' => 17,
								  'subcategory_name' => 'Sangrienta'
							),
							array('id' => 21,
								  'category_id' => 17,
								  'subcategory_name' => 'Suspenso'
							),
							array('id' => 22,
								  'category_id' => 17,
								  'subcategory_name' => 'Paranormal'
							),
							array('id' => 23,
								  'category_id' => 17,
								  'subcategory_name' => 'Monstruos'
							),
							array('id' => 24,
								  'category_id' => 15,
								  'subcategory_name' => 'Futurística'
							),
							array('id' => 25,
								  'category_id' => 15,
								  'subcategory_name' => 'Espacial'
							),
							array('id' => 26,
								  'category_id' => 15,
								  'subcategory_name' => 'Apocalíptica'
							),
							array('id' => 27,
								  'category_id' => 2,
								  'subcategory_name' => 'Comedia romántica'
							),
							array('id' => 28,
								  'category_id' => 2,
								  'subcategory_name' => 'Parodia'
							)
	                   );
		parent::init();
	  }
}
?>
