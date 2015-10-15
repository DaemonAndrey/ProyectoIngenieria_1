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

<h1>Agregar categoría nueva</h1>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('category_name', array('label' => 'Nueva categoría', 'autofocus' => 'autofocus'));
echo $this->Form->submit(__('Agregar', true), array('name' => 'ok', 'div' => false));
echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false));
echo $this->Form->end();
?>
