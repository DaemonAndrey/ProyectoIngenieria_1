<?php 

    echo $this->Html->css('validAccount');
    echo $this->Html->css('general'); 
    echo $this->Html->css('product'); 
    echo $this->Html->css('addresses.css'); 
    echo $this->Html->css('general'); 
    echo $this->Html->script('http://code.jquery.com/jquery.min.js');
    
?>

<nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><a href="#">Users</a></li> 
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li class="active"><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
          </ul>
        </div>
      </div>
    </nav>

<hr>

<table cellpadding="0" cellspacing="0">
    <?php 
        echo $this->Html->tableCells(
            array(  array('Issuer :', h($validAccount['ValidAccount']['issuer'])),
                    array('Account :', h($validAccount['ValidAccount']['account'])),
                    array('Password :', h($validAccount['ValidAccount']['password'])),
                    array('Name Card :', h($validAccount['ValidAccount']['name_card'])),
                    array('Expiration :', h($validAccount['ValidAccount']['expiration'])),
                    array('Security Code :', h($validAccount['ValidAccount']['security_code'])),
                    array('Funds :', h($validAccount['ValidAccount']['funds']))
                )
            );
    ?>
 </table>

<hr>

</div>

