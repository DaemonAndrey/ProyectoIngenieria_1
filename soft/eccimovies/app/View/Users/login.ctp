<hr>


<?php echo $this->Html->css('login'); ?>

<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
    
    
        <div class="row text-center">
            <div class="col-md-8">
                <div class="form-group">
                   <?php // Campos para llenar informacion
				        echo $this->Form->input('username',array(
														      'label' => 'E-mail:  ',
														       'type' => 'email',
                                                              'placeholder' => 'username@mail.com'
                                                                )
                                               );
                   ?>
                </div>
            </div>    
        </div>
    
        <div class="row text-center">
            <div class="col-md-8">
                <div class="form-group">
                   <?php // Campos para llenar informacion
				        echo $this->Form->input('password',array(
														      'label' => 'Password:  ',
														       'type' => 'password'
                                                                )
                                               );
                   ?>
                </div>
            </div> 
        </div>
        
        <div class="row text-center">
            <div class="col-md-12">
                <?php echo $this->Form->button('Login',                                                                                                                                                                                                                                 array(
                                                        'type'=>'submit',
                                                        'id' => 'login-button',
                                                        'action'=>'logged'),
                                                         array(
                                                            'escape'=>false
                                                             )
                                             );
               ?>
            </div>            
        </div> 
    
        <div class="row text-right">          
             <div class="col-md-6">
                <label for="Reg" id="label-signup">New to ECCI Movies?</label>
            </div>
            <div class="col-md-2">
                   <button id="button-signup" onclick="window.location.href='<?php echo Router::url(array( 'action'=>'signup'))?>'">Create account</button>
            </div> 
        </div>
    
</div>
