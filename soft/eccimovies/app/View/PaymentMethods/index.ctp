<?php echo $this->Html->css('addresses'); ?>
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
            <li class="active"><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>
	
	<div class="_index">
        <hr>
		<h2><?php echo __('Manage Payment Methods'); ?></h2>
        <hr>
		<p>
            <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add card ',
                                    array('controller'=>'paymentMethods','action' => 'add_card'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
            ?>
        </p>
        <p>
            <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add PayPal ',
                                    array('controller'=>'paymentMethods','action' => 'add_paypal'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
            ?>
        </p>
        
        <hr>
		
		<table cellpadding="0" cellspacing="0">
				<tr>
					<th>
						<?php
						echo ('Type ');
						?>
					</th>
					<th>
						<?php
						echo ('Account ');
						?>
					</th>
					<th>
						Delete
					</th>
				</tr>

				<?php
                foreach ($paymentMethods as $pMethod):
                if( $pMethod['PaymentMethod']['enable'] === '1' && $pMethod['PaymentMethod']['user_id'] === $user_id)
                {
                    ?>
                    <tr>
                        <td>
                        <?php
                        echo $this->Html->link($pMethod['PaymentMethod']['issuer'],
                                               array('action' => 'view', $pMethod['PaymentMethod']['id'])
                                                );
                        ?>
                        </td>
                        <td>
                        <?php
                        echo $this->Html->link($pMethod['PaymentMethod']['account'],
                                                array('action' => 'view', $pMethod['PaymentMethod']['id'])
                                                  );
                        ?>
                        </td>
                        <td>
                        <?php
                        echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-trash')),
                                                       array('action' => 'delete', $pMethod['PaymentMethod']['id']),
                                                       array('escape' => false, 'confirm' => 'Are you sure you want to delete this payment method?')
                                                    );
                        ?>
                        </td>
                    </tr>
                <?php
                }
                endforeach;
                unset($pMethod);
				?>
			</table>
        <hr>
	</div>
	<?php
}
// Si soy administrador o gerente
if($user_id != null && !$custom)
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
// Si no estoy loggeado o soy manager
if($user_id == null)
{
	?> <h1> PLEASE LOGIN OR SIGNUP </h1> <?php
}
?>