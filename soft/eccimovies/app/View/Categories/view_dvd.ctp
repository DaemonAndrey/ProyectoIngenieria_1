<?php echo $this->Html->css('categories'); 
echo $this->Html->css('general');?>

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
                <li><?php echo $this->Html->link('COMBOS', array('controller' => 'combos', 'action' => 'view_combos')); ?></li>
                <li><a href="#">DEALS</a></li>
                <li><a href="#">TOP 10 SELLERS</a></li>
            </ul>
        </div>
    </div>
</div>

<hr>

<div>
    <div class="row text-center" id="movie-info">
    <?php foreach ($product as $productBR): ?>
            <div class="col-md-3">
                <?php echo $this->Html->link($this->Html->image(($productBR['Product']['code'].'.jpg'),
                                                                array('alt' =>  $productBR['Product']['name'],
                                                                      'class' => 'img-rounded',
                                                                      'style' => 'width:200px; height:300px',
                                                                      'code' => 'movies-picture-img'
                                                                     )
                                                               ),
                                             array('controller'=>'Products',
                                                   'action' => 'view',
                                                   $productBR['Product']['id']
                                                  ),
                                             array('target' => '_self', 'escape' => false));
                ?>
                <p id="details-bluray">
                    <?php echo $this->Html->link(
                        $productBR['Product']['name'],
                        array('controller'=>'Products','action' => 'view', $productBR['Product']['id'])
                        );
                    ?>
                </p>
            </div>
    <?php endforeach; ?>
    </div>
</div>