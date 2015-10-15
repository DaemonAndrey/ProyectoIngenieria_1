<!-- File: /app/View/Products/admin_index.ctp -->

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

<div class="product_index">
    <h1>
        Productos
    </h1>

    <p>
        <?php
            echo $this->Html->link('Agregar producto', array('action' => 'add'));
        ?>
    </p>

    <table class="table table-hover">
        <tr>
            <th>
                <?php
                    echo $this->Paginator->sort('id', 'Código ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th>
            <th>
                <?php
                    echo $this->Paginator->sort('name', 'Nombre ');
                    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                ?>
            </th>
            <th>
                Editar
            </th>
            <th>
                Eliminar
            </th>
        </tr>

        <?php foreach ($products as $product): ?>
        <?php
        if( $product['Product']['enable'] === '1' )
        {
            echo "<tr>";
                echo "<td>";
                    echo $this->Html->link(
                                            $product['Product']['id'],
                                            array('action' => 'admin_view', $product['Product']['id'])
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link(
                                            $product['Product']['name'],
                                            array('action' => 'admin_view', $product['Product']['id'])
                                          );
                echo "</td>";
                echo "<td>";
                    echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', array('action' => 'edit', $product['Product']['id']), array('escape' => false));
                echo "</td>";
                echo "<td>";
                    echo $this->Form->postLink(
                       $this->Html->tag(
                          'span', null, array('class' => 'glyphicon glyphicon-trash')
                       ),
                       array('action' => 'delete', $product['Product']['id']),
                       array('escape' => false, 'confirm' => 'Está seguro que desea eliminar el producto?')
                    );
                echo "</td>";
            echo "</tr>";
        }
        ?>
        <?php endforeach; ?>
        <?php unset($product); ?>
    </table>

    <div class="center_pagination">
        <ul class="pagination">
            <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        </ul>
    </div>
</div>