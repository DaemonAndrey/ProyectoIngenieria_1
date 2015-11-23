<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php echo $this->Html->css('general'); ?>
<?php
// Si soy cliente
if($user_id != null && $admin)
{ 	
	?>
	<nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li> 
                <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
                <li class="active"><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
              </ul>
            </div>
          </div>
        </nav>

    <hr>

    <div class="title">
    <h2> <?php echo __('Add PayPal'); ?> </h2>
    </div>

    <hr>

    <?php echo $this->Form->create('PaymentMethod', array('class' => 'form-horizontal','role' => 'form')); ?>
    <div class="addPayPal_form">
        <?php
        echo $this->Form->input('ValidAccount.account', array(	'div' => 'form-group', 
                                                                'label' => array(	'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Account'
                                                                                ),
                                                                'placeholder' => 'account@mail.com'
                                                            )
                                );
        echo $this->Form->input('ValidAccount.password',array(	'div' => 'form-group', 	
                                                                'type' => 'password',
                                                                'label' => array(	'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Password'
                                                                                ),
                                                                'placeholder' => 'PayPal password'
                                                            )
                                );
        echo $this->Form->input('ValidAccount.funds',array(	    'type' => 'number',
                                                                'min' => 0,
                                                                'div' => 'form-group', 	
                                                                'label' => array(	'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Funds'
                                                                                ),
                                                                'placeholder' => '10000'
                                                            )
                                );
        ?>
    </div>
    <hr>
    <div id= "action" style="text-align:center">
        <?php echo $this->Form->submit(__('Add', true), array('name' => 'ok', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
    </div>
    <?php echo $this->Form->end(); ?>
    <?php
}
// Si soy cliente
if($user_id != null && !$admin)
{
    ?> <h1> NOTHING TO DO HERE... </h1> <?php
}
// Si no estoy loggeado
if($user_id == null)
{
	?> <h1> PLEASE LOGIN OR SIGNUP </h1> <?php
}
?>
