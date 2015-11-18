<?php echo $this->Html->css('addresses'); ?>

<?php

$u_user_id = h($user['User']['id']);

// Si soy cliente y me pertenece la direccion
if($user_id != null && $custom && $user_id == $u_user_id)
{ 	
	?>
    <hr>
    <table cellpadding="0" cellspacing="0">
        <?php echo $this->Html->tableCells(
                                        array(	array('Username:', h($user['User']['username'])),
                                                array('First Name:', h($user['User']['first_name'])),
                                                array('Last Name:', h($user['User']['last_name'])),
                                                array('Gender:', h($user['User']['gender'])),
                                                array('Birthday:', h($user['User']['birthday']))
                                            )
                                        );
        ?>
    </table>
	<hr>
    <div id= "goBack">
        <?php echo $this->Html->link('Go Back', array('action' => 'settings'), array('class' => 'btn btn-default')); ?>
    </div>
	<?php
}
// Si no estoy loggeado, o soy administrador o gerente
else
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>
	