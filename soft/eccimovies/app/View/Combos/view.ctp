<?php
	echo $this->Html->css('general');
	echo $this->Html->css('product');
?>

<?php 
// Si soy admin
if( $user_id != null && $admin )
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
	<?php
}
// Si no estoy loggeado o no soy admin
else
{
	?>
    <div class="navbar navbar-inverse" role="navigation" id="principal-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

          <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link('NEW RELEASES',
                                                     array('controller' => 'pages',
                                                           'action' => 'display',
                                                           'home'
                                                          )
                                                    );
                        ?>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" style="color:black">
                            GENRES
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <?php foreach ($catego as $cat):
                                    if( $cat['Page']['category_name'] !== 'Unclassified')
                                    {
                                        ?>
                                        <li>
                                        <?php echo $this->Html->link($cat['Page']['category_name'],
                                                                     array('controller' => 'categories',
                                                                           'action'=> 'viewcategory',
                                                                           $cat['Page']['category_name']
                                                                          ),
                                                                     array('category_name' => 'dropdown-categories')
                                                                    );
                                        ?>
                                        </li>
                                        <?php
                                    }
                                endforeach;
                                unset($cat);
                            ?>
                        </ul>
                    </li>
                    <li><?php echo $this->Html->link('BLU-RAY', array('controller' => 'categories', 'action' => 'view_bluray')); ?></li>
                    <li><?php echo $this->Html->link('DVD', array('controller' => 'categories', 'action' => 'view_dvd')); ?></li>
                    <li class="active"><?php echo $this->Html->link('COMBOS', array('controller' => 'combos', 'action' => 'view_combos')); ?></li>
                    <li><?php echo $this->Html->link('DEALS', array('controller' => 'categories', 'action' => 'view_deals')); ?></li>
                    <li><a href="#">TOP 10 SELLERS</a></li>
                </ul>
            </div>
        </div>
    </div>
	<?php
}
?>

<?php
    $sum = 0;
    $min = PHP_INT_MAX;
    foreach ($combo['Product'] as $product):
        $sum += $product['price'];
        if ($min > $product['stock_quantity']):
            $min = $product['stock_quantity'];
        endif;
    endforeach;
    $tot = $sum;
    $totCombo = $sum * (1 - $combo['Combo']['discount'] / 100.0);
?>

