<hr>

<h1>Modificar subcategoría</h1>
<?php
echo $this->Form->create('Subcategory');
echo $this->Form->input('subcategory_name', array('label' => 'Nombre de la subcategoría', 'autofocus' => 'autofocus'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit(__('Modificar', true), array('name' => 'ok', 'div' => false));
echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false));
echo $this->Form->end();
?>
