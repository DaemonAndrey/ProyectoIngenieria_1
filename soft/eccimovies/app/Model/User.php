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
												'message' => 'Intrduce your e-mail address.'
											),
							'regla2' => array
											(
												'rule' => array('isUnique'),
												'message' => 'This e-mail has been already registered.'
											),
                            'regla3' => array
											(
												'rule' => array('isUnique'),
												'message' => 'This e-mail has been already registered.'
											)
							),
        'password' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Introduce a password.'
											),
							'regla2' => array(
											'rule' => array('minLength', '8'),
											'message' => 'Must contain at least 8 characters.'
											)
						),
        'repass' => array(
                                            'equaltofield' => array(
                                            'rule' => array('equaltofield','password'),
                                            'message' => 'Passwords do not match.',
                                            //'allowEmpty' => false,
                                            //'required' => false,
                                            //'last' => false, // Stop validation after this rule
                                            'on' => 'create', // Limit validation to 'create' or 'update' operations
                                            )                                
                        ),   
		'first_name' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Introduce your first name.'
											),
							'regla2' => array(
											'rule'    => array('custom', '/^[a-zA-Z \-]*$/'),
											'message' => 'No special characters allowed.'
											)
							),
		'last_name' => array(
							'regla1' => array(
											'rule' => 'notBlank',
											'message' => 'Introduce your last name.'
											),
							'regla2' => array(
											'rule'    => array('custom', '/^[a-zA-Z \-]*$/'),
											'message' => 'No special characters allowed.'
											)
							),
		'birthday' => array(
							'regla1' => array(
											'rule' => 'date',
											'allowEmpty' => false,
											'message' => 'Select your birth date.'
											)
							),
		'gender' => array(
						'regla1' => array(
										'rule' => array('inList', array('M', 'F')),
										'allowEmpty' => false,
										'message' => 'Select one.'
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
    
    function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    } 
}
?>