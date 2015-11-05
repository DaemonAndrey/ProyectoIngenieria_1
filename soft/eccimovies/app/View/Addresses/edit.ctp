<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php echo $this->Html->css('general'); ?>

<?php
$address_user_id = h($address['Address']['user_id']);

// Si soy cliente y me pertenece la direccion
if($user_id != null && $custom && $user_id == $address_user_id)
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
    <h2> <?php echo __('Update Address'); ?> </h2>
    </div>

    <hr>
    <?php echo $this->Form->create('Address'); ?>
    <div class="updateAddress_form">
        <?php
            echo $this->Form->input('zipcode', array('autofocus' => 'autofocus'));
            echo $this->Form->input('country');
            echo $this->Form->input('state');
            echo $this->Form->input('type');
            echo $this->Form->input('full_address', array('rows' => '3'));
            echo $this->Form->input('user_id', array('type' => 'hidden'));
            echo $this->Form->input('id', array('type' => 'hidden'));
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
// 
else
{
    ?> <h1> NOTHING TO DO HERE... </h1> <?php
}
?>

