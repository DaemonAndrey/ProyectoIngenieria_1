<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend>
				<?php echo __('Ingresa a tu cuenta'); ?>
			</legend>
			<?php // Campos para llenar informacion
				echo $this->Form->input('username', array(
														'label' => 'Correo Electrónico',
														'type' => 'email'
														)
										);
				echo $this->Form->input('password', array(
															'label' => 'Contraseña',
															'type' => 'password'
															)
										);
			?>
		</fieldset>

	<?php // TABLA PARA QUE LOS BOTONES QUEDEN ACOMODADOS ?>
	<table style="width:40%">
	  <tr>
		<td><?php echo $this->Form->end(__('Ingresar')); ?> </td>
		<td><label for="Registrar" style="font-size: 12px;">¿Aún no tienes una cuenta?</label>
			<input type="submit" name="Registrar" id="Registrar" value="Regístrese" style="font-size: 16px;" onclick="window.location='/eccimovies/users/signup';" /></td> 
	  </tr>
	</table>
</div>