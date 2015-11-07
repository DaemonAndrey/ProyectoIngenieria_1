<hr>

<?php echo $this->Html->css('cart'); ?>
<?php
    $cart_user_id = h($post['Cart']['user_id']);
    
    // Si soy cliente y me pertenece el carrito
    if($user_id != null && $custom && $user_id == $cart_user_id)
    {	
?>
	<div class="cart view">

        <header id="principal-header-text-cart">
            <h2><?php echo __('My cart'); ?></h2>
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
                <th>Add to wishlist</th>
            </tr>

            <?php
                $cartProducts = $post['CartProduct'];

                foreach($cartProducts as $cartProduct):
            ?>

            <tr>
                <td><?php echo $this->Html->image($cartProduct['Product']['code'].'.jpg', array('alt' => $cartProduct['Product']['name'], 'class' => 'img-rounded', 'style' => 'width: 150px; height: 200px;', 'code' => 'movies-picture-img')); ?></td>
                <td><?php echo $cartProduct['Product']['name']; ?></td>
                <td>
                    <?php
                        echo $this->Form->create('CartProduct', array('url' => array('controller' => 'carts', 'action' => 'editCartProduct', $cartProduct['id']), 'action'=>'editCartProduct', 'type' => 'post', 'inputDefaults' => array('label'=>false, 'div'=>false)));
                        echo $this->Form->input('id', array('type' => 'hidden'));

                        echo $this->Form->input('quantity', array('type' => 'number', 'label' => false, 'min' => 1, 'max' => $cartProduct['Product']['stock_quantity'], 'value'=>$cartProduct['quantity']));
                        echo $this->Form->button('<span class="glyphicon glyphicon-ok" id="updateCart-btn1"></span>',array('type'=>'submit', 'id' => 'updateCart-btn'));

                        echo $this->Form->end();
                    ?>
                </td>
                <td><?php echo $cartProduct['Product']['price']; ?></td>
                <td><?php echo $cartProduct['Product']['price']*$cartProduct['quantity']; ?></td>
                <td><?php echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-remove')),array('action' => 'removeProductFromCart', $cartProduct['id'], $post['Cart']['id']),array('escape' => false, 'confirm' => 'Are you sure you want to remove this item from your cart?')); ?></td>
                <td><?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i>', array('action' => 'sendToWishlist', $cartProduct['id']), array('escape' => false)); ?></td>
            </tr>

            <?php endforeach; ?>
            <?php unset($cartProducts); ?>
        </table>

        <hr>

        <div class="row">
            <div class="control-label col-md-10">
                <p class="label-class">Subtotal: $ </p>
            </div>


            <div class="control-label col-md-1">
                <p class="amount-class"><?php echo $post['Cart']['subtotal']; ?></p>
            </div>
        </div>
	</div>

<?php
    }
    // Si no estoy loggeado, o soy administrador o gerente o soy cliente y no me pertenece el carrito
    if($user_id == null || ($user_id != null && ($admin || $manager || ($custom && $user_id != $cart_user_id))))
    {
	   ?> <h1> NOTHING TO SEE HERE... </h1> <?php
    }
?>

<div class="row text-right">
    <div class="col-md-12">
        <?php echo $this->Form->postButton('Proceed to checkout' ,array('controller' => 'invoices', 'action' => 'index'),array('escape' => false));
        ?>
    </div>
</div>

<hr>