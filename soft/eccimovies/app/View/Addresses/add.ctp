<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php
// Si soy cliente
if($user_id != null && $custom)
{
	?>
	<hr>

	<div class="title">
	<h2> <?php echo __('Add Address'); ?> </h2>
	</div>

	<hr>

	<?php echo $this->Form->create('Address'); ?>
	<div class="addAddress_form">
		<?php
			echo $this->Form->input('type', array('options' => array('Billing' => 'Billing', 'Shipping' => 'Shipping')));
			echo $this->Form->input('country_id', array('empty' => '-Pick country-'));
			echo $this->Form->input('state_id', array('empty' => '-No country selected-'));
/*            echo $this->Form->input(
				'type',
				array(
					'placeholder' => 'Billing/Shipping'
				)
			);*/
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
