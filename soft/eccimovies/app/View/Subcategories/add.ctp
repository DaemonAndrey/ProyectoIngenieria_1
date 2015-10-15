<hr>

<h1>Agregar subcategoría nueva</h1>
<?php
	echo $this->Form->create('Subcategory');
	echo $this->Form->input('subcategory_name', array('label' => 'Subcategoría nueva', 'autofocus' => 'autofocus'));
	echo $this->Form->input('category_id', array('label' => 'Bajo categoría'));
?>
<div class="submit">
	<?php echo $this->Form->submit(__('Agregar', true), array('name' => 'ok', 'div' => false)); ?>
	<?php echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false)); ?>
</div>
<?php echo $this->Form->end();?>
