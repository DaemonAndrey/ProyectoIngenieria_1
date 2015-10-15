<hr>

<h1>Subcategorías</h1>
<table>
	<tr>
		<th>Subcategoría</th>
		<th>Categoría padre</th>
	</tr>

	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo $subcategory['Subcategory']['subcategory_name']; ?></td>
		<td><?php echo $subcategory['Category']['category_name']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($subcategory); ?>
</table>
