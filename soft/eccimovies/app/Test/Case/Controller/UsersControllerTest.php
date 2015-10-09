<?php
class UsersControllerTest extends ControllerTestCase {
    public $fixtures = array('app.user');
	
	public function testIndex()
	{
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
        );
        debug($result);
    }
	
	public function testLogin() {
        $data = array(
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
        debug($result2);
    }
}
?>