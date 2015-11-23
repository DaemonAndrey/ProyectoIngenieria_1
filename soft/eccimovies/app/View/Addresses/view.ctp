<?php echo $this->Html->css('addresses'); ?>
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
            <li><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li class="active"><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>

    <hr>
    <table cellpadding="0" cellspacing="0">
        <?php echo $this->Html->tableCells(
                                        array(	
                                                array('Country:', h($address['State']['Country']['name'])),
                                                array('State:', h($address['State']['name'])),
                                                array('Full Address:', h($address['Address']['full_address'])),
                                                array('Type:', h($address['Address']['type']))
                                            )
                                        );
        ?>
    </table>
	<hr>
    <div id= "goBack">
        <?php echo $this->Html->link('Go Back', array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
	<?php
}
// Si no estoy loggeado, o soy administrador o gerente
else
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>
	
