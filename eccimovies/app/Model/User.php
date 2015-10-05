<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	// Se va a usar esta tabla de la BD
	//public $useTable = 'usuario';
	
	// Valida los campos de la tabla a la hora de registrar
    public $validate = array(
        'username' => array( 
						'required' => array(
											'rule' => 'notBlank',
											'message' => 'No es un correo válido.'
											)
							),
        'password' => array(
							'required' => array(
											'rule' => 'notBlank',
											'message' => 'Debe tener al menos 8 caracteres.'
											)
						),
		'nombre_pila' => array(
							'required' => array(
											'rule' => 'notBlank',
											'message' => 'Sólo se permiten letras.'
											)
						),
		'apellidos' => array(
							'required' => array(
											'rule' => 'notBlank',
											'message' => 'Sólo se permiten letras.'
											)
							),
		'fecha_nacimiento' => array(
									'required' => array(
													'rule' => 'date',
													'message' => 'No puedes dejar este campo vacío.'
													)
								),
		'sexo' => array(
						'required' => array(
										'rule' => array('inList', array(1, 0)),
										'message' => 'Debes seleccionar uno.',
										'allowEmpty' => false
										)
						),
        'rol' => array(
					'valid' => array(
								'rule' => array('inList', array('Comprador', 'Administrador', 'Gerente')),
								'message' => 'Debes seleccionar uno.',
								'allowEmpty' => false
								)
					)	
    );
	
	public function beforeSave($options = array())
	{
		if (isset($this->data[$this->alias]['password']))
		{
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}

?>