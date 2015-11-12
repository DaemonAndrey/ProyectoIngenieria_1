<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
?>

<div class="combos view">
<h2><?php echo __('Combo'); ?></h2>
	<dl>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['discount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($combo['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Stock Quantity'); ?></th>
		<th><?php echo __('Format'); ?></th>
		<th><?php echo __('Languages'); ?></th>
		<th><?php echo __('Subtitles'); ?></th>
		<th><?php echo __('Release Year'); ?></th>
		<th><?php echo __('Runtime'); ?></th>
		<th><?php echo __('Subcategory Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($combo['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['stock_quantity']; ?></td>
			<td><?php echo $product['format']; ?></td>
			<td><?php echo $product['languages']; ?></td>
			<td><?php echo $product['subtitles']; ?></td>
			<td><?php echo $product['release_year']; ?></td>
			<td><?php echo $product['runtime']; ?></td>
			<td><?php echo $product['subcategory_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['id']))); ?>
			</td>
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
