<hr>

<?php echo $this->Html->css('category_index'); ?>

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

<h1>Administración de categorías</h1>

<ol class='sinpunto'>
	<li>
		<div class='categoria'><h4>Categoría</h4></div>
		<div class='tabulada'><h4>Editar</h4></div>
		<div class='tabulada'><h4>Borrar</h4></div>
	</li>

	<li>
		<div class='categoria'>
			<?php
				echo $this->Html->link(
					'<i class="glyphicon glyphicon-plus"></i> Agregar categoría',
					array('controller' => 'categories', 'action' => 'add'),
					array('escape' => false)
				);
			?>
		</div>
	</li>
	<?php foreach ($categories as $category): ?>
	<li class="folder">
		<div class='categoria'>
			<?php
				echo $this->Html->tag(
						'i', '', array('class' => 'glyphicon glyphicon-film')
				).' ';
				echo $category['Category']['category_name'];
			?>
		</div>
		<div class='tabulada'>
			<?php
				echo $this->Html->link(
					'<i class="glyphicon glyphicon-pencil"></i>',
					array('action' => 'edit', $category['Category']['id']),
					array('escape' => false)
				);
			?>
		</div>
		<div class='tabulada'>
			<?php
				echo $this->Form->postLink(
					'<i class="glyphicon glyphicon-trash"></i>',
					array('action' => 'delete', $category['Category']['id']),
					array('escape' => false, 'confirm' => '¿Está seguro?')
				);
			?>
		</div>
	</label>
	</li>
	<ol class='sinpunto'>
		<?php foreach ($category['Subcategory'] as $subcategory): ?>
		<li class="file">
			<div class='categoria'>
				<?php
					echo $this->Html->tag(
							'i', '', array('class' => 'glyphicon glyphicon-film')
					).' ';
					echo $subcategory['subcategory_name'];
				?>
			</div>
			<div class='tabulada'>
				<?php
					echo $this->Html->link(
						'<i class="glyphicon glyphicon-pencil"></i>',
						array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id']),
						array('escape' => false)
					);
				?>
			</div>
			<div class='tabulada'>
				<?php
					echo $this->Form->postLink(
						'<i class="glyphicon glyphicon-trash"></i>',
						array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']),
						array('escape' => false, 'confirm' => '¿Está seguro?')
					);
				?>
			</div>
		</li>
		<?php endforeach; ?>
		<li class="file">
			<div class='categoria'>
				<?php
					echo $this->Html->link(
						'<i class="glyphicon glyphicon-plus"></i> Agregar subcategoría',
						array('controller' => 'subcategories', 'action' => 'add', $category['Category']['id']),
						array('escape' => false)
					);
				?>
			</div>
		</li>
	</ol>
	<?php endforeach; ?>
	<?php unset($category); ?>
</ol>
