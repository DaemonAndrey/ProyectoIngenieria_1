<?php
class UserTest extends CakeTestCase {
    public $fixtures = array('app.user');
	
	public function testMyFunction() {
        $this->loadFixtures('User');
    }
}
?>