<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Formulario de Registro'); ?></legend>
		
		<?php  // Campos para llenar informacion
			echo $this->Form->input('username', array(
														'label' => 'Correo Electrónico',
														'type' => 'email'
													 )
									);
			echo $this->Form->input('password', array(
														'label' => 'Contraseña',
														'type' => 'password',
														'rule' => array('minLength', '8')
														)
									);
			echo $this->Form->input('first_name', array(
														'label' => 'Nombre de Pila'
														)
									);
			echo $this->Form->input('last_name', array(
														'label' => 'Apellidos'
														)
									);
			echo $this->Form->input('birthday', array(
														'label' => 'Fecha de Nacimiento',
														'dateFormat' => 'DMY',
														'minYear' => date('Y') - 100,
														'maxYear' => date('Y')
														)
									);
			echo $this->Form->input('gender', array(
													'options' => array(
<<<<<<< HEAD
																		'M' => 'Hombre',
																		'F' => 'Mujer'
=======
																		1 => 'Hombre',
																		0 => 'Mujer'
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
																	  )
													)
									);
			/*echo $this->Form->input('role', array(
												'options' => array(
<<<<<<< HEAD
																0 => 'Comprador',
																0 => 'Administrador',
																0 => 'Gerente'
=======
																'Comprador' => 'Comprador',
																'Administrador' => 'Administrador',
																'Gerente' => 'Gerente'
>>>>>>> bc95873fc318bae3dd4d63cbd91d7440ee2b8cc7
																)
												)
									);
			*/
		?>
		
    </fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>