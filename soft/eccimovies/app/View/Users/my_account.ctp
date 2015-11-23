<?php 
echo $this->Html->script('http://code.jquery.com/jquery.min.js');
echo $this->Html->css('category_index');
echo $this->Html->script('categories');
echo $this->Html->css('addresses');
echo $this->Html->css('general'); ?>

<?php 
if( $user_id != null && $custom )
{
    ?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>

    <h1>
       <center>     
        WELCOME ! <br>

        <?php echo $loggedUser['User']['first_name'] . ' ' . $loggedUser['User']['last_name']; ?>
        </center>
    </h1>
    <?php
}
if($user_id == null)
{
    ?> <h1> PLEASE LOGIN OR SIGNUP </h1><?php
}
if($user_id != null && !$custom)
{
    ?> <h1> NOTHING TO SEE HERE </h1><?php
}
?>