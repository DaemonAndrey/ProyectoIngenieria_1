<?php echo $this->Html->css('general'); ?>

<?php 
if( $user_id != null )
{
	if($custom)
	{
		?>
		<nav class="navbar navbar-inverse" id="navigation-bar">
		  <div class="container-fluid">
			<div>
			  <ul class="nav nav-pills nav-justified" role="tablist">
				<li><a href="#" class="nav-buttons">Account Settings</a></li> 
				<li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
				<li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
				<li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
				<li><a href="#", class="nav-buttons">Wishlist</a></li>  
			  </ul>
			</div>
		  </div>
		</nav>
		<?php
	}
	
    if($admin)
    {
        
    }
    
	if($manager)
	{
		
	}
	
	?>
	<h1>
	WELCOME ! <br>
	<?php echo $username; ?>
	</h1>
	<?php
}
else
{
    ?> <h1> PLEASE LOGIN OR SIGNUP </h1><?php
}
?>