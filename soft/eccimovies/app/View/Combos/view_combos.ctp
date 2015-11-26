<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
    echo $this->Html->css('categories');
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
                <li class="active"><?php echo $this->Html->link('COMBOS', array('controller' => 'combos', 'action' => 'view_combos')); ?></li>
                <li><a href="#">DEALS</a></li>
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
    <?php if($combo['Combo']['enable'] == 1 ){ ?>
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
    <?php } ?>
    <?php endforeach; ?>
    <?php unset($combo); ?>
</div>