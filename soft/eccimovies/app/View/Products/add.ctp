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
			<li><a href="#">Users</a></li>
			<li><a href="#">Financial Entities</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<hr>

	<div class="title">
	<h2> <?php echo __('Add Product'); ?> </h2>
	</div>

	<hr>

	<?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form'));?>
	<div class="addProduct_form">
		<?php
				echo $this->Form->input('Product.code', array('div' => 'form-group',
															  'label' => array(
																				 'class' => 'control-label col-sm-2',
																				 'text' => 'Código'
																			  ),
															  'placeholder' => 'ABC-1234'
														   )
									   );
				echo $this->Form->input('Product.name', array('div' => 'form-group',
															  'label' => array(
																				'class' => 'control-label col-sm-2',
																				'text' => 'Name'
																			 ),
															 'placeholder' => 'Name of the movie'
															  )
										);
				echo $this->Form->input('Product.price', array('div' => 'form-group',
															   'label' => array(
																				'class' => 'control-label col-sm-2',
																				'text' => 'Price'
																			   ),
																'placeholder' => 'Price in dollars'
															)
										);
				echo $this->Form->input('Product.stock_quantity', array('div' => 'form-group',
																		'label' => array(
																						'class' => 'control-label col-sm-2',
																						'text' => 'In Stock'
																					),
																		'placeholder' => '# of copies in stock'
																	   )
									 );
				echo $this->Form->input('Product.format', array('div' => 'form-group',
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
				echo $this->Form->input('Product.runtime', array('div' => 'form-group',
																 'label' => array(
																					'class' => 'control-label col-sm-2',
																					'text' => 'Run Time'
																				),
																 'placeholder' => 'Time in minutes'
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
				echo $this->Form->input('Product.languages', array('div' => 'form-group',
																   'label' => array(
																						'class' => 'control-label col-sm-2',
																						'text' => 'Languages'
																					),
																   'placeholder' => 'English, Spanish ...'
																)
									   );
				echo $this->Form->input('Product.subtitles', array('div' => 'form-group',
																   'label' => array(
																					'class' => 'control-label col-sm-2',
																					'text' => 'Subtitles'
																				   ),
																	'placeholder' => 'English, Spanish ...'
																)
									   );
				echo $this->Form->input('Product.release_year', array('div' => 'form-group',
																	 'type' => 'text',
																	 'label' => array(
																						'class' => 'control-label col-sm-2',
																						'text' => 'Release Year',
																						'dateFormat' => 'Y'
																					),
																	 'placeholder' => 'Year only'
																	)
									   );
			   echo $this->Form->input('Product.more_details', array('div' => 'form-group',
																	 'type' => 'textarea',
																	 'label' => array(
																						'class' => 'control-label col-sm-2',
																						'text' => 'More Details'
																					),
																	 'placeholder' => 'Add director, producer, synopsis, ...'
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
