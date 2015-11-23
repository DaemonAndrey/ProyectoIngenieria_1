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

<div class="combos view">
	<table class="table">
	<?php
		echo $this->Html->tableCells(	
			array(	
				array('Code:', h($combo['Combo']['code'])),
				array('Discount:', h($combo['Combo']['discount']).' %'),
			)
		);
	?>
	</table>
</div>

<div class="related">
	<h3><?php echo __('Products'); ?></h3>
	<?php if (!empty($combo['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Stock Quantity'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Subcategory'); ?></th>
	</tr>
	<?php foreach ($combo['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo '$ '.$product['price']; ?></td>
			<td><?php echo $product['stock_quantity']; ?></td>
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
