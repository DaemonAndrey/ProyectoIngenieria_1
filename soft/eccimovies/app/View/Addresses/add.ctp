<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php echo $this->Html->css('general'); ?>
<?php
// Si soy cliente
if($user_id != null && $custom)
{ 	
	?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><a href="#" class="nav-buttons">Account Settings</a></li> 
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li class="active"><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>
    <hr>

    <div class="title">
    <h2> <?php echo __('Add Address'); ?> </h2>
    </div>

    <hr>

    <?php echo $this->Form->create('Address'); ?>
    <div class="addAddress_form">
        <?php
            echo $this->Form->input('zipcode',
                array(
                    'autofocus' => 'autofocus',
                    'placeholder' => 'XXX-XXXX'
                )
            );
            echo $this->Form->input(
                'country',
                array(
                    'placeholder' => 'Name of your country'
                )
            );
            echo $this->Form->input(
                'state',
                array(
                    'placeholder' => 'Name of your state'
                )
            );
            echo $this->Form->input(
                'type',
                array(
                    'placeholder' => 'Billing/Shipping'
                )
            );
            echo $this->Form->input(
                'full_address',
                array(
                    'rows' => '3',
                    'placeholder' => 'Street, City, Country'
                )
            );
            echo $this->Form->input('user_id', array('type' => 'hidden'));
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
if($user_id != null && !$custom)
{
    ?> <h1> NOTHING TO DO HERE... </h1> <?php
}
// Si no estoy loggeado
if($user_id == null)
{
	?> <h1> PLEASE LOGIN OR SIGNUP </h1> <?php
}
?>
