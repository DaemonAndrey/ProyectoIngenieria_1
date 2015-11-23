<?php 
echo $this->Html->script('http://code.jquery.com/jquery.min.js');
echo $this->Html->css('category_index');
echo $this->Html->script('categories');
echo $this->Html->css('addresses');
echo $this->Html->css('general'); ?>

<?php 
if( $user_id != null && $admin)
{
        ?>
        <nav class="navbar navbar-inverse" id="navigation-bar">
          <div class="container-fluid">
            <div>
              <ul class="nav nav-pills nav-justified" role="tablist">
                <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
                <li class="active"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li> 
                <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
                <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
              </ul>
            </div>
          </div>
        </nav>
        <hr>
        <div class="catHeader">
            <h2>Manage Users</h2>
        </div>
        <hr>
        <p>
                <?php
                echo "<li id = 'fom-button'>"; 
                echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add user ',
                                        array('controller'=>'users','action' => 'signup'),
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
                            echo $this->Paginator->sort('username', 'Username ', array(	'id' => 'sortCode-button'));
                            echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                        ?>
                    </th>
                    <th>
                        <?php
                            echo $this->Paginator->sort('first_name', 'First Name ');
                            echo $this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-sort-by-alphabet'));
                        ?>
                    </th>
                    <th>
                        <?php
                            echo $this->Paginator->sort('last_name', 'Last Name ');
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

                <?php foreach ($users as $user): ?>
                <?php
                if( $user['User']['enable'] === '1' )
                {
                    echo "<tr>";
                        echo "<td>";
                            echo (
                                                    $user['User']['username']

                                                  );
                        echo "</td>";
                        echo "<td>";
                            echo (
                                                    $user['User']['first_name']
                                                  );
                        echo "</td>";
                        echo "<td>";
                            echo (
                                                    $user['User']['last_name']
                                                  );
                        echo "</td>";
                        echo "<td>";
                            echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', array('action' => 'edit', $user['User']['id']), array('escape' => false));
                        echo "</td>";
                        echo "<td>";
                            echo $this->Form->postLink(
                               $this->Html->tag(
                                  'span', null, array('class' => 'glyphicon glyphicon-trash')
                               ),
                               array('action' => 'delete', $user['User']['id']),
                               array('escape' => false, 'confirm' => 'Está seguro que desea eliminar el usuario?')
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

    <h1>
    <?php

}
?>
<?php
if( $user_id == null || ($user_id != null && !$admin))
{
    ?> <h1> NOTHING TO SEE HERE </h1><?php
}
?>