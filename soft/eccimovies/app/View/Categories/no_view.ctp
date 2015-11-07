<h1><?php echo h($category['Category']['category_name']); ?></h1>
<table>
	<tr>
		<th>Subcategoría</th>
		<th> </th>
		<th> </th>
	</tr>

	<?php foreach ($category['Subcategory'] as $subcategory): ?>
	<tr>
		<td>
			<?php echo $subcategory['subcategory_name']; ?>
		</td>
		<td>
			<?php
				echo $this->Html->link(
					'Modificar',
					array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id'])
				);
			?>
		</td>
		<td>
			<?php
				echo $this->Form->postLink(
					'Eliminar',
					array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']),
					array('confirm' => '¿Está seguro?')
				);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($category); ?>
</table>
