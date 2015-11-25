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
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Combos', array('controller' => 'combos', 'action' => 'index')); ?></li>
            <li class="active"><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li> 
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
          </ul>
        </div>
      </div>
    </nav>
    <hr>
    <div class="catHeader">
    	<h2>Manage Categories</h2>
    </div>
	<hr>
    <p>
            <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add category ',
                                    array('controller'=>'categories','action' => 'add'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
            ?>
        </p>
    <hr>
	<table>
		<thead>
			<th>Category</th>
			<th>Update</th>
			<th>Delete</th>
		</thead>
		<tbody>
		<?php foreach ($categories as $category): ?>
		<tr class="cat" id="cat">
			<td class="izq">
				<?php
					echo $this->Html->tag(
							'i', '', array('class' => 'glyphicon glyphicon-collapse-down')
					).' ';
					echo $this->Html->tag(
							'i', '', array('class' => 'glyphicon glyphicon-film')
					).' ';
					echo $this->Html->link(	$category['Category']['category_name'],
											array('action' => 'viewcategory', $category['Category']['category_name'])
										);
				?>
			</td>
			<td>
				<?php
					echo $this->Html->link(
						'<i class="glyphicon glyphicon-pencil"></i>',
						array('action' => 'edit', $category['Category']['id']),
						array('escape' => false)
					);
				?>
			</td>
			<td>
				<?php
					echo $this->Form->postLink(
						'<i class="glyphicon glyphicon-trash"></i>',
						array('action' => 'delete', $category['Category']['id']),
						array('escape' => false, 'confirm' => 'Are you sure you want to delete this category?')
					);
				?>
			</td>
		</tr>
				<?php foreach ($category['Subcategory'] as $subcategory): ?>
			<tr class="sub" id="sub">
				<td class="tab izq">
						<?php
							echo $this->Html->tag(
									'i', '', array('class' => 'glyphicon glyphicon-film')
							).' ';
							echo $this->Html->link(	$subcategory['subcategory_name'],
													array('action' => 'viewsubcategory', $subcategory['subcategory_name'])
												);
						?>
				</td>
				<td>
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-pencil"></i>',
								array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id']),
								array('escape' => false)
							);
						?>
				</td>
				<td>
						<?php
							echo $this->Form->postLink(
								'<i class="glyphicon glyphicon-trash"></i>',
								array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']),
								array('escape' => false, 'confirm' => 'Are you sure you want to delete this subcategory?')
							);
						?>
				</td>
			</tr>
				<?php endforeach; ?>
				<?php unset($subcategory); ?>
			<tr class="sub" id="sub">
				<td class="tab izq">
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-plus"></i> Add subcategory',
								array('controller' => 'subcategories', 'action' => 'add', $category['Category']['id']),
								array('escape' => false)
							);
						?>
				</td>
				<td></td>
				<td></td>
			</tr>
		<?php endforeach; ?>
		<?php unset($category); ?>
		</tbody>
	</table>
	<hr>
	<?php
}
// Si no estoy loggeado o si no soy admin
else
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>