<?php
class ProductFixture extends CakeTestFixture {

      // Optional.
      // Set this property to load fixtures to a different test datasource

	  public $useDbConfig = 'test';
      public $fields = array(
						  'id' => array('type' => 'string', 'key' => 'primary'),
						  'name' => 'string',
						  'price' => 'float',
						  'stock_quantity' => 'integer',
						  'format' => 'string',
						  'languages' => 'string',
						  'subtitles' => 'string',
						  'release_year' => 'datetime',
						  'runtime' => 'integer',
						  'more_details' => 'string',
						  );
						  
      public function init()
	  {
			$records = array(
								  array(
									  'id' => 'GMR-2072',
									  'name' => 'Whiplash',
									  'price' => 16.31,
									  'stock_quantity' => 383,
									  'format' => 'Bluray',
									  'languages' => 'Inglés, Español',
									  'subtitles' => 'Español, Inglés, Francés, Alemán',
									  'release_year' => '2014',
									  'runtime' => 107,
									  'more_details' => 'Director: Damien Chazelle; Productor: David Lancaste',
								  ),
								  array(
									  'id' => 'AQA-4470',
									  'name' => 'Los Vengadores',
									  'price' => 95.19,
									  'stock_quantity' => 283,
									  'format' => 'DVD',
									  'languages' => 'Español',
									  'subtitles' => 'Español, Inglés, Francés, Portugués',
									  'release_year' => '2012',
									  'runtime' => 143,
									  'more_details' => 'Director: Damien Chazelle; Productor: David Lancaste',
								  ),
								  array(
									  'id' => 'IYN-5172',
									  'name' => 'Toy Story 3',
									  'price' => 21.29,
									  'stock_quantity' => 58,
									  'format' => 'Bluray',
									  'languages' => 'Inglés, Español',
									  'subtitles' => 'Español, Inglés, Alemán, Portugués',
									  'release_year' => '2010',
									  'runtime' => 103,
									  'more_details' => 'Director: Damien Chazelle; Productor: David Lancaste',
								  )
							  );
			parent::init();
	  }
	  
	public function truncate($db)
	{
		return null;
	}

    public function drop($db)
	{
        return null;
    }
	  	  
 }
 ?>