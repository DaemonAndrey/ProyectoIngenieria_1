<!-- File: /app/View/Products/admin_view.ctp -->

<?php echo $this->Html->css('product.css'); ?>


<div id="admin_view">
    
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

    <h2>
        <?php echo h($post['Product']['name']); ?>
    </h2>

    <table class="table">
        <?php
            $image = $post['Product']['id'].'.jpg';

            echo $this->Html->tableCells(
                    array(
                            array('Carátula', $this->Html->image(($image), array('alt' => $post['Product']['name'], 'width' => '300px'))),
                            array('Código:', h($post['Product']['id'])),
                            array('Precio:', h($post['Product']['price'])),
                            array('Inventario:', h($post['Product']['stock_quantity'])),
                            array('Formato:', h($post['Product']['format'])),
                            array('Idioma:', h($post['Product']['languages'])),
                            array('Subtítulos:', h($post['Product']['subtitles'])),
                            array('Año:', h($post['Product']['release_year'])),
                            array('Duración:', h($post['Product']['runtime'])),
                            array('Categoría', h($post['Category']['category_name'])),
                            array('Subcategoría', h($post['Subcategory']['subcategory_name'])),
                            array('Más detalles:', h($post['Product']['more_details']))
                         )
            );
        ?>
    </table>

    
    <div class="row"> 
        <div class="col-md-12 text-center" id = "admin_view_btn">
        
            <?php
            echo $this->Html->link('Volver', array('action' =>    'admin_index'), array('class' => 'btn btn-default'));
        ?>
        </div>
    </div>
    

    
</div>