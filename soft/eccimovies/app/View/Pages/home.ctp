
        

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
                                <li class="active" style="color:#E05151"><a href="#" >NUEVOS LANZAMIENTOS</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color:white">CATÁLOGO<span class="caret"></span></a>
                                    <ul class="dropdown-menu scrollable-menu" role="menu">
                                        <?php foreach ($catego as $cat): ?>
                                        
                                        <li>
                                                <?php
 
                                                    echo $this->Html->link(utf8_encode($cat['Page']['category_name']), array('controller' => 'categories', 'action'=> 'viewcategory',$cat['Page']['id']), array('id' => 'dropdown-categories'));

                                                ?>
                                            </a>
                                        </li>

                                       <?php endforeach; ?>
                                       <?php unset($cat);?>
                            
                                    </ul>
                                </li>
                                
                                <li><a href="#">BLU-RAY</a></li>
                                <li><a href="#">DVD</a></li>
                                <li><a href="#">PRÓXIMAMENTE</a></li>
                                <li><a href="#">LO MÁS VENDIDO</a></li>
                                <li><a href="#">LO MÁS BUSCADO</a></li>
                            </ul>
                        </div> 
                    </div>
                
                </div>
                
                <div class="row text-center" id="movie-info">
                    <div class="col-md-3">
                        <img src="img/american-sniper.jpg" alt="Poster de American Sniper" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">American Sniper</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/the-avengers.jpg" alt="Poster de The Avengers" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">The Avengers</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/inglorious-bastards.jpg" alt="Poster de Inglorious Bastards" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Inglorious Bastards</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/monsters-inc.jpg" alt="Poster de Monsters, Inc." class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Monsters, Inc.</p>
                    </div>
                </div>
                
                <div class="row text-center" id="movie-info">
                    <div class="col-md-3">
                        <img src="img/the-artist.jpg" alt="Poster de The Artist" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">The Artist</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/american-history-x.jpg" alt="Poster de American History X" class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">American History X</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/" alt="Poster de " class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Pelicula 7</p>
                    </div>
                    <div class="col-md-3">
                        <img src="img/" alt="Poster de " class="img-rounded" style="width: 200px; height: 300px;">
                        <p id="details-movie">Pelicula 8</p>
                    </div>
                </div>
                
                <div>
                    <!--Paginación-->
                </div> 
            
        
