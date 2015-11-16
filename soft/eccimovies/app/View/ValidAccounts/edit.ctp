<?php 
    echo $this->Html->css('validAccount');
    echo $this->Html->css('general'); 
    echo $this->Html->css('product'); 
    echo $this->Html->css('addresses'); 
    echo $this->Html->css('signup');
    echo $this->Html->script('http://code.jquery.com/jquery.min.js');  
?>


<nav class="navbar navbar-inverse" id="navigation-bar">
    <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><a href="#">Users</a></li> 
            <li class="active"><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>  
          </ul>
        </div>
    </div>
</nav>


<div class="title">
    <h2> <?php echo __('Update Valid Account'); ?> </h2>
</div>

    <hr>
<!--
<div class="validAccounts form">
<?php echo $this->Form->create('ValidAccount'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('issuer');
		echo $this->Form->input('account');
		echo $this->Form->input('name_card');
		echo $this->Form->input('security_code');
		echo $this->Form->input('funds');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div> -->


<?php if($user_id != null && $admin)
{ ?>
<?php echo $this->Form->create('ValidAccount', array('class' => 'form-horizontal', 'role' => 'form'));?>
    <div class="updateProduct_form">
        <?php
                echo $this->Form->input('id', array(  'type' => 'hidden',
                                                        'div' => 'form-group',
                                                        'label' => array('class' => 'control-label col-sm-2')
                                                    )
                                       );
                echo $this->Form->input('issuer', array(  'div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Issuer'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('account', array( 'div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Account'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('name_card', array('div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Name Card'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('security_code', array( 'div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Security Code'
                                                                            )
                                                          )
                                       );
                echo $this->Form->input('funds', array(  'div' => 'form-group',
                                                                'label' => array(
                                                                                    'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Funds',
                                                                                )
                                                            )
                                       );
                ?>
    </div>
    <hr>
    <div id= "action" style="text-align:center">
        <?php echo $this->Form->submit(__('Update', true), array('name' => 'ok', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
    </div>
    <?php echo $this->Form->end(); ?>
    
<?php
}
// Si no estoy loggeado o si no soy admin
else
{
	?> <h1> NOTHING TO DO HERE... </h1> <?php
}

