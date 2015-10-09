<?php
class UserFixture extends CakeTestFixture {

      // Optional.
      // Set this property to load fixtures to a different test datasource
      public $useDbConfig = 'test';
      public $fields = array(
<<<<<<< HEAD
						  'username' => array('type' => 'string', 'key' => 'primary'),
						  'password' => 'string',
						  'first_name' => 'string',
						  'last_name' => 'string',
						  'gender' => 'string',
						  'birthday' => 'date'
						  );
      public $records = array(
							  array(
								'username' => 'nombre1@gmail.com',
								'password' => 'contrapassword1',
								'first_name' => 'NombreUno',
								'last_name' => 'ApellidoUno',
								'gender' => '1',
								'birthday' => '1990-05-05'
							  ),
							  array(
								'username' => 'nombre2@gmail.com',
								'password' => 'contrapassword2',
								'first_name' => 'NombreDos',
								'last_name' => 'ApellidoDos',
								'gender' => '1',
								'birthday' => '1990-05-05'
							  ),
							  array(
								'username' => 'nombre3@gmail.com',
								'password' => 'contrapassword3',
								'first_name' => 'NombreTres',
								'last_name' => 'ApellidoTres',
								'gender' => '0',
								'birthday' => '1990-05-05'
							  )
						  );
=======
          'username' => array('type' => 'string', 'key' => 'primary'),
          'password' => 'string',
          'first_name' => 'string',
		  'last_name' => 'string',
		  'gender' => 'string',
		  'birthday' => 'date'
		  );
      public $records = array(
          array(
            'username' => 'nombre1@gmail.com',
			'password' => 'contrapassword1',
			'first_name' => 'NombreUno',
			'last_name' => 'ApellidoUno',
			'gender' => '1',
			'birthday' => '1990-05-05'
          ),
          array(
            'username' => 'nombre2@gmail.com',
			'password' => 'contrapassword2',
			'first_name' => 'NombreDos',
			'last_name' => 'ApellidoDos',
			'gender' => '1',
			'birthday' => '1990-05-05'
          ),
          array(
            'username' => 'nombre3@gmail.com',
			'password' => 'contrapassword3',
			'first_name' => 'NombreTres',
			'last_name' => 'ApellidoTres',
			'gender' => '0',
			'birthday' => '1990-05-05'
          )
      );
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
 }
 ?>