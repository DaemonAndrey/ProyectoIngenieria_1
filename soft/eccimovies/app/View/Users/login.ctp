<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
        
    <header id="principal-header-text">
        <h1>Ingresa a tu cuenta</h1>
    </header>
        <div class="row">
            <div class="col-xs-9">
                <div class="form-group">
                    <label for="usr"><h4 style="font-family:Times New Roman; color:aliceblue;">Correo Electrónico:</h4></label>                    
                </div>            
            </div>
               
            <div class="col-xs-3">                
                <div class="form-group">
                    <input type="email" class="form-control" id="usr">                 
                </div>                  
            </div>

        </div>

        <div class="row">
            <div class="col-xs-9">
                 <div class="form-group">
                     <label for="pw"><h4 style="font-family:Times New Roman; color:aliceblue;">Contraseña:</h4></label>
                </div>
            </div>
            
            <div class="col-xs-3">
                <div class="form-group">
                    <input type="password" class="form-control" id="pw" size="20">
                </div>
            </div>
        </div>


	<?php // TABLA PARA QUE LOS BOTONES QUEDEN ACOMODADOS ?>
	<table style="width:40%">
	  <tr>
		<td><?php echo $this->Form->end(__('Ingresar')); ?> </td>
		<td><label for="Registrar" style="font-size: 12px;"><h4 style="font-family:Times New Roman; color:aliceblue;">¿Aún no tienes una cuenta?</h4></label>
			<input type="submit" name="Registrar" id="Registrar" value="Regístrese" style="font-size: 16px;" onclick="window.location='/eccimovies/users/registrar';" /></td> 
	  </tr>
	</table>
</div>