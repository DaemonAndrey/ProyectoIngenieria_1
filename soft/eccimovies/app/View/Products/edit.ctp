<!-- File: /app/View/Products/edit.ctp -->

<?php echo $this->Html->css('product.css'); ?>

<hr>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div>
      <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="active"><?php echo $this->Html->link('Catálogo', array('action' => 'admin_index')); ?></li>
        <li><?php echo $this->Html->link('Categorías', array('controller' => 'categories', 'action' => 'admin_index')); ?></li>
        <li><a href="#">Usuarios</a></li> 
        <li><a href="#">Entidades financieras</a></li> 
      </ul>
    </div>
  </div>
</nav>

<h2>Editar producto</h2>

<?php
    echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form'));
    echo $this->Form->input('name', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Nombre'
                                            )
                                        )
                           );
    echo $this->Form->input('price', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Precio'
                                            )
                                        )
                           );
    echo $this->Form->input('stock_quantity', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Cantidad'
                                            )
                                        )
                           );
    echo $this->Form->input('format', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Formato'
                                            ),
                                            'options' => array(
                                                'Blu-ray' => 'Blu-ray',
                                                'DVD' => 'DVD'
                                            )
                                        )
                           );
    echo $this->Form->input('languages', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Idiomas'
                                            )
                                        )
                           );
    echo $this->Form->input('subtitles', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Subtítulos'
                                            )
                                        )
                           );
    echo $this->Form->input('release_year', array(
                                            'div' => 'form-group', 
                                            'type' => 'text',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Año de lanzamiento',
                                                'dateFormat' => 'Y'
                                            )
                                        )
                           );
    echo $this->Form->input('runtime', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Duración'
                                            )
                                        )
                           );
	echo $this->Form->input('category_id', array(
                                            'div' => 'form-group',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Categoría'
                                            )
                                        )
                           );
        //'name' => 'category', 'label' => 'Categoría'));
	echo $this->Form->input('subcategory_id', array(
                                            'div' => 'form-group',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Subcategoría'
                                            )
                                        )
                           );
    echo $this->Form->input('more_details', array(
                                            'div' => 'form-group', 
                                            'type' => 'textarea',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Más detalles'
                                            )
                                        )
                           );
    echo $this->Form->input('code', array(
                                            'type' => 'hidden',
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2'
                                            )
                                        )
                           );

    echo $this->Form->submit(__('Guardar', true), array('name' => 'ok', 'div' => false, 'class' => 'btn btn-default'));
    echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false, 'class' => 'btn btn-default'));
    echo $this->Form->end();
?>