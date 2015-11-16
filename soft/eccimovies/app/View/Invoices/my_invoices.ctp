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
            <li class="active"><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>
	
	<div class="_index">
        <hr>
		<h2><?php echo __('Your Orders'); ?></h2>
        <hr>
		
		<table cellpadding="0" cellspacing="0">
				<tr>
					<th>
						<?php echo ('Order # '); ?>
					</th>
					<th>
						<?php echo ('Total '); ?>
					</th>
				</tr>

				<?php
                foreach ($paymentMethods as $pMethod ):
                if( $pMethod['PaymentMethod']['user_id'] === $user_id)
                {
                    $user_account = $pMethod['PaymentMethod']['account'];

                    foreach ($historicInvoices as $hInvoice):
                    if( $hInvoice['HistoricInvoice']['payment_method_account'] === $user_account)
                    {
                        ?>
                        <tr>
                            <td>
                            <?php
                            echo $this->Html->link($hInvoice['HistoricInvoice']['id'],
                                               array('action' => 'view_invoice', $hInvoice['HistoricInvoice']['id'])
                                                );
                            ?>
                            </td>
                            <td>
                            <?php
                            echo '$ '.$hInvoice['HistoricInvoice']['total'];
                            ?>
                            </td>
                        </tr>
                        <?php
                    }
                    endforeach;
                    unset($hInvoice);
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