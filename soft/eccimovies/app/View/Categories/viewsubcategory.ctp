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

<div>
	<p id="cabeza_tabla_categories">
		<?php echo $subcategory['Subcategory']['subcategory_name']; ?>
	</p>
	<div class="row text-center" id="movie-info">
		<?php foreach ($products as $product): ?>
			<?php if($product['Product']['subcategory_id']==$subcategory['Subcategory']['id']): ?>
				<div class="col-md-3">
					<?php echo $this->Html->link($this->Html->image(($product['Product']['code'].'.jpg'), array('alt' =>  $product['Product']['name'], 'class' => 'img-rounded', 'style' => 'width:200px; height:300px', 'id' => 'movies-picture-img')),
                                                    					     array('controller'=>'Products','action' => 'admin_view', $product['Product']['id']),
                                                     					     array('target' => '_self', 'escape' => false));
					?>											 
					<p id="details-movie">
						<?php echo $this->Html->link(
							$product['Product']['name'],
								array('controller'=>'Products','action' => 'admin_view', $product['Product']['id'])
							);
						?>
					</p>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php unset($product); ?>
	</div>
</div>
