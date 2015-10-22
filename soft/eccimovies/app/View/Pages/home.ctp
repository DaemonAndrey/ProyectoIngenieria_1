
        

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
                                <li class="active"><a href="#" >NEW RELEASES</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color:white">CATÁLOGO<span class="caret"></span></a>
                                    <ul class="dropdown-menu scrollable-menu" role="menu">
                                        <?php foreach ($catego as $cat): ?>
                                        
                                        <li>
                                                <?php
 
                                                    echo $this->Html->link($cat['Page']['category_name'], array('controller' => 'categories', 'action'=> 'viewcategory',$cat['Page']['category_name']), array('category_name' => 'dropdown-categories'));

                                                ?>
                                            </a>
                                        </li>

                                       <?php endforeach; ?>
                                       <?php unset($cat);?>
                            
                                    </ul>
                                </li>
                                
                                <li><a href="#">BLU-RAY</a></li>
                                <li><a href="#">DVD</a></li>
                                <li><a href="#">COMING SOON</a></li>
                                <li><a href="#">TRENDING BLU-RAY</a></li>
                                <li><a href="#">TOP 10 SELLERS</a></li>
                            </ul>
                        </div> 
                    </div>
                
                </div>
                
                <div class="row text-center" id="movie-info">
                    <div class="col-md-3">
                        <img src="img/BRP-6633.jpg" alt="Poster de American Sniper" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Ted 2</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/AQA-4470.jpg" alt="Poster de The Avengers" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">The Avengers</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/ALV-3267.jpg" alt="Poster de Inglorious Bastards" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Avatar</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/HWO-7576.jpg" alt="Poster de Monsters, Inc." class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Intouchables</p>
                    </div>
                </div>
                
                <div class="row text-center" id="movie-info">
                    <div class="col-md-3">
                        <img src="img/IEB-8949.jpg" alt="Poster de The Artist" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Gravity</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/JQC-7000.jpg" alt="Poster de American History X" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">American Sniper</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/CJZ-1370.jpg" alt="Poster de American History X" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Sueños de Libertad</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/CBV-0812.jpg" alt="Poster de American History X" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Life of Pi</p>
                    </div>
                </div>
                
                <div>
                    <!--Paginación-->
                </div> 
            
        
