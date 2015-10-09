<?php
class UsersControllerTest extends ControllerTestCase {
    public $fixtures = array('app.user');
	
<<<<<<< HEAD
	public function testIndex()
	{
=======
	public function testIndex() {
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
        $result = $this->testAction('/users/index');
        debug($result);
    }
	
	public function testLogged()
	{
		$result = $this->testAction('/users/logged');
        debug($result);
	}
	
	public function testLogout()
	{
		$result = $this->testAction('/users/logout');
        debug($result);
	}
	
<<<<<<< HEAD
	public function testSignup()
	{
        $data = array(
					'User' => array(
									'username' => 'jocajime@gmail.com',
									'password' => 'jocajime',
									'first_name' => 'Jose',
									'last_name' => 'Jimenez',
									'gender' => '1',
									'birthday' => '1992-05-09'
									)
					);
        $result = $this->testAction(
									'/users/signup',
									array('data' => $data, 'method' => 'post')
=======
	public function testRegistrar() {
        $data = array(
            'User' => array(
                'username' => 'jocajime@gmail.com',
				'password' => 'jocajime',
				'first_name' => 'Jose',
				'last_name' => 'Jimenez',
				'gender' => '1',
				'birthday' => '1992-05-09'
            )
        );
        $result = $this->testAction(
            '/users/registrar',
            array('data' => $data, 'method' => 'post')
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
        );
        debug($result);
    }
	
	public function testLogin() {
        $data = array(
<<<<<<< HEAD
					'User' => array(
									'username' => 'nombre@gmail.com',
									'password' => 'contrapassword',
									'first_name' => 'Nombre',
									'last_name' => 'Apellido',
									'gender' => '1',
									'birthday' => '1990-08-09'
									)
					);
        $result = $this->testAction(
									'/users/signup',
									array('data' => $data, 'method' => 'post')
									);
		
		$data2 = array(
						'User' => array(
										'username' => 'nombre@gmail.com',
										'password' => 'contrapassword'
										)
						);
        $result2 = $this->testAction(
									'/users/login',
									array('data' => $data2, 'method' => 'post')
								);
=======
            'User' => array(
                'username' => 'nombre@gmail.com',
				'password' => 'contrapassword',
				'first_name' => 'Nombre',
				'last_name' => 'Apellido',
				'gender' => '1',
				'birthday' => '1990-08-09'
            )
        );
        $result = $this->testAction(
            '/users/registrar',
            array('data' => $data, 'method' => 'post')
        );
		
		$data2 = array(
            'User' => array(
                'username' => 'nombre@gmail.com',
				'password' => 'contrapassword'
            )
        );
        $result2 = $this->testAction(
            '/users/login',
            array('data' => $data2, 'method' => 'post')
        );
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
        debug($result2);
    }
}
?>