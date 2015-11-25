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
            <li><?php echo $this->Html->link('Combos', array('controller' => 'combos', 'action' => 'index')); ?></li>
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
    <h2> <?php echo __('Update Product'); ?> </h2>
    </div>

    <hr>

    <?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form'));?>
    <div class="updateProduct_form">
        <?php
                echo $this->Form->input('code', array(  'type' => 'hidden',
                                                        'div' => 'form-group',
                                                        'label' => array('class' => 'control-label col-sm-2')
                                                    )
                                       );
                echo $this->Form->input('name', array(  'div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Name'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('price', array( 'div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Price'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('discount', array(  'div' => 'form-group',
                                                            'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Discount'
                                                                        ),
                                                            'min' => 0,
                                                            'max' => 100
                                                    )
                                       );
                echo $this->Form->input('stock_quantity', array('div' => 'form-group',
                                                                'label' => array(
                                                                                    'class' => 'control-label col-sm-2',
                                                                                    'text' => 'In Stock'
                                                                                )
                                                                )
                                       );
                echo $this->Form->input('format', array('div' => 'form-group',
                                                        'label' => array(
                                                                            'class' => 'control-label col-sm-2',
                                                                            'text' => 'Format'
                                                                        ),
                                                        'options' => array(
                                                                            'Blu-ray' => 'Blu-ray',
                                                                            'DVD' => 'DVD'
                                                                        )
                                                    )
                                       );
                echo $this->Form->input('languages', array( 'div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Languages'
                                                                            )
                                                            )
                                       );
                echo $this->Form->input('subtitles', array( 'div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Subtitles'
                                                                            )
                                                          )
                                       );
                echo $this->Form->input('release_year', array(  'div' => 'form-group',
                                                                'type' => 'text',
                                                                'label' => array(
                                                                                    'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Release Year',
                                                                                    'dateFormat' => 'Y'
                                                                                )
                                                            )
                                       );
                echo $this->Form->input('runtime', array(   'div' => 'form-group',
                                                            'label' => array(
                                                                                'class' => 'control-label col-sm-2',
                                                                                'text' => 'Run Time'
                                                                            )
                                                        )
                                       );
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
				echo $this->Form->input(
					'Product.subcategory_id',
					array(
						'empty' => '-No Category Selected-',
						'div' => 'form-group',
						'label' => array(
							'class' => 'control-label col-sm-2',
						)
					)
				);
/*                echo $this->Form->input('category_id', array(   'div' => 'form-group',
                                                                'label' => array(
                                                                                    'class' => 'control-label col-sm-2',
                                                                                    'text' => 'Category'
                                                                                )
                                                            )
                                       );
                    //'name' => 'category', 'label' => 'Categoría'));
                echo $this->Form->input('subcategory_id', array(    'div' => 'form-group',
                                                                    'label' => array(
                                                                                        'class' => 'control-label col-sm-2',
                                                                                        'text' => 'Subcategory'
                                                                                    )
                                                                )
                                       );
*/                echo $this->Form->input('more_details', array(  'div' => 'form-group',
                                                                'type' => 'textarea',
                                                                'label' => array(
                                                                                    'class' => 'control-label col-sm-2',
                                                                                    'text' => 'More Details'
                                                                                )
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
