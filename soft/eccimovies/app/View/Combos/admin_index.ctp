<div class="combos index">
	<h2><?php echo __('Combos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
			<th class="actions"><?php echo __('Details'); ?></th>
			<th class="actions"><?php echo __('Update'); ?></th>
			<th class="actions"><?php echo __('Delete'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($combos as $combo): ?>
	<tr>
		<td><?php echo h($combo['Combo']['id']); ?>&nbsp;</td>
		<td><?php echo h($combo['Combo']['code']); ?>&nbsp;</td>
		<td><?php echo h($combo['Combo']['discount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $combo['Combo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $combo['Combo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $combo['Combo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $combo['Combo']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Combo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
