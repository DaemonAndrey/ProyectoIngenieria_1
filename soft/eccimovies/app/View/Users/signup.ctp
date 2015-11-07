<hr>

<?php echo $this->Html->css('signup_original'); ?>

    <h2 id="principal-header-text-signup"> Registration Form </h2>

<div class="users form" style="text-align:center">
    <?php echo $this->Form->create('User'); ?>
		
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('username',array(
														      'label' => 'E-mail: ',
														      'type' => 'email',
                                                              'placeholder' => 'username@mail.com'
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
				    echo $this->Form->input('first_name',array(
														      'label' => 'First Name: ',
                                                              'placeholder' => 'Juan'
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
				    echo $this->Form->input('last_name',array(
														      'label' => 'Last Name: ',
                                                              'placeholder' => 'Rojas Fernández'
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
				    echo $this->Form->input('password',array(
														      'label' => 'Password: ',
														      'type' => 'password',
                                                              'placeholder' => 'At least 8 characters long',
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
				    echo $this->Form->input('repass',array(
														      'label' => 'Confirm password: ',
                                                              'type' => 'password',
                                                              'placeholder' => 'Passwords must match',
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
														      'label' => 'Birthday: ',
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
        <div class="col-md-12">
            <div class="form-group id = 'form'">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('gender',array(
                                                    'id' => 'gender-select',
                                                    'label' => 'Gender: ',
													'options' => array(
																		'M' => 'Male',
																		'F' => 'Female'
																	  )
													)
                                            );
                ?>
            </div>
        </div>    
    </div>
	<?php
	if( $user_id != null && $admin )
	{ ?>
	<div class="row">
        <div class="col-md-12">
            <div class="form-group id = "form"">
                <?php // Campos para llenar informacion
				    echo $this->Form->input('role',array(
                                                    'label' => 'Role: ',
													'options' => array(
																		0 => 'Customer',
																		1 => 'Administrator',
																		2 => 'Manager'
																	  )
													)
                                            );
                ?>
            </div>
        </div>    
    </div>
	<?php
	} ?>
	
    <div class="row">
            <div class="col-md-12">
                    <?php echo $this->Form->button(	'Sign up!',                                                                                                                                                                   array(
													'type' => 'submit',
													'id' => 'button-signup',
													'action'=>'login'),
													array('escape'=>false)
                                                );
                   ?>
            </div> 
        </div>  
</div>