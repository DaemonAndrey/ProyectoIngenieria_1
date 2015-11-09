<?php
App::uses('AppController', 'Controller');

class StatesController extends AppController
{

	public $helpers = array('Html', 'Form', 'Flash', 'Js');
	public $components = array('Paginator', 'Flash', 'Session');

	public function get_by_country() {
		$country_id = $this->request->data['Address']['country_id'];
		$states = $this->State->find('list', array(
			'conditions' => array('State.country_id' => $country_id),
			'recursive' => -1)
		);
		$this->set('states', $states);
		$this->layout = 'ajax';
	}
}
