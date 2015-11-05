<?php echo $this->Html->css('product.css'); ?>

<div id="admin_view">
    <?php
	if($user_id != null && $admin)
	{
		// Barra de administrador
		?>
		<nav class="navbar navbar-inverse">
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
	<?php
	}?>

    <h2> <?php echo h($post['Product']['name']); ?> </h2>

    <table class="table">
		<tr>
			<td>
				<?php
				$image = $post['Product']['code'].'.jpg';
				echo $this->Html->image($image, array('alt' => $post['Product']['name'], 'width' => '300px'));
				?>
			</td>
			<td>
				<?php
				// Si soy cliente
				if($user_id != null && $custom)
				{
					echo $this->Form->create('Carts', array('default' => false,'class'=>'form-inline', 'inputDefaults' => array('label'=>false, 'div'=>false)));
					// default = false sets the submit button not to submit
					// so we can use AJAX. Still works for users w/o javascript
					echo "<div class='form-group'>";
					echo $this->Form->input('add', array('name'=>'addCart','class'=>'form-control', 'size'=>'1px','id'=>'cartCant', 'value'=>1, 'style'=>'margin-left:605px'));
					echo "</div>";
					echo $this->Form->button('ADD TO CART',array('type'=>'submit', 'class'=>'btn btn-primary', 'style'=>'float:right;margin-right:2px','id'=>'addCartBtn'));
					echo $this->Form->end();
					?>
					<div id="message" style="width: 300px;float:right"> </div>
					<?php
				}
				?>
			</td>
		</tr>
		
		<?php
		// Si soy admin
		if($user_id != null && $admin)
		{
			echo $this->Html->tableCells(	array(	array('Code:', h($post['Product']['code']))));
		}
		echo $this->Html->tableCells(	array(	array('Price:', '$ '.h($post['Product']['price'])),
												array('In Stock:', h($post['Product']['stock_quantity'])),
												array('Format:', h($post['Product']['format'])),
												array('Languages:', h($post['Product']['languages'])),
												array('Subtitles:', h($post['Product']['subtitles'])),
												array('Year:', h($post['Product']['release_year'])),
												array('Run Time:', h($post['Product']['runtime']).' minutes'),
												//array('Categoría', h($post['Category']['category_name'])),
												//array('Subcategoría', h($post['Subcategory']['subcategory_name'])),
												array('More Details:', h($post['Product']['more_details']))
											)
									);
		?>
    </table>
    
    <div class="row"> 
        <div class="col-md-12 text-center" id = "admin_view_btn">
			<button id="homeButton" color='black' background-color='#FF581A' onclick="window.location.href='<?php echo Router::url('/', array('controller' => 'pages', 'action' => 'display', 'home'))?>'">HOME</button>
        </div>
    </div>
	
	<?php
	// JsHelper should be loaded in $helpers in controller
	// Form ID: #ContactsContactForm
	// Div to use for AJAX response: #contactStatus

	$this->Js->get('#CartsViewForm')->event('submit',
											$this->Js->request(
																array(	'action' => 'ajaxRequest', 'controller' => 'carts'),
																array(	'update' => '#message',
																		'data' => '{subtotal:'.$post['Product']['price'].', user_id:'.$user_id.', product_id:'.$post['Product']['id'].',quantity:$("#cartCant").val()}',
																		'async' => true,    
																		'dataExpression'=>true,
																		'method' => 'POST'
																	)
															  )
										);


	echo $this->Js->writeBuffer(); 
	?>
</div>