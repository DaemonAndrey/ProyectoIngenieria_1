<?php
class UserTest extends CakeTestCase {
	
    public $fixtures = array('plugin.debug_kit.user');
	public $dropTables = false;
	
	public function testUserModel(){
        $result = $this->loadFixtures('User');
		debug($result);
    }
}
?>



