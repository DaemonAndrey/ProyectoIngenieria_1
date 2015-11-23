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
			echo $this->Form->input('type', array('options' => array('Billing' => 'Billing', 'Shipping' => 'Shipping')));
			echo $this->Form->input('country_id');
			echo $this->Form->input('state_id');
			echo $this->Form->input('full_address', array('rows' => '3'));
			echo $this->Form->input('id', array('type' => 'hidden'));
			echo $this->Form->input('user_id', array('type' => 'hidden'));
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
<?php
$this->Js->get('#AddressCountryId')->event('change',
	$this->Js->request(array(
		'controller'=>'states',
		'action'=>'get_by_country'
		), array(
		'update'=>'#AddressStateId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
?>
<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
echo $this->Js->writeBuffer(); ?>
