<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');
	
	public function view($id = null)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Categoría inválida'));			
		}

		$catego = $this->Category->findById($id);

		if(!$catego)
		{
			throw new NotFoundException(__('No existe esa categoría'));
			
		}

		$this->set('catego',$catego);
	}
}