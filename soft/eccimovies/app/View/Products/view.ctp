<?php echo $this->Html->css('product.css'); ?>

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
                <li><?php echo $this->Html->link('NEW RELEASES', array('controller' => 'pages', 'action' => 'display', 'home')); ?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" style="color:black">GENRES<span class="caret"></span></a>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <?php
                        foreach ($catego as $cat):
                        if( $cat['Page']['category_name'] !== 'Unclassified')
                        {
                            ?>
                            <li>
                                    <?php
                                        echo $this->Html->link($cat['Page']['category_name'], array('controller' => 'categories', 'action'=> 'viewcategory',$cat['Page']['category_name']), array('category_name' => 'dropdown-categories'));
                                    ?>
                                </a>
                            </li>

                           <?php
                        }
                        endforeach; ?>
                       <?php unset($cat);?>

                    </ul>
                </li>

                <li><?php echo $this->Html->link('BLU-RAY', array('controller' => 'categories', 'action' => 'view_bluray')); ?></li>
                <li><?php echo $this->Html->link('DVD', array('controller' => 'categories', 'action' => 'view_dvd')); ?></li>
                <li><a href="#">COMING SOON</a></li>
                <li><a href="#">TRENDING BLU-RAY</a></li>
                <li><a href="#">TOP 10 SELLERS</a></li>
            </ul>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <h2>
            <?php echo h($post['Product']['name']); ?>
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive">
            <tr>
                <td>
                    <?php
                        $image = $post['Product']['code'].'.jpg';
                        echo $this->Html->image($image, array('alt' => $post['Product']['name'], 'class' => 'img-rounded', 'width' => '400px', 'id' => 'img-product'));
                    ?>
                </td>
                <td>
                    <?php
                    // Si soy cliente puedo tener carrito
                    if($user_id != null && $custom)
                    {
                        ?>
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    <?php echo $this->Form->create('Carts', array('default' => false,'class'=>'form-inline','inputDefaults' => array('label'=>false, 'div'=>false)));
                                    // default = false sets the submit button not to submit
                                    // so we can use AJAX. Still works for users w/o javascript
                                    $quantity = $post['Product']['stock_quantity'];
                                    $min = ($quantity > 0)? 1: $quantity;?>
                                    <div class="form-group" id="cant">
                                        <?php echo $this->Form->input('add', array('name'=>'addCart','type' => 'number','value' => $min,'min' => $min,'max' => $quantity,'class'=>'form-control','size'=>'1px','id'=>'cartCant', 'value'=>1)); ?>
                                    </div>
                        
                                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART ',array('type'=>'submit', 'class'=>'btn btn-primary','id'=>'addCartBtn'));
                        echo $this->Form->end();?>
                                </td>
                        
                        
                                <td>
                                    <?php echo $this->Form->create('Wishlists', array('default' => false, 'inputDefaults' => array('label'=>false, 'div'=>false)));
                                    echo $this->Form->button('<span class="glyphicon glyphicon-heart"></span> ADD TO WISHLIST',array('type'=>'submit', 'class'=>'btn btn-primary','id'=>'addWishlistBtn'));
                                    echo $this->Form->end();?>
                                </td>
                            </tr>
                        </table> 
              
                        
                        <div id="message"> </div>
                        <?php
                    }
                    ?>
                    <table class="table">
                    <?php
                    // Si soy admin
                    if($user_id != null && $admin)
                    {
                        echo $this->Html->tableCells(	array(	array('Code:', h($post['Product']['code']))));
                    }
                    
                    $descuento = h($post['Product']['discount']);
                    $precioNormal = h($post['Product']['price']);
                        
                    if( $descuento > 0 )
                    {
                        $precioDescuento = $precioNormal - $precioNormal*($descuento/100);
                        
                        echo "<tr>";
                            echo "<td>";
                                echo 'Price: ';
                            echo "</td>";
                            echo "<td>";
                                echo "<p style='color: red; text-decoration: line-through; display: inline' id=".'"regularPrice">'.'$ '.$precioNormal."</p>".'  $ '.round($precioDescuento,2).' ( '.$descuento.'% off )';
                            echo "</td>";
                        echo "</tr>";
                    }
                    else
                    {
                        echo "<tr>";
                            echo "<td>";
                                echo 'Price: ';
                            echo "</td>";
                            echo "<td>";
                                echo '$ '.$precioNormal;
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    echo $this->Html->tableCells(	array(	array('In Stock:', h($post['Product']['stock_quantity'])),
                                                            array('Format:', h($post['Product']['format'])),
                                                            array('Languages:', h($post['Product']['languages'])),
                                                            array('Subtitles:', h($post['Product']['subtitles'])),
                                                            array('Year:', h($post['Product']['release_year'])),
                                                            array('Run Time:', h($post['Product']['runtime']).' minutes'),
                                                            array('More Details:', h($post['Product']['more_details']))
                                                        )
                                                );
                    ?>
                </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<hr>

<p>
    <?php
    echo "<li id = 'fom-button'>";
    echo $this->Html->link(	'<span class="glyphicon glyphicon-home"></span> HOME ',
                            array('controller'=>'pages','action' => 'display', 'home'),
                            array('target' => '_self', 'escape' => false)
                        );

    echo "</li>";
    ?>
</p>

<?php
// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus

$precioProducto = $post['Product']['price'] - $post['Product']['price']*($post['Product']['discount']/100);

$this->Js->get('#CartsViewForm')->event('submit',
										$this->Js->request(
															array(	'action' => 'ajaxRequest', 'controller' => 'carts'),
															array(	'update' => '#message',
																	'data' => '{subtotal:0, user_id:'.$user_id.', product_id:'.$post['Product']['id'].',quantity:$("#cartCant").val(), product_price:'.$precioProducto.'}',
																	'async' => true,
																	'dataExpression'=>true,
																	'method' => 'POST',
																	'complete' => 'self.setInterval("updateSession()",1000);'
																)
														  )
									);
									
$this->Js->get('#WishlistsViewForm')->event('submit',
										$this->Js->request(
															array(	'action' => 'ajaxRequest', 'controller' => 'wishlists'),
															array(	'update' => '#message',
																	'data' => '{user_id:'.$user_id.', product_id:'.$post['Product']['id'].'}',
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