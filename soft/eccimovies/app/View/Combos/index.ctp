<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
    echo $this->Html->css('categories');
?>

<?php
// Si soy admin
if($user_id != null && $admin)
{
    ?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li> 
            <li><?php echo $this->Html->link('Orders', array('controller' => 'invoices', 'action' => 'my_invoices')); ?></li>
            <li><?php echo $this->Html->link('Valid Accounts', array('controller' => 'valid_accounts', 'action' => 'index')); ?></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="combos index">
        <hr>

        <div class="title">
        <h2> <?php echo __('Manage combos'); ?> </h2>
        </div>

        <hr>

            <p>
            <?php
                echo "<li id = 'fom-button'>";
                echo $this->Html->link(
                    '<span class="glyphicon glyphicon-plus"></span> New combo ',
                    array('action' => 'add'),
                    array('target' => '_self', 'escape' => false)
                );
                echo "</li>";
            ?>
            </p>

        <hr>

        <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('discount'); ?></th>
                <th class="actions"><?php echo __('Details'); ?></th>
                <th class="actions"><?php echo __('Update'); ?></th>
                <th class="actions"><?php echo __('Delete'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($combos as $combo): ?>
        <tr>
            <td><?php echo h($combo['Combo']['code']); ?>&nbsp;</td>
            <td><?php echo h($combo['Combo']['name']); ?>&nbsp;</td>
            <td><?php echo h($combo['Combo']['discount']).' %'; ?>&nbsp;</td>
            <td>
                <?php
                    echo $this->Html->link(
                        '<i class="glyphicon glyphicon-eye-open"></i>',
                        array('action' => 'view', $combo['Combo']['id']),
                        array('escape' => false)
                    );
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link(
                        '<i class="glyphicon glyphicon-pencil"></i>',
                        array('action' => 'edit', $combo['Combo']['id']),
                        array('escape' => false)
                    );
                ?>
            </td>
            <td>
                <?php
                    echo $this->Form->postLink(
                        '<i class="glyphicon glyphicon-trash"></i>',
                        array('action' => 'delete', $combo['Combo']['id']),
                        array(
                            'escape' => false,
                            'confirm' => __('Are you sure you want to delete # %s?', $combo['Combo']['id'])
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


    <!--
        <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
        <div class="paging">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
        </div>
    -->

        <hr>
    </div>
    <?php
}
?>
<?php
// Si no estoy loggeado o si no soy admin
if($user_id == null || ($user_id != null && !$admin))
{
    ?>
    <div class="navbar navbar-inverse" role="navigation" id="principal-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

          <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link('NEW RELEASES',
                                                     array('controller' => 'pages',
                                                           'action' => 'display',
                                                           'home'
                                                          )
                                                    );
                        ?>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" style="color:black">
                            GENRES
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <?php foreach ($catego as $cat):
                                    if( $cat['Page']['category_name'] !== 'Unclassified')
                                    {
                                        ?>
                                        <li>
                                        <?php echo $this->Html->link($cat['Page']['category_name'],
                                                                     array('controller' => 'categories',
                                                                           'action'=> 'viewcategory',
                                                                           $cat['Page']['category_name']
                                                                          ),
                                                                     array('category_name' => 'dropdown-categories')
                                                                    );
                                        ?>
                                        </li>
                                        <?php
                                    }
                                endforeach;
                                unset($cat);
                            ?>
                        </ul>
                    </li>
                    <li><?php echo $this->Html->link('BLU-RAY', array('controller' => 'categories', 'action' => 'view_bluray')); ?></li>
                    <li><?php echo $this->Html->link('DVD', array('controller' => 'categories', 'action' => 'view_dvd')); ?></li>
                    <li><a href="#">COMING SOON</a></li>
                    <li><a href="#">TRENDING BLU-RAY</a></li>
                    <li><a href="#">TOP 10 SELLERS</a></li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div>
        <p id="cabeza_tabla_categories">
            <?php echo 'Combos'; ?>
        </p>

        <hr>

        <?php foreach ($comb as $combo): ?>
            <p id="tituloSubCategoria">
                <?php echo $this->Html->link($combo['Combo']['name'],
                                             array('action' => 'view',
                                                   $combo['Combo']['id']
                                                  )
                                            );
                ?>
            </p>

            <hr>

            <div class="row text-center" id="movie-info">
                <?php foreach ($combo['Product'] as $prod): ?>
                    <div class="col-md-3">
                        <?php echo $this->Html->link($this->Html->image(($prod['code'].'.jpg'),
                                                                        array('alt' =>  $prod['name'],
                                                                              'class' => 'img-rounded',
                                                                              'style' => 'width:200px; height:300px',
                                                                              'id' => 'movies-picture-img'
                                                                             )
                                                                       ),
                                                     array('controller'=>'Products',
                                                           'action' => 'view',
                                                           $prod['id']
                                                          ),
                                                     array('target' => '_self',
                                                           'escape' => false
                                                          )
                                                    );
                        ?>
                        <?php
                        if($prod['format'] === 'DVD')
                        {
                            ?>
                            <p>
                            <?php echo $this->Html->image('!DVD.png',
                                                          array('alt' => 'DVD format',
                                                                'class' => 'img-rounded',
                                                                'style' => 'width:200px; height:25px; margin-top:-20px',
                                                                'id' => 'dvd-format'
                                                               )
                                                         );
                            ?>
                            </p>
                            <?php
                        }
                        else
                        {
                            ?>
                            <p>
                            <?php echo $this->Html->image('!Bluray.png',
                                                          array('alt' => 'Blu-ray format',
                                                                'class' => 'img-rounded',
                                                                'style' => 'width:200px; height:25px; margin-top:-20px',
                                                                'id' => 'bluray-format'
                                                               )
                                                         );
                            ?>
                            </p>
                            <?php
                        }
                        ?>
                        <p id="details-movie">
                            <?php echo $this->Html->link($prod['name'],
                                                         array('controller'=>'Products',
                                                               'action' => 'view',
                                                               $prod['id']
                                                              )
                                                        );
                            ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                    <?php unset($prod); ?>
        </div>
    
        <hr>
        <?php endforeach; ?>
        <?php unset($combo); ?>
    </div>
    <?php
}
?>

