<h1>Administración de categorías</h1>

<ol class='sinpunto tree'>
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
	<label for="folder">
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
		<input type="checkbox" id="folder1" />
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
						array('controller' => 'subcategories', 'action' => 'add', $subcategory['category_id']),
						array('escape' => false)
					);
				?>
			</div>
		</li>
	</ol>
	<?php endforeach; ?>
	<?php unset($category); ?>
</ol>
