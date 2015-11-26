
        

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
                                <li class="active"><?php echo $this->Html->link('NEW RELEASES',
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
                                <li><?php echo $this->Html->link('DEALS', array('controller' => 'categories', 'action' => 'view_deals')); ?></li>
                                <li><a href="#">TOP 10 SELLERS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
               

<!--------------------------------------------CAROUSEL----------------------------------------------------->




            <div id="home_carousel" class="carousel slide" data-ride="carousel">
                <!--Indicadores-->
                <ol class="carousel-indicators">
                    <li data-target="#home_carousel" data-slide-to="0" class="active"></li>
                    <?php 
                        $limit = count($Product);
                        for($i = 1;  $i < $limit; ++$i)
                        {
                            echo "<li data-target='#home_carousel' data-slide-to= "."$i"."></li>";
                        }
                    
                    ?>

                </ol>
                
                <!--Slides-->
                <div class="row text-center">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <?php
                                $temp = $Product[0];
                                $image = $temp['Product']['code'].'.jpg';
                                $totalImage = $this->Html->image(($image), array('alt'=>$temp['Product']['name'], 'style'=>'width:400px; height:500px')); 

                                echo $this->Html->link($totalImage,array('controller'=> 'Products','action' => 'view', $temp['Product']['id']), array('target' => '_self', 'escape' => false));

                           echo " <div class='carousel-caption'>";
                                echo "<h3>".$temp['Product']['name']."</h3>";
                           echo "</div>";

                            ?>
                            

                            
                        </div>


                         <?php 
                            $limit = count($Product);
                            for($i = 1;  $i < $limit; ++$i)
                            {
                                $temp = $Product[$i];
                                $image = $temp['Product']['code'].'.jpg';

                                echo "<div class = 'item'>";
                                $totalImage = $this->Html->image(($image), array('alt'=>$temp['Product']['name'], 'style'=>'width:400px; height:500px')); 
                                echo $this->Html->link($totalImage,array('controller'=> 'Products','action' => 'view', $temp['Product']['id']), array('target' => '_self', 'escape' => false));
                                
                                
                                
                           echo " <div class='carousel-caption'>";
                                echo "<h3>".$temp['Product']['name']."</h3>";
                           echo "</div>";

                                echo "</div>";
                            }

                        ?>



                    </div>
                
                </div>
                
                <!-- Controls-->
                
                <a class="left carousel-control" href="#home_carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Prev</span>
                </a>                
                
                <a class="right carousel-control" href="#home_carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                
            </div>
