<?php echo $this->Html->css('addresses.css'); ?>
<?php echo $this->Html->css('general'); ?>

<?php

$invoice_id = h($post['HistoricInvoice']['id']);
$invoice_account = h($post['HistoricInvoice']['payment_method_account']);
$invoice_user;

foreach ($paymentMethods as $pMethod):
if( $pMethod['PaymentMethod']['account'] === $invoice_account)
{
    $invoice_user = $pMethod['PaymentMethod']['user_id'];
}
endforeach;
unset($pMethod);

// Si soy admin, o soy cliente y me pertenece la orden
if($user_id != null && ( $admin || ($custom && $user_id == $invoice_user)))
{ 	
    if($custom)
    {
        ?>
        <nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li><a href="#" class="nav-buttons">Account Settings</a></li> 
                <li class="active"><?php echo $this->Html->link('Your Orders',
                                                                array('controller' => 'invoices',
                                                                      'action' => 'my_invoices'),
                                                                array('class' => 'nav-buttons')); ?></li>
                <li><?php echo $this->Html->link('Payment Methods',
                                                 array('controller' => 'paymentMethods',
                                                       'action' => 'index'),
                                                 array('class' => 'nav-buttons')); ?></li>
                <li><?php echo $this->Html->link('Address Book',
                                                 array('controller' => 'addresses',
                                                       'action' => 'index'),
                                                 array('class' => 'nav-buttons')); ?></li>
                <li><a href="#", class="nav-buttons">Wishlist</a></li>  
              </ul>
            </div>
          </div>
        </nav>
        <?php
    }
    if($admin)
    {
        ?>
        <nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
                <li><a href="#">Users</a></li> 
                <li class="active"><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
                <li><a href="#">Financial Entities</a></li>  
              </ul>
            </div>
          </div>
        </nav>
        <?php
    }
    ?>

    <hr>

    <div class="_index">
        <h2><?php echo __('Order # ' . h($post['HistoricInvoice']['id'])); ?></h2>

        <hr>
        
        <?php
        if($custom)
        {
            ?>
            <b> <font size="4"> <?php echo 'Order placed:  ' ?> </font></b>
                <font size="4"><?php echo $post['HistoricInvoice']['invoice_date']; ?> </font>
            <br>
            <b> <font size="4"> <?php echo 'Total:  ' ?> </font></b>
                <font size="4"><?php echo '$' . $post['HistoricInvoice']['total']; ?> </font>
            <br>
            <b> <font size="4"> <?php echo 'Status:  ' ?> </font></b>
                <font size="4"><?php  echo $post['HistoricInvoice']['invoice_status']; ?> </font>
            <?php
        }
        if($admin)
        {
            ?>
            <b> <font size="4"> <?php echo 'Order placed:  ' ?> </font> </b> 
                <font size="4"> <?php echo $post['HistoricInvoice']['invoice_date']; ?> </font>
            <br>
            <b> <font size="4"> <?php echo 'Total:  ' ?> </font> </b>
                <font size="4"> <?php echo '$' . $post['HistoricInvoice']['total']; ?> </font>
            <br>
            <b> <font size="4"> <?php echo 'Status:  ' ?></font> </b>  
                <font size="4"> <?php echo $post['HistoricInvoice']['invoice_status']; ?> </font>
            <?php    
            if($post['HistoricInvoice']['invoice_status'] !== 'Delivered')
            {
                echo "<li id = 'fom-button'>"; 
                echo $this->Html->link(	'<span class="glyphicon glyphicon-pencil"></span>',
                                        array('controller'=>'historicInvoices','action' => 'edit_status', $post['HistoricInvoice']['id']),
                                        array('target' => '_self', 'escape' => false)
                                    );

                echo "</li>";
            }
        }
        ?>
        
        <hr>
    </div>

    <table cellpadding="0" cellspacing="0">
         <tr>
            <th>Quantity</th>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
        foreach ($historicInvoiceProduct as $historicInvProd ):
        if( $historicInvProd['HistoricInvoicesHistoricProduct']['historic_invoice_id'] === $invoice_id)
        {
            $product_id = $historicInvProd['HistoricInvoicesHistoricProduct']['historic_product_id'];

            foreach ($historicProducts as $historicProduct):
            if( $historicProduct['HistoricProduct']['id'] === $product_id)
            {
                ?>
                <tr>
                    <td>
                    <?php
                    echo $historicProduct['HistoricProduct']['product_quantity'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo $historicProduct['HistoricProduct']['product_name'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo '$ ' . $historicProduct['HistoricProduct']['product_price'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo '$ ';
                        $total_price = ($historicProduct['HistoricProduct']['product_quantity'] * $historicProduct['HistoricProduct']['product_price']);
                        echo number_format((float)$total_price, 2, '.', '');
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
    <table cellpadding="0" cellspacing="0">
        <?php 
            echo $this->Html->tableCells(
                                        array(  array('Full name :', h($post['HistoricInvoice']['user_first_name']) . ' ' . h($post['HistoricInvoice']['user_last_name'])),
                                                array('Shipping Address :', h($post['HistoricInvoice']['address_full_address'])),
                                                array('Account :', h($post['HistoricInvoice']['payment_method_account'])),
                                                array('Taxes :', '$ '.h($post['HistoricInvoice']['tax'])),
                                                array('Shipping Price :', '$ '.h($post['HistoricInvoice']['shippping_price'])),
                                                array('Total :', '$ '.h($post['HistoricInvoice']['total']))
                                            )
                                        );
        ?>
    </table>
	<hr>
    <div id= "goBack">
        <?php echo $this->Html->link('Go Back', array('action' => 'my_invoices'), array('class' => 'btn btn-default')); ?>
    </div>
	
	<?php
}
// Si no estoy loggeado, soy manager, o no me pertenece la factura
if($user_id == null || ($user_id != null && ($manager || ($custom && $user_id != $invoice_user))))
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>