<div class="row">
    <div class="col-md-12">
        <h2> <?php echo __(h($combo['Combo']['name']) . ' Combo'); ?> </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive">
            <tr> <!-- Fila de todo -->
                <td> <!-- Columna foto -->
                    <?php
                        $image = $combo['Combo']['code'].'.jpg';
                        echo $this->Html->image($image, array('alt' => $combo['Combo']['name'], 'class' => 'img-rounded', 'width' => '400px', 'id' => 'img-product'));
                    ?>
                </td><!-- Fin Columna foto -->
                <td> <!-- columna info -->
					<table class="table table-responsive">
						<?php
						// Si soy cliente puedo tener carrito
						if($user_id != null && $custom)
						{
							?>
							<tr> <!-- fila carrito -->
								<td> <!-- Columna 1 -->
									<?php
									echo $this->Form->create('Carts', array('default' => false,'class'=>'form-inline', 'inputDefaults' => array('label'=>false, 'div'=>false)));
									// default = false sets the submit button not to submit
									// so we can use AJAX. Still works for users w/o javascript
									$quantity = h($combo['Combo']['stock_quantity']);
									$min = ($quantity > 0)? 1: $quantity;
									echo "<div class='form-group'>";
									echo $this->Form->input('add', array('name'=>'addCart','type' => 'number','value' => $min,'min' => $min,'max' => $quantity,'class'=>'form-control', 'size'=>'1px','id'=>'cartCant', 'value'=>1));
									echo "</div>";
									echo $this->Form->button('<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART ',array('type'=>'submit', 'class'=>'btn btn-primary','id'=>'addCartBtn'));
									echo $this->Form->end();
									?>
									<div id="message"> </div>
								</td>
								<td></td> <!-- Columna 2 -->
							</tr> <!-- fin fila carrito -->
							<?php
						}
						?>
						
						<?php
							if( $admin )
							{
								?>
								<tr> <!-- Fila codigo -->
									<td> 
										<?php echo 'Code: ' ?>
									</td>
									<td>
										<?php echo h($combo['Combo']['code']) ?>
									</td>
									<td>
									</td>
								</tr>
								<?php
							}
						?>
						
						<tr>
							<td>
								<?php echo 'Regular price: ' ?>
							</td>
							<td>
								<?php echo '$ '.number_format((float)$tot, 2, '.', '') ?>
							</td>
							<?php
							if($admin)
							{
								?>
								<td></td>
								<?php
							}
							?>
						</tr>
						<tr>
							<td>
								<?php echo 'Combo price: ' ?>
							</td>
							<td>
								<?php echo '$ '.number_format((float)$totCombo, 2, '.', '') ?>
							</td>
							<?php
							if($admin)
							{
								?>
								<td></td>
								<?php
							}
							?>
						</tr>
						<tr>
							<td>
								<?php echo 'Discount: ' ?>
							</td>
							<td>
								<?php echo h($combo['Combo']['discount']) . ' %' ?>
							</td>
							<?php
							if($admin)
							{
								?>
								<td></td>
								<?php
							}
							?>
						</tr>
						
						<?php
							if( $admin )
							{
								?>
								<tr> <!-- Fila codigo -->
									<td> 
										<?php echo 'In stock: ' ?>
									</td>
									<td>
										<?php echo $min ?>
									</td>
									<td>
									</td>
								</tr>
								<?php
							}
						?>
						<tr>
                            <td></td>
                            <td></td>
                            <?php
                            if( $admin )
							{
								?>
								<td></td>
								<?php
							}
                            ?>
                        
                        </tr>
						<tr>
							<td> 
                                <b>
								<?php echo 'PRODUCTS' ?>
                                    </b>
							</td>
							<td></td>
							<?php
							if($admin)
							{
								?>
								<td></td>
								<?php
							}
							?>
						</tr>
						
						<tr>
                            
							<?php
							if( $admin )
							{
								?>
								<td> 
                                    <b>
									<?php echo 'Code' ?>
                                        </b>
								</td>
								<?php
							}
							?>
							<td>
                                <b>
								<?php echo 'Name' ?>
                                    </b>
							</td>
							<td>
                                <b>
								<?php echo 'Price' ?>
                                </b>
							</td>
                            
						</tr>
						
						<?php
						foreach ($combo['Product'] as $product): ?>
							<tr>
								<?php 
								if($admin)
								{
									?>
									<td>
                                        <font size="2">
										<?php echo $product['code']; ?>
                                        </font>
									</td>
									<?php
								}
								?>
								<td> 
                                    <font size="2">
                                        <?php echo $product['name']; ?> 
                                    </font>
                                </td>
								<td> 
                                    <font size="2">
                                        <?php echo '$ '.number_format((float)$product['price'], 2, '.', ''); ?>
                                    </font>
                                </td>
							</tr>
							<?php
						endforeach;
						?>
						
						
						
						
					</table>
                </td> <!-- Fin columna info -->
            </tr> <!-- Fin fila todo -->
        </table>
    </div>
</div>
<hr>
<div>
	<p>
	<?php
        echo "<div id = 'goBack'>";
            if($user_id != null && $admin)
            {
                echo $this->Html->link('<span class="glyphicon glyphicon-arrow-left"></span> Go back',
                                       array('action' => 'index'),
                                       array('class' => 'btn btn-default',
                                             'target' => '_self',
                                             'escape' => false
                                            )
                                      );
            }
            else
            {
                echo $this->Html->link('<span class="glyphicon glyphicon-arrow-left"></span> Go back',
                                       array('action' => 'view_combos'),
                                       array('class' => 'btn btn-default',
                                             'target' => '_self',
                                             'escape' => false
                                            )
                                      );
            }
        echo "</div>";
		
	?>
	</p>

</div>

<?php
// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus

$this->Js->get('#CartsViewForm')->event('submit',
										$this->Js->request(
															array(	'action' => 'ajaxRequest', 'controller' => 'carts'),
															array(	'update' => '#message',
																	'data' => '{subtotal:0, user_id:'.$user_id.', product_id:'.$combo['Combo']['product_id'].',quantity:$("#cartCant").val(), product_price:'.$totCombo.'}',
																	'async' => true,
																	'dataExpression'=>true,
																	'method' => 'POST',
																	'complete' => 'self.setInterval("updateSession()",1000);'
																)
														  )
									);


echo $this->Js->writeBuffer();

?>

<script>
  function updateSession()
  {
    location.reload();
  }
</script>