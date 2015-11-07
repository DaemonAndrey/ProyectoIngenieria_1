<?php
/**
 * Address Fixture
 */
class AddressFixture extends CakeTestFixture {

	public $useDbConfig = 'test';
	public function truncate($db){ return null;	}
	public function drop($db){ return null; }

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'utf16_spanish_ci', 'charset' => 'utf16'),
		'country' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'utf16_spanish_ci', 'charset' => 'utf16'),
		'state' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'utf16_spanish_ci', 'charset' => 'utf16'),
		'zipcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf16_spanish_ci', 'charset' => 'utf16'),
		'full_address' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf16_spanish_ci', 'charset' => 'utf16'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf16', 'collate' => 'utf16_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'user_id' => '1',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'Massachusetts',
			'zipcode' => '02086',
			'full_address' => '2956 Princeton, Boston, Massachusetts, United States, 02086'
		),
		array(
			'id' => '2',
			'user_id' => '2',
			'type' => 'Domicilio',
			'country' => 'United States',
			'state' => 'Iowa',
			'zipcode' => '50339',
			'full_address' => '258 122nd, Des Moines, Iowa, United States, 50339'
		),
		array(
			'id' => '3',
			'user_id' => '3',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'Texas',
			'zipcode' => '78232',
			'full_address' => '9156 Bryn Mawr Av, Corpus Christi, Texas, United States, 78232'
		),
		array(
			'id' => '4',
			'user_id' => '4',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'California',
			'zipcode' => '94074',
			'full_address' => '4802 Morse, Oakland, California, United States, 94074'
		),
		array(
			'id' => '5',
			'user_id' => '5',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'Texas',
			'zipcode' => '75969',
			'full_address' => '350 Hawthorne, Dallas, Texas, United States, 75969'
		),
		array(
			'id' => '6',
			'user_id' => '6',
			'type' => 'Domicilio',
			'country' => 'United States',
			'state' => 'Texas',
			'zipcode' => '76731',
			'full_address' => '780 Lowell, Fort Worth, Texas, United States, 76731'
		),
		array(
			'id' => '7',
			'user_id' => '7',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'Texas',
			'zipcode' => '70186',
			'full_address' => '6593 66th, Houston, Texas, United States, 70186'
		),
		array(
			'id' => '8',
			'user_id' => '8',
			'type' => 'Entrega',
			'country' => 'United States',
			'state' => 'Pennsylvania',
			'zipcode' => '19265',
			'full_address' => '1392 29th, Philadelphia, Pennsylvania, United States, 19265'
		),
		array(
			'id' => '9',
			'user_id' => '9',
			'type' => 'Domicilio',
			'country' => 'United States',
			'state' => 'Missouri',
			'zipcode' => '65735',
			'full_address' => '9958 Chicago Skyway Indianapolis Av, Springfield, Missouri, United States, 65735'
		),
		array(
			'id' => '10',
			'user_id' => '10',
			'type' => 'Domicilio',
			'country' => 'United States',
			'state' => 'California',
			'zipcode' => '95709',
			'full_address' => '6918 34th, Sacramento, California, United States, 95709'
		),
	);

}
