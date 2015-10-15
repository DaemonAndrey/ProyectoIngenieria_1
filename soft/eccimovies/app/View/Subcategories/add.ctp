
<?php echo $this->Html->css('subcategories'); ?>


<div id = "add">
    
    <h1>Agregar subcategoría nueva</h1>
<hr>

<div class="row">
    <div class="col-md-12">
    
            <?php
        echo $this->Form->create('Subcategory');
        echo $this->Form->input('subcategory_name', array('label' => '<h4>Subcategoría nueva</h4>', 'autofocus' => 'autofocus'));
        echo $this->Form->input('category_id', array('label' => '<h4>Bajo categoría </h4>'));
    ?>
        
        
    </div>
    
        
    
    <div class="col-md-12 text-center">
    
        <div class="submit">
	<?php echo $this->Form->submit(__('Agregar', true), array('name' => 'ok', 'div' => false)); ?>
	<?php echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false)); ?>
</div>
<?php echo $this->Form->end();?>
        
        
        
    </div>
</div>

</div>



