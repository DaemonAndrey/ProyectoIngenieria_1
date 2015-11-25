<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
?>

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
            <li class="active"><?php echo $this->Html->link('Combos', array('controller' => 'combos', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li> 
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="combos form">
    <?php echo $this->Form->create('Combo', array('class' => 'form-horizontal', 'role' => 'form')); ?>
        <fieldset>
        <hr>

        <div class="title">
        <h2> <?php echo __('Add combo'); ?> </h2>
        </div>

        <hr>
        <div class="addProduct_form">
        <?php
            echo $this->Form->input(
                'code',
                array(
                    'placeholder' => 'ABC-1234',
                    'autofocus' => 'autofocus',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'control-label col-sm-2'
                    )
                )
            );
            echo $this->Form->input(
                'name',
                array(
                    'placeholder' => 'Combo description',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'control-label col-sm-2'
                    )
                )
            );
            echo $this->Form->input(
                'discount',
                array(
                    'placeholder' => '0',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'control-label col-sm-2'
                    )
                )
            );
        ?>
        </div>
        <hr>
        <div id= "action" style="text-align:center">
            <?php echo $this->Form->submit(__('Add', true), array('name' => 'ok', 'div' => false)); ?>
            &nbsp;
            <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
        </div>

        <fieldset>
        <?php
            echo $this->Form->input('Product',
                array(
                    //'div' => 'form-group',
                    'multiple' => 'checkbox',
                    'label' => 'Pick products',
                    /*'label' => array(
                        'class' => 'control-label col-sm-2'
                    )*/
                )
            );
        ?>
        </fieldset>

        <?php echo $this->Form->end(); ?>

        <hr>
        <p>
        <?php
            echo "<div id = 'goBack'>";
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-arrow-left"></span> Go back',
                array('action' => 'index'),
                array('class' => 'btn btn-default', 'target' => '_self', 'escape' => false)
            );
            echo "</div>";
        ?>
        </p>
    </div>
    <?php
}
else
{
    ?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
