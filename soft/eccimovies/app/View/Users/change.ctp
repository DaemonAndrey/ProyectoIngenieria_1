<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup');
echo $this->Html->css('general');?>
<?php
// Si soy administrador
if($user_id != null )
{
	?>
    <?php
    if($admin) 
    {
    ?>

        <nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li ><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
                <li class="active"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'add')); ?></li> 
                <li><a href="#">Financial Entities</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <hr>

        <div class="title">
        <h2> <?php echo __('Change Password'); ?> </h2>
        </div>

        <hr>

        <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));?>
        <div class="updateProduct_form">
            <?php
                    echo $this->Form->input('password', array('div' => 'form-group',

                                                                    'label' => array(
                                                                                        'class' => 'control-label col-sm-2',
                                                                                        'text' => 'New Password'

                                                                                    ),
                                                                    'value' => ''
                                                                    )
                                           );
                    echo $this->Form->input('repass', array('div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Confirm Password'

                                                                            ),
                                                            'value'=> '',
                                                            'type'=> 'password'
                                                            )
                                           );
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
    
    if(($custom || $manager) && $user_id == $user['User']['id'])
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
                <li><a href="#", class="nav-buttons">Wishlist</a></li>  
              </ul>
            </div>
          </div>
        </nav>
        <?php
        }
        ?>
        <hr>

        <div class="title">
        <h2> <?php echo __('Change Password'); ?> </h2>
        </div>
        <hr>

        <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));?>
        <div class="updateProduct_form">
            <?php
                    echo $this->Form->input('password', array('div' => 'form-group',

                                                                    'label' => array(
                                                                                        'class' => 'control-label col-sm-2',
                                                                                        'text' => 'New Password'

                                                                                    ),
                                                                    'value' => ''
                                                                    )
                                           );
                    echo $this->Form->input('repass', array('div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Confirm Password'

                                                                            ),
                                                                'value'=> '',
                                                            'type'=> 'password'
                                                            )
                                           );
                    ?>
        </div>
        <hr>
        <div id= "action" style="text-align:center">
            <?php echo $this->Form->submit(__('Change', true), array('name' => 'ok', 'div' => false)); ?>
            &nbsp;
            <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
        </div>
        <?php echo $this->Form->end(); ?>  
    <?php
    }
    if(($custom || $manager) && $user_id != $user['User']['id'] )
    {
        ?> <h1> NOTHING TO DO HERE... </h1> <?php
    }
}

?>
<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
echo $this->Js->writeBuffer(); ?>
