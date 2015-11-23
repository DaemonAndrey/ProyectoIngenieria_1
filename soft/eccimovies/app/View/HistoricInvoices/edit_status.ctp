<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php echo $this->Html->css('general'); ?>
<?php
// Si soy admin
if($user_id != null && $admin)
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

    <hr>

    <div class="title">
    <h2> <?php echo __('Update Status'); ?> </h2>
    </div>

    <hr>

    <?php echo $this->Form->create('HistoricInvoice', array('class' => 'form-horizontal','role' => 'form')); ?>
    <div class="addCard_form">
        <?php
        if($thisInvoice['HistoricInvoice']['invoice_status'] === 'Preparing for Shipment')
        {
            ?>
            <b> <font size="4"> <?php echo 'Current Status:' ?> </font></b>&nbsp;
                <font size="4"><?php  echo $thisInvoice['HistoricInvoice']['invoice_status']; ?> </font>
            <br><br>
            <b> <font size="4"> <?php echo 'Change to:  ' ?> </font></b>
            <?php
            echo $this->Form->input('HistoricInvoice.invoice_status',
                                    array('div' => 'form-group',
                                          'label' => array('class' => 'control-label col-sm-2',
                                                           'text' => ''
                                                          ),
                                          'options' => array('Shipping Now' => 'Shipping Now',
                                                             'Shipped' => 'Shipped',
                                                             'Delivered' => 'Delivered'
                                                            )
                                         )
                                   );
        }
        if($thisInvoice['HistoricInvoice']['invoice_status'] === 'Shipping Now')
        {
            ?>
            <b> <font size="4"> <?php echo 'Current Status:' ?> </font></b>&nbsp;
                <font size="4"><?php  echo $thisInvoice['HistoricInvoice']['invoice_status']; ?> </font>
            <br><br>
            <b> <font size="4"> <?php echo 'Change to:  ' ?> </font></b>
            <?php
            echo $this->Form->input('HistoricInvoice.invoice_status',
                                    array('div' => 'form-group',
                                          'label' => array('class' => 'control-label col-sm-2',
                                                           'text' => ''
                                                          ),
                                          'options' => array('Shipped' => 'Shipped',
                                                             'Delivered' => 'Delivered'
                                                            )
                                         )
                                   );
        }
        if($thisInvoice['HistoricInvoice']['invoice_status'] === 'Shipped')
        {
            ?>
            <b> <font size="4"> <?php echo 'Current Status:' ?> </font></b>&nbsp;
                <font size="4"><?php  echo $thisInvoice['HistoricInvoice']['invoice_status']; ?> </font>
            <br><br>
            <b> <font size="4"> <?php echo 'Change to:  ' ?> </font></b>
            <?php
            echo $this->Form->input('HistoricInvoice.invoice_status',
                                    array('div' => 'form-group',
                                          'label' => array('class' => 'control-label col-sm-2',
                                                           'text' => ''
                                                          ),
                                          'options' => array('Delivered' => 'Delivered')
                                         )
                                   );
        }
        ?>
    </div>
    <hr>
    <div id= "action" style="text-align:center">
        <?php echo $this->Form->submit(__('Update', true), array('name' => 'ok', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
    </div>
    <?php echo $this->Form->end(); ?>
    <?php
}
// Si no estoy loggeado o no soy admin
else
{
    ?> <h1> NOTHING TO DO HERE... </h1> <?php
}
?>
