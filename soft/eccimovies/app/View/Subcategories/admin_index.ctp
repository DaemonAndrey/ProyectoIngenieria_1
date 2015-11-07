<?php echo $this->Html->css('subcategories'); ?>
<?php echo $this->Html->css('categories'); ?>
<?php echo $this->Html->css('products'); ?>
<?php echo $this->Html->css('signup'); ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>
      <ul class="nav nav-pills nav-justified" role="tablist">
        <li><?php echo $this->Html->link('Catálogo', array('controller' => 'products', 'action' => 'admin_index')); ?></li>
        <li class="active"><?php echo $this->Html->link('Categorías', array('action' => 'admin_index')); ?></li>
        <li><a href="#">Usuarios</a></li>
        <li><a href="#">Entidades financieras</a></li>
      </ul>
    </div>
  </div>
</nav>

<h1>Subcategorías</h1>
<hr>
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
