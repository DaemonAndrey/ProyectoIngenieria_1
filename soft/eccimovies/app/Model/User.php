<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	// Se va a usar esta tabla de la BD
	//public $useTable = 'usuario';
	
	// Valida los campos de la tabla a la hora de registrar
    public $validate = array(
        'username' => array( 
							'regla1' => array
											(
												'rule' => array('notBlank'),
												'message' => 'Debe escribir un correo electrónico.'
											),
							'regla2' => array
											(
												'rule' => array('isUnique'),
												'message' => 'Este correo ya ha sido registrado.'
											)
							),
        'password' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Debe escribir una contaseña.'
											),
							'regla2' => array(
											'rule' => array('minLength', '8'),
											'message' => 'Debe tener al menos 8 caracteres.'
											)
						),
		'first_name' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Debe escribir su nombre de pila.'
											),
							'regla2' => array(
											'rule'    => array('custom', '/^[a-zA-Z \-]*$/'),
											'message' => 'No se permiten caracteres especiales.'
											)
							),
		'last_name' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Debe escribir sus apellidos.'
											),
							'regla2' => array(
											'rule'    => array('custom', '/^[a-zA-Z \-]*$/'),
											'message' => 'No se permiten caracteres especiales.'
											)
							),
		'birthday' => array(
							'regla1' => array(
											'rule' => 'date',
											'allowEmpty' => false,
											'message' => 'Debe seleccionar su fecha de nacimiento.'
											)
							),
		'gender' => array(
						'regla1' => array(
<<<<<<< HEAD
										'rule' => array('inList', array('M', 'F')),
=======
										'rule' => array('inList', array(1, 0)),
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
										'allowEmpty' => false,
										'message' => 'Debes seleccionar uno.'
										)
						),
        'role' => array(
					'valid' => array(
<<<<<<< HEAD
								'rule' => array('inList', array(0, 1, 2)),
=======
								'rule' => array('inList', array('Comprador', 'Administrador', 'Gerente')),
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
								'allowEmpty' => false,
								'message' => 'Debes seleccionar uno.'
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