<?php
echo $this->Html->script('http://code.jquery.com/jquery.min.js');
echo $this->Html->css('category_index');
echo $this->Html->script('categories');
echo $this->Html->css('addresses');
echo $this->Html->css('general');
?>

<?php
// Si soy administrador
if($user_id != null && $admin)
{
	?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="active"><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><a href="#">Users</a></li> 
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li> 
          </ul>
        </div>
      </div>
    </nav>
    <hr>
    <div class="catHeader">
    	<h2>Manage Products</h2>
    </div>
	<hr>
    <p>
            <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add product ',
                                    array('controller'=>'products','action' => 'add'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
            ?>
        </p>
    <hr>
	<table cellpadding="0" cellspacing="0">
			<tr>
				<th>
					<?php
						echo $this->Paginator->sort('code', 'Code ', array(	'id' => 'sortCode-button'));
						echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
					?>
				</th>
				<th>
					<?php
						echo $this->Paginator->sort('name', 'Name ');
						echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
					?>
				</th>
				<th>
					Update
				</th>
				<th>
					Delete
				</th>
			</tr>

			<?php foreach ($products as $product): ?>
			<?php
			if( $product['Product']['enable'] === '1' )
			{
				echo "<tr>";
					echo "<td>";
						echo $this->Html->link(
												$product['Product']['code'],
												array('action' => 'view', $product['Product']['id'])
											  );
					echo "</td>";
					echo "<td>";
						echo $this->Html->link(
												$product['Product']['name'],
												array('action' => 'view', $product['Product']['id'])
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
	<hr>
	<?php
}
// Si no estoy loggeado o si no soy admin
else
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>