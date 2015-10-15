<?php echo $this->Html->css('categories'); ?>

<hr>

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

<div id="tabla_categorias">
    
	<p id="cabeza_tabla_categories">Categorías</p>

	<ul>
		<?php foreach ($categories as $category): ?>
		<li><?php
            echo $this->Html->link(
                $category['Category']['category_name'],
                array('action' => 'viewcategory', $category['Category']['category_name'])
             );
			?>
				
			<ul>
				<?php foreach ($subcategories as $subcategory): ?>
				<?php if($subcategory['Subcategory']['category_id']==$category['Category']['id']): ?>
					<li>
						<?php echo $this->Html->link(
							$subcategory['Subcategory']['subcategory_name'],
							array('action' => 'viewsubcategory', $subcategory['Subcategory']['subcategory_name'])
						);?>
					</li>
				<?php endif; ?>
				<?php endforeach; ?>
				<?php unset($subcategory); ?>
			</ul>
		</li>
		<?php endforeach; ?>
		<?php unset($category); ?>
	</ul>
	   

</div>