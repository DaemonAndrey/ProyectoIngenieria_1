<?php echo $this->Html->css('addresses'); ?>

<?php

$address_user_id = h($address['Address']['user_id']);

// Si soy cliente y me pertenece la direccion
if($user_id != null && $custom && $user_id == $address_user_id)
{ 	
	?>
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
	
