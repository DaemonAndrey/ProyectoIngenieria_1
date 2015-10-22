
<?php
echo $this->Html->css('cake.generic');
echo $this->Html->css('categories');
echo $this->Html->css('products');
echo $this->Html->css('signup');
echo $this->Html->css('category_index');
echo $this->Html->script('http://code.jquery.com/jquery.min.js');
echo $this->Html->script('categories');

?>

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

<h1 text-align="center">Administración de categorías</h1>

<hr>

<table>
	<thead>
		<th>Categoría</th>
		<th>Editar</th>
		<th>Borrar</th>
	</thead>
	<tbody>
		<tr id="cat">
			<td class="izq">
			<?php
				echo $this->Html->link(
					'&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i> Agregar categoría',
					array('controller' => 'categories', 'action' => 'add'),
					array('escape' => false)
				);
			?>
			</td>
			<td></td>
			<td></td>
		</tr>
	<?php foreach ($categories as $category): ?>
	<tr class="cat" id="cat">
		<td class="izq">
			<?php
				echo $this->Html->tag(
						'i', '', array('class' => 'glyphicon glyphicon-collapse-down')
				).' ';
				echo $this->Html->tag(
						'i', '', array('class' => 'glyphicon glyphicon-film')
				).' ';
				echo $category['Category']['category_name'];
			?>
		</td>
		<td>
			<?php
				echo $this->Html->link(
					'<i class="glyphicon glyphicon-pencil"></i>',
					array('action' => 'edit', $category['Category']['id']),
					array('escape' => false)
				);
			?>
		</td>
		<td>
			<?php
				echo $this->Form->postLink(
					'<i class="glyphicon glyphicon-trash"></i>',
					array('action' => 'delete', $category['Category']['id']),
					array('escape' => false, 'confirm' => '¿Está seguro?')
				);
			?>
		</td>
	</tr>
			<?php foreach ($category['Subcategory'] as $subcategory): ?>
		<tr class="sub" id="sub">
			<td class="tab izq">
					<?php
						echo $this->Html->tag(
								'i', '', array('class' => 'glyphicon glyphicon-film')
						).' ';
						echo $subcategory['subcategory_name'];
					?>
			</td>
			<td>
					<?php
						echo $this->Html->link(
							'<i class="glyphicon glyphicon-pencil"></i>',
							array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id']),
							array('escape' => false)
						);
					?>
			</td>
			<td>
					<?php
						echo $this->Form->postLink(
							'<i class="glyphicon glyphicon-trash"></i>',
							array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']),
							array('escape' => false, 'confirm' => '¿Está seguro?')
						);
					?>
			</td>
		</tr>
			<?php endforeach; ?>
			<?php unset($subcategory); ?>
		<tr class="sub" id="sub">
			<td class="tab izq">
					<?php
						echo $this->Html->link(
							'<i class="glyphicon glyphicon-plus"></i> Agregar subcategoría',
							array('controller' => 'subcategories', 'action' => 'add', $category['Category']['id']),
							array('escape' => false)
						);
					?>
			</td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	<?php unset($category); ?>
	</tbody>
</table>

<hr>
