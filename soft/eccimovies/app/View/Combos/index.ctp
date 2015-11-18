<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
?>

<div class="combos index">
	<hr>
	<h2><?php echo __('Combos'); ?></h2>
	<hr>
		
        <p>
        <?php 
			echo "<li id = 'fom-button'>"; 
			echo $this->Html->link(
				'<span class="glyphicon glyphicon-plus"></span> New combo ',
				array('action' => 'add'),
				array('target' => '_self', 'escape' => false)
			);
			echo "</li>";
		?>
        </p>

	<hr>

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
		<td><?php echo h($combo['Combo']['discount']).' %'; ?>&nbsp;</td>
		<td>
			<?php
				echo $this->Html->link(
					'<i class="glyphicon glyphicon-eye-open"></i>',
					array('action' => 'view', $combo['Combo']['id']),
					array('escape' => false)
				);
			?>
		</td>
		<td>
			<?php
				echo $this->Html->link(
					'<i class="glyphicon glyphicon-pencil"></i>',
					array('action' => 'edit', $combo['Combo']['id']),
					array('escape' => false)
				);
			?>
		</td>
		<td>
			<?php
				echo $this->Form->postLink(
					'<i class="glyphicon glyphicon-trash"></i>',
					array('action' => 'delete', $combo['Combo']['id']),
					array(
						'escape' => false,
						'confirm' => __('Are you sure you want to delete # %s?', $combo['Combo']['id'])
					)
				);
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>


    <div class="center_pagination">
        <ul class="pagination">
            <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        </ul>
    </div>


<!--
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
-->

	<hr>
	<p>
	<?php 
		echo "<div id = 'fom-button'>"; 
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-home"></span> Go home',
			array('controller' => 'pages', 'action' => 'home','display'),
			array('target' => '_self', 'escape' => false)
		);
		echo "</div>";
	?>
	</p>

</div>
