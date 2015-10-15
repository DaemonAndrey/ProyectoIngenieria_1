<?php
class UserFixture extends CakeTestFixture {
	  public $useDbConfig = 'test';
      public $fields = array(
						  'username' => array('type' => 'string', 'key' => 'primary'),
						  'password' => 'string',
						  'first_name' => 'string',
						  'last_name' => 'string',
						  'gender' => 'string',
						  'birthday' => 'date'
						  );
						  
      public function init() {
			$records = array(
								  array(
									'username' => 'nombre1@gmail.com',
									'password' => 'contrapassword1',
									'first_name' => 'NombreUno',
									'last_name' => 'ApellidoUno',
									'gender' => 'M',
									'birthday' => '1990-05-05'
								  ),
								  array(
									'username' => 'nombre2@gmail.com',
									'password' => 'contrapassword2',
									'first_name' => 'NombreDos',
									'last_name' => 'ApellidoDos',
									'gender' => 'M',
									'birthday' => '1990-05-05'
								  ),
								  array(
									'username' => 'nombre3@gmail.com',
									'password' => 'contrapassword3',
									'first_name' => 'NombreTres',
									'last_name' => 'ApellidoTres',
									'gender' => 'F',
									'birthday' => '1990-05-05'
								  )
							  );
			parent::init();
	  }
	  
	public function truncate($db){
		return null;
	}

    public function drop($db){
        return null;
    }  	  
 }
 ?>