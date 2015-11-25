<?php
	echo $this->Html->css('general');
	echo $this->Html->css('product');
	echo $this->Html->css('addresses');
?>

	<hr>

	<div class="title">
	<h2> <?php echo __('Combo'); ?> </h2>
	</div>

	<hr>

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

<div class="combos view">
	<table class="table">
	<?php
        if( $admin )
        {
            echo $this->Html->tableCells(array('Code:', h($combo['Combo']['code'])));
        }
    ?>
    <?php
		echo $this->Html->tableCells(
			array(
				//array('Code:', h($combo['Combo']['code'])),
				array('Name:', h($combo['Combo']['name'])),
				array('Discount:', h($combo['Combo']['discount']).' %'),
				array('Regular price:', '$ '.number_format((float)$tot, 2, '.', '')),
                array('Combo price:', '$ '.number_format((float)$totCombo, 2, '.', '')),
				//array('Stock Quantity:', $min),
			)
		);
	?>
    <?php
        if( $admin )
        {
            echo $this->Html->tableCells(array('Stock Quantity:', $min));
        }
    ?>
	</table>
    <?php
    // Si soy cliente puedo tener carrito
    if($user_id != null && $custom)
    {
        echo $this->Form->create('Carts', array('default' => false,'class'=>'form-inline', 'inputDefaults' => array('label'=>false, 'div'=>false)));
        // default = false sets the submit button not to submit
        // so we can use AJAX. Still works for users w/o javascript
        $quantity = $combo['Combo']['stock_quantity'];
        $min = ($quantity > 0)? 1: $quantity;
        echo "<div class='form-group'>";
        echo $this->Form->input('add', array('name'=>'addCart','type' => 'number','value' => $min,'min' => $min,'max' => $quantity,'class'=>'form-control', 'size'=>'1px','id'=>'cartCant', 'value'=>1));
        echo "</div>";
        echo $this->Form->button('<span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART ',array('type'=>'submit', 'class'=>'btn btn-primary','id'=>'addCartBtn'));
        echo $this->Form->end();
        ?>
        <div id="message"> </div>
        <?php
    }
    ?>
</div>

<div class="related">
	<h3><?php echo __('Products'); ?></h3>
	<?php if (!empty($combo['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
    
    <?php if($admin) { ?>
		<th><?php echo __('Code'); ?></th>
    <?php } ?>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
    <?php if($admin) { ?>
		<th><?php echo __('Stock Quantity'); ?></th>
    <?php } ?>
        <th><?php echo __('Category'); ?></th>
		<th><?php echo __('Subcategory'); ?></th>
	</tr>
	<?php foreach ($combo['Product'] as $product): ?>
		<tr>
            <?php if($admin) { ?>
                <td><?php echo $product['code']; ?></td>
			<?php } ?>
            <td><?php echo $product['name']; ?></td>
			<td><?php echo '$ '.number_format((float)$product['price'], 2, '.', ''); ?></td>
			<?php if($admin) { ?>
                <td><?php echo $product['stock_quantity']; ?></td>
			<?php } ?>
            <td><?php echo $product['Subcategory']['Category']['category_name']; ?></td>
			<td><?php echo $product['Subcategory']['subcategory_name']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

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