<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('signup');
echo $this->Html->css('general');?>
<?php
// Si soy administrador
if($user_id != null && $admin)
{
	?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="active"><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li> 
          </ul>
        </div>
      </div>
    </nav>
    <hr>

    <div class="title">
    <h2> 
        <?php 
            echo __('Update discount by category');
        ?> 
    </h2>
    </div>

    <hr>

    <?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form'));?>
    <div class="updateDiscount_form">
        <?php
            echo $this->Form->input(
                'Product.category_id',
                array(
                    'empty' => '-Pick Category-',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'control-label col-sm-2',
                    )
                )
            );
            echo $this->Form->input('discount', array(  'div' => 'form-group',
                                                            'type' => 'number',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'New discount'
                                                                        ),
                                                            'min' => 0,
                                                            'max' => 100
                                                )
            );
                ?>
    </div>
    <hr>
    <div id= "action" style="text-align:center">
        <?php echo $this->Form->submit(__('Update Discount', true), array('name' => 'ok', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
    </div>
    <?php echo $this->Form->end(); ?>
    <?php
}
// Si no estoy loggeado o si no soy admin
else
{
	?> <h1> NOTHING TO DO HERE... </h1> <?php
}

	$this->Js->get('#ProductCategoryId')->event('change',
	$this->Js->request(array(
		'controller'=>'subcategories',
		'action'=>'getByCategory'
		), array(
		'update'=>'#ProductSubcategoryId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
?>
<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
echo $this->Js->writeBuffer(); ?>
