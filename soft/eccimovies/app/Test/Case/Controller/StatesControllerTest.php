<?php
App::uses('StatesController', 'Controller');

class StatesControllerTest extends ControllerTestCase {

	public $fixtures = array(
		'app.state',
		'app.country',
	);

	public function testGetByCountry() {
/*		$result = $this->testAction('/states/get_by_country');
		debug($result);*/
	}

}
