<!-- File: /app/View/Products/view.ctp -->

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
                        array('Más detalles:', h($post['Product']['more_details']))
                     )
        );
    ?>
</table>

<div>
    <?php 
        echo $this->Html->link('Volver', array('action' => 'index'), array('class' => 'btn btn-default'));
    ?>
</div>