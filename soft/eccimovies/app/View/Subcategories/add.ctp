<?php echo $this->Html->css('products'); ?>
<?php echo $this->Html->css('signup'); ?>
<?php echo $this->Html->css('subcategories'); ?>
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
<div class="caja">

<h1>Agregar subcategoría nueva</h1>
<hr>

<?php
	echo $this->Form->create('Subcategory');
	echo $this->Form->input(
		'subcategory_name',
		array(
			'label' => 'Subcategoría nueva',
			'autofocus' => 'autofocus',
			'placeholder' => 'Nombre de la subcategoría'
		)
	);
	echo $this->Form->input('category_id', array('label' => '<h4>Bajo categoría </h4>'));
?>
	<?php echo $this->Form->submit(__('Agregar', true), array('name' => 'ok', 'div' => false)); ?>
	<?php echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false)); ?>
<?php echo $this->Form->end();?>
</div>
