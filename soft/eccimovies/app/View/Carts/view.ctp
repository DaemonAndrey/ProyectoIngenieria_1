<?php
$cart_user_id = h($post['Cart']['user_id']);
// Si soy cliente y me pertenece el carrito
if($user_id != null && $custom && $user_id == $cart_user_id)
{	
	?>
	<div class="carts view">

	<h2><?php echo __('My cart'); ?></h2>

	<table class="table">
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Remove</th>
			<th>Add to wishlist</th>
		</tr>
		
		<?php
			$products = $post['Product'];
			
			foreach($products as $product):
		?>
		
		<tr>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['CartsProduct']['quantity']?></td>
			<td><?php echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-remove')),array('action' => 'removeProductFromCart', $product['CartsProduct']['id'], $post['Cart']['id']),array('escape' => false, 'confirm' => 'Are you sure you want to remove this item from your cart?')); ?></td>
			<td><?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i>', array('action' => 'sendToWishlist', $product['CartsProduct']['id']), array('escape' => false)); ?></td>
		</tr>

		<?php endforeach; ?>
		<?php unset($products); ?>
	</table>
		
		<h3>Subtotal</h3>
		<p><?php echo $post['Cart']['subtotal']; ?></p>
		
		<?php echo $this->Html->link('Proceed to checkout', array('controller' => 'invoices', 'action' => 'index'), array('class' => 'btn btn-default')); ?>
	</div>
<?php
}
// Si no estoy loggeado, o soy administrador o gerente o soy cliente y no me pertenece el carrito
if($user_id == null || ($user_id != null && ($admin || $manager || ($custom && $user_id != $cart_user_id))))
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>