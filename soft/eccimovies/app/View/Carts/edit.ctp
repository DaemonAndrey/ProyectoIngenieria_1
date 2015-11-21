<?php echo $this->Html->css('cart'); ?>
<?php echo $this->Html->css('general'); ?>

<?php
$cart_user_id = h($post['Cart']['user_id']);

// Si soy cliente y me pertenece el carrito
if($user_id != null && $custom && $user_id == $cart_user_id)
{	
    ?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><a href="#" class="nav-buttons">Account Settings</a></li> 
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>

    <hr>

	<div class="cart view">
        <header id="principal-header-text-cart">
            <h2> <?php echo __('My cart'); ?> </h2>
        </header>

        <hr>

        <table class="table">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total item</th>
                <th>Remove</th>
                <th>Add to Wishlist</th>
            </tr>

            <?php
            $cartProducts = $post['CartProduct'];
            foreach($cartProducts as $cartProduct):
            ?>

            <tr>
                <td>
                    <?php echo $this->Html->image($cartProduct['Product']['code'].'.jpg',
                                                  array('alt' => $cartProduct['Product']['name'],
                                                        'class' => 'img-rounded',
                                                        'style' => 'width: 150px; height: 200px;',
                                                        'code' => 'movies-picture-img'
                                                       )
                                                 );
                    ?>
                </td>
                <td>
                    <?php echo $cartProduct['Product']['name']; ?>
                </td>
                <td>
                    <?php
                        echo $this->Form->create('CartProduct',
                                                 array('url' => array('controller' => 'carts',
                                                                      'action' => 'editCartProduct',
                                                                      $cartProduct['id']
                                                                     ),
                                                       'action'=>'editCartProduct',
                                                       'type' => 'post',
                                                       'inputDefaults' => array('label'=>false,
                                                                                'div'=>false
                                                                               )
                                                      )
                                                );
                        echo $this->Form->input('id', array('type' => 'hidden'));

                        echo $this->Form->input('quantity',
                                                array('type' => 'number',
                                                      'label' => false,
                                                      'min' => 1,
                                                      'max' => $cartProduct['Product']['stock_quantity'],
                                                      'value'=>$cartProduct['quantity']
                                                     )
                                               );
                        echo $this->Form->button('<span class="glyphicon glyphicon-ok" id="updateCart-btn1"></span>',
                                                 array('type'=>'submit',
                                                       'id' => 'updateCart-btn'
                                                      )
                                                );

                        echo $this->Form->end();
                    ?>
                </td>
                <td>
                    <?php echo $cartProduct['Product']['price']; ?>
                </td>
                <td>
                    <?php echo $cartProduct['Product']['price']*$cartProduct['quantity']; ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->postLink($this->Html->tag('span',
                                                                null,
                                                                array('class' => 'glyphicon glyphicon-remove')
                                                               ),
                                               array('action' => 'removeProductFromCart',
                                                     $cartProduct['id'],
                                                     $post['Cart']['id']
                                                    ),
                                               array('escape' => false,
                                                     'confirm' => 'Are you sure you want to remove this item from your cart?'
                                                    )
                                              );
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i>',
                                           array('action' => 'sendToWishlist',
                                                 $cartProduct['id']
                                                ),
                                           array('escape' => false)
                                          );
                    ?>
                </td>
            </tr>

            <?php
            endforeach;
            unset($cartProducts);
            ?>
        </table>

        <hr>

        <div class="row">
            <div class="control-label col-md-12">
                <p class="label-class">
                    <b>Subtotal: </b> $ <?php echo $post['Cart']['subtotal']; ?>
                </p>
            </div>
        </div>
	</div>
    
    <div class="row text-right">
        <div class="col-md-12">
            <?php
            echo "<li id = 'checkout-button'>"; 
            echo $this->Html->link(	'Proceed to checkout',
                                    array('controller'=>'invoices','action' => 'index'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
            ?>
        </div>
    </div>

    <hr>
    <?php
}
// Si no estoy loggeado, o soy administrador o gerente o soy cliente y no me pertenece el carrito
if($user_id == null || ($user_id != null && ($admin || $manager || ($custom && $user_id != $cart_user_id))))
{
   ?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>