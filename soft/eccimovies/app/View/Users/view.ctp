<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('general'); ?>

<?php

$u_user_id = h($user['User']['id']);

// Si soy cliente y me pertenece la direccion
if($user_id != null && $user_id == $u_user_id)
{ 	
	?>
    <?php
    if($custom)
    {  
        ?>
        <nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="active"><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
                <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
                <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
                <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
                <li><?php
                    $options = array('controller'=>'wishlists','action' => 'edit', -1);
					if(isset($_SESSION['Auth']['User']['wishlist']))
                    {
                        $options = array('controller'=>'wishlists','action' => 'edit', $_SESSION['Auth']['User']['wishlist']);
					}
					echo $this->Html->link(	'Wishlist',
                                           $options,
                                           array('target' => '_self',
                                                 'escape' => false,
                                                 'class' => 'nav-buttons'
                                                )
                                          )
                ?>
              </li>  
              </ul>
            </div>
          </div>
        </nav>
        <?php
    }
    ?>


    <hr>
    <div class="_index">
		<h2><?php echo $user['User']['first_name'] . ' ' . $user['User']['last_name']; ?></h2>
    </div>
    <hr>
    <table cellpadding="0" cellspacing="0">
        <?php echo $this->Html->tableCells(array(array('Username:', h($user['User']['username'])))); ?>
        <?php   if( $user['User']['gender'] === 'M' )
                {
                     echo $this->Html->tableCells(array(array('Gender:', 'Male')));
                }
                if( $user['User']['gender'] === 'F' )
                {
                     echo $this->Html->tableCells(array(array('Gender:', 'Female')));
                }
        
        ?>
        <?php echo $this->Html->tableCells(array(array('Birthday:', h($user['User']['birthday'])))); ?>
    </table>
	<hr>
    <div id= "goBack">
        <?php echo $this->Html->link('Go Back', array('action' => 'settings'), array('class' => 'btn btn-default')); ?>
    </div>
	<?php
}
// Si no estoy loggeado, o soy administrador o gerente
if($user_id == null || ($user_id != null && $user_id != $u_user_id))
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>
	