<hr>

<h2 id="principal-header-text-signup"> Registration Form </h2>
<?php
    echo $this->Html->css('signup_original');
    echo $this->Form->create('User', array('url'=> array('action'=>'login'), 'type' => 'post', 'class'=>'form-horizontal', 'inputDefaults' => array('label'=>false, 'div'=>false)));

    echo "<div class = 'row'>";
      echo "<label class='col-md-3 control-label'>E-mail: </label>";
      echo "<div class='form-group col-md-9'>";
      echo $this->Form->input('username',array('class'=>'form-control','type' => 'email','id'=>'email_id','placeholder' => 'username@mail.com'));
      echo "</div>";
    echo "</div>";

    echo "<div class = 'row'>";

      echo "<label class='col-md-3 control-label'>First Name: </label>";

      echo "<div class='form-group col-md-3'>";
      echo $this->Form->input('first_name',array( 'class'=>'form-control','placeholder' => 'Juan' ) );
      echo "</div>";

      echo "<label class='col-md-3 control-label'>Last Name: </label>";
      echo "<div class='form-group col-md-3'>";
      echo $this->Form->input('last_name',array( 'class'=>'form-control','class'=>'form-control','placeholder' => 'Rojas Fernández' ));
      echo "</div>";

    echo "</div>";

    echo "<div class = 'row'>";
      echo "<label class='col-md-3 control-label'>Password </label>";
      echo "<div class='form-group col-md-9'>";
      echo $this->Form->input('password',array('class'=>'form-control','id'=>'pass_id','type' => 'password','placeholder' => 'At least 8 characters long',array('minLength', '8')));
      echo "</div>";
    echo "</div>";

    echo "<div class = 'row'>";
      echo "<label class='col-md-4 control-label'>Confirm Password </label>";
      echo "<div class='form-group col-md-8'>";
      echo $this->Form->input('repass',array('class'=>'form-control','id'=>'repass_id','type' => 'password','placeholder' => 'Passwords must match',array('minLength', '8')));
      echo "</div>";
    echo "</div>";

    echo "<div class = 'row'>";
      echo "<label class='col-md-2 control-label'>Birthday</label>";
      echo "<div class='form-group class = 'col-md-10'>";
      echo $this->Form->input('birthday',array('type' => 'date','class'=>'form-control','dateFormat' => 'DMY','minYear' => date('Y') - 100,'maxYear' => date('Y') ));
      echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo $this->Form->input('gender',array('id' => 'gender-select','label' => 'Gender: ','class'=>'form-control','options' => array('M' => 'Male','F' => 'Female')));
    echo "</div>";

    echo "<div class='form-group'>";
    echo $this->Form->button(	'Sign up!',array('type' => 'submit','id' => 'button-signup','class'=>'form-control','action'=>'login'),array('escape'=>false));
    echo "</div>";




  echo $this->end();
?>


<?php // Campos para llenar informacion
if( $user_id != null && $admin )
{ ?>
<div class="row">
      <div class="col-xs-12 col-md-12">
          <div class="form-group" id = "form">
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
