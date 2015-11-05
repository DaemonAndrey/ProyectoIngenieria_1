<?php echo $this->Html->css('paymentMethod.css'); ?>

<?php

$pMethod_user_id = h($post['PaymentMethod']['user_id']);

// Si estoy loggeado y soy un administrador, o si me pertence la cuenta
if($user_id != null && ($admin || ( $custom && ($user_id == $pMethod_user_id))))
{	
	// Barra de administrador
	if($admin)
	{	?>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div>
			  <ul class="nav nav-pills nav-justified" role="tablist">
				<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
				<li><a href="#">Users</a></li> 
				<li class="active"><?php echo $this->Html->link('Payment Methods', array('controller' => 'paymentMethods', 'action' => 'index')); ?></li> 
			  </ul>
			</div>
		  </div>
		</nav>
		<?php
	}
	?>
	<div class="payment_addCard">
		<?php 
		echo $this->Form->create('PaymentMethod', array('class' => 'form-horizontal',
														'role' => 'form'
														)
								); 
		?>
		<fieldset>
			<legend> <?php echo __('Update Card'); ?> </legend>
			<?php
			echo $this->Form->input('PaymentMethod.issuer', array(	'div' => 'form-group', 
																	'label' => array(	'class' => 'control-label col-sm-2',
																						'text' => 'Type of card'
																					),
																	'options' => array(	'Visa' => 'Visa',
																						'MasterCard' => 'MasterCard',
																						'AmericanExpress' => 'AmericanExpress'
																					)
																)
									);
			echo $this->Form->input('PaymentMethod.account', array(	'div' => 'form-group', 
																	'label' => array(	'class' => 'control-label col-sm-2',
																						'text' => 'Account'
																					)
														)
									);
			echo $this->Form->input('PaymentMethod.name_card', array(	'div' => 'form-group', 
																		'label' => array(	'class' => 'control-label col-sm-2',
																							'text' => 'Name on card'
																						)
																		)
									);
			echo $this->Form->input('PaymentMethod.expiration', array(	'div' => 'form-group', 	
																		'type' => 'date',            
																		'label' => array(	'class' => 'control-label col-sm-2',
																							'text' => 'Expiration date'
																						),
																		'dateFormat' => 'DMY',
																		'minYear' => date('Y'),
																		'maxYear' => date('Y') + 30,
																	)
									);
			echo $this->Form->input('PaymentMethod.security_code',array('div' => 'form-group', 	
																		'type' => 'password',
																		'label' => array(	'class' => 'control-label col-sm-2',
																							'text' => 'Security code'
																						),
																		array('minLength', '3')
																	)
									);
			echo $this->Form->submit(__('Update', true), array('name' => 'ok',
															'div' => false,
															'class' => 'btn btn-default'
															)
									);
			echo $this->Form->submit(__('Cancel', true), array(	'name' => 'cancel',
																'formnovalidate' => true,
																'div' => false,
																'class' => 'btn btn-default'
															)
									);
		?>
		</fieldset>
		
		<?php echo $this->Form->end(); ?>
	</div>
<?php
}
// Si no estoy loggeado, ó si soy manager, ó si soy cliente y no me pertenece
if($user_id == null || $manager || ($custom && ($user_id != $pMethod_user_id)))
{
	?> <h1> NOTHING TO DO HERE... </h1> <?php
}
?>