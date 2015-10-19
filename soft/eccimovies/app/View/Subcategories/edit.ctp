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
<h2>Modificar subcategoría</h2>
<hr>
<?php
echo $this->Form->create('Subcategory');
echo $this->Form->input('subcategory_name', array('label' => 'Nombre de la subcategoría', 'autofocus' => 'autofocus'));
echo $this->Form->input('category_id', array('label' => '<h5>Bajo categoría </h5>'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit(__('Modificar', true), array('name' => 'ok', 'div' => false));
echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false));
echo $this->Form->end();
?>
</div>
