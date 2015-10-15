<hr>

<?php echo $this->Html->css('signup'); ?>

<header id="principal-header-text-signup">
    <h2> Formulario de registro </h2>
</header>



<div class="users form">
    <?php echo $this->Form->create('User'); ?>
		
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('username',array(
														      'label' => 'Email: ',
														      'type' => 'email',
                                                              'placeholder' => 'username@mail.com'
                                                            )
                                            );
                ?>
            </div>
        </div>    
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('first_name',array(
														      'label' => 'Nombre: ',
                                                              'placeholder' => 'Juan'
                                                            )
                                            );
                ?>
                
            </div>
        </div>   
    </div>   

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('last_name',array(
														      'label' => 'Apellidos: ',
                                                              'placeholder' => 'Rojas'
                                                            )
                                            );
                ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('password',array(
														      'label' => 'Contraseña: ',
														      'type' => 'password',
                                                              'placeholder' => 'Debe tener al menos 8 caractéres',
                                                               array('minLength', '8')
                                                            )
                                            );
                ?>
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('repass',array(
														      'label' => 'Confirmar contraseña  : ',
                                                              'type' => 'password',
                                                              'placeholder' => 'Debe coincidir con la contraseña',
                                                               array('minLength', '8')
                                                          )
                                            );
                ?>
                
            </div>
        </div>  
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('birthday',array(   
                                                              'type' => 'date',            
														      'label' => 'Fecha de Nacimiento: ',
                                                              'dateFormat' => 'DMY',
                                                              'minYear' => date('Y') - 100,
                                                              'maxYear' => date('Y')
                                                             )
                                            );
                ?>
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <div class="form-group id = "form"">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('gender',array(
                                                    'label' => 'Género: ',
													'options' => array(
																		'M' => 'Hombre',
																		'F' => 'Mujer'
																	  )
													)
                                            );
                ?>
            </div>
        </div>    
    </div>
    <div class="row">
            <div class="col-md-5">
                    <?php echo $this->Form->link('Crear cuenta!',                                                                                                                                                                   array(
                                                        'type' => 'submit',
                                                        'id' => 'button-signup',
                                                        'action'=>'login'),
                                                        array(
                                                            'escape'=>false
                                                             )
                                                        );
                   ?>
            </div> 
        </div>  
</div>