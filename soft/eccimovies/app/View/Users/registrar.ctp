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
														array('minLength', '8')
														)
									);
			echo $this->Form->input('nombre_pila', array('label' => 'Nombre de Pila',));
			echo $this->Form->input('apellidos');
			echo $this->Form->input('fecha_nacimiento', array(
															'label' => 'Fecha de Nacimiento',
															'dateFormat' => 'DMY',
															'minYear' => date('Y') - 100,
															'maxYear' => date('Y')
															)
									);
			echo $this->Form->input('sexo', array(
												'options' => array(
																	1 => 'Hombre',
																	0 => 'Mujer'
																	)
												)
									);
			echo $this->Form->input('rol', array(
											'options' => array(
															'Comprador' => 'Comprador',
															'Administrador' => 'Administrador',
															'Gerente' => 'Gerente'
															)
												)
								);
		?>
		
    </fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>