<!-- File: /app/View/Catalogs/add.ctp -->

<?php echo $this->Html->css('product.css'); ?>



<nav class="navbar navbar-inverse" id = "nav-add">
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

<div class="product_add">
    <?php 
        echo $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form')); 
    ?>
    
    <fieldset>
        <legend>
            <?php echo __('Agregar producto'); ?>
        </legend>
            
            <?php
                echo $this->Form->input('Product.id', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Código'
                                            ),
                                            'placeholder' => 'ABC-1234',
                                            'type' => 'text'
                                        )
                           );
                echo $this->Form->input('Product.name', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Nombre'
                                            ),
                                            'placeholder' => 'Nombre de la película'
                                        )
                           );
                echo $this->Form->input('Product.price', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Precio'
                                            ),
                                            'placeholder' => 'Precio en dólares'
                                        )
                           );
                echo $this->Form->input('Product.stock_quantity', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Cantidad'
                                            ),
                                            'placeholder' => 'Cantidad en inventario'
                                        )
                           );
                echo $this->Form->input('Product.format', array(
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
                echo $this->Form->input('Product.languages', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Idiomas'
                                            ),
                                            'placeholder' => 'Inglés, Español, ...'
                                        )
                           );
                echo $this->Form->input('Product.subtitles', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Subtítulos'
                                            ),
                                            'placeholder' => 'Inglés, Español, ...'
                                        )
                           );
                echo $this->Form->input('Product.release_year', array(
                                            'div' => 'form-group',
                                            'type' => 'text',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Año de lanzamiento',
                                                'dateFormat' => 'Y'
                                            ),
                                            'placeholder' => 'Solamente el año'
                                        )
                           );
                echo $this->Form->input('Product.runtime', array(
                                            'div' => 'form-group', 
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Duración'
                                            ),
                                            'placeholder' => 'Tiempo en minutos'
                                        )
                           );
                echo $this->Form->input('Product.more_details', array(
                                            'div' => 'form-group', 
                                            'type' => 'textarea',
                                            'label' => array(
                                                'class' => 'control-label col-sm-2',
                                                'text' => 'Más detalles'
                                            ),
                                            'placeholder' => 'Agregue director, productor, sinopsis, ...'
                                        )
                           );
                
                echo $this->Form->submit(__('Agregar', true), array('name' => 'ok', 'div' => false, 'class' => 'btn btn-default'));
                echo $this->Form->submit(__('Cancelar', true), array('name' => 'cancel', 'formnovalidate' => true,'div' => false, 'class' => 'btn btn-default'));
        ?>
    </fieldset>
    
    <?php echo $this->Form->end(); ?>
</div>