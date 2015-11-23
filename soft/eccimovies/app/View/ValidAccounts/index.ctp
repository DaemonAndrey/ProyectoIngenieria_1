<div class="validAccounts index">
    
    <?php 
        echo $this->Html->css('validAccount');
        echo $this->Html->css('general'); 
        echo $this->Html->css('product'); 
        echo $this->Html->css('addresses'); 
        echo $this->Html->css('signup');
        echo $this->Html->script('http://code.jquery.com/jquery.min.js');  
    ?>
    
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><a href="#">Users</a></li> 
            <li class="active" ><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>  
          </ul>
        </div>
      </div>
    </nav>
    
    <hr>
    <div class="catHeader" style="text-align: center">
    	<h2>Manage Valid Accounts</h2>
    </div>
	<hr>
    
    <p>
        <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add Card ',
                                    array('controller'=>'valid_accounts','action' => 'add_card'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
        ?>
    </p>
    
    <p>
        <?php
            echo "<li id = 'fom-button'>"; 
            echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add PayPal ',
                                    array('controller'=>'valid_accounts','action' => 'add_paypal'),
                                    array('target' => '_self', 'escape' => false)
                                );

            echo "</li>";
        ?>
    </p>
    
    <hr>
    
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
            <th>
				<?php
				    echo $this->Paginator->sort('issuer', 'Issuer');
				    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
				?>
            </th>
            <th>
				<?php
				    echo $this->Paginator->sort('account', 'Account');
				    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
				?>
            </th>
            <th>
				<?php
				    echo $this->Paginator->sort('name_card', 'Name Card');
				    echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
				?>
            </th>
			<th class="actions"><?php echo __('Details'); ?></th>
            <th class="actions"><?php echo __('Update'); ?></th>
            <th class="actions"><?php echo __('Delete'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($validAccounts as $validAccount): ?>
	<tr>
		<td><?php echo h($validAccount['ValidAccount']['issuer']); ?>&nbsp;</td>
		<td><?php echo h($validAccount['ValidAccount']['account']); ?>&nbsp;</td>
		<td><?php echo h($validAccount['ValidAccount']['name_card']); ?>&nbsp;</td>
		<td>
            <?php
				echo $this->Html->link(
				    '<i class="glyphicon glyphicon-eye-open"></i>',
				    array('action' => 'view', $validAccount['ValidAccount']['id']),
				    array('escape' => false)
				);
            ?>
        </td>
        
        <td>
            <?php
                echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', array('action' => 'edit', $validAccount['ValidAccount']['id']), array('escape' => false));
            ?>
        </td>
        
        <td>
            <?php
				echo $this->Form->postLink(
				    '<i class="glyphicon glyphicon-trash"></i>',
				    array('action' => 'delete', $validAccount['ValidAccount']['id']),
				    array(
				    'escape' => false,
				    'confirm' => __('Are you sure you want to delete # %s?', $validAccount['ValidAccount']['id'])
                    )
                );
            ?>
        </td>
		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    
    <div class="center_pagination">
        <ul class="pagination">
            <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        </ul>
    </div>
</div>

