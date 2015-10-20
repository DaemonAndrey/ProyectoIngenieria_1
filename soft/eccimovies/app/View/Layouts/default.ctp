<!DOCTYPE html>
<html>
<head>

    

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

   <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<title>
		<?php echo 'ECCI Movies' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
       

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    
	?>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   
</head>
<body>
	<div class="container">
		 
            <header class="page">
                    
                    <div class="row">

                        <div class="col-md-2">
                              
                            <?php echo $this->Html->link($this->Html->image('movies-logo.jpg', array('alt' => 'Bienvenido a ECCI Movies', 'class' => 'img-                                                                                rounded', 'style' => 'width:200px', 'id' => 'principal-header-img')),
                                                    					     array('controller'=>'pages','action' => 'home', 'display'),
                                                     					     array('target' => '_self', 'escape' => false));
                            ?>  <!--Imagen con link  a la página principal.-->    
                            
                        </div>
                    
                        <div class="col-md-5 header-image" id="principal-header-text">
                            <h1>ECCI Movies</h1>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>No te preocupes, tenemos lo que estás buscando</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5" id="principal-header-nav">
                            <nav id = "header-nav">
                                <ul>
                                    <li id = "login">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> LOGIN ',                                                                                                     array('controller'=>'users', 'action'=>'login'),array('escape'=>false));?>
                                    </li>

                                    <li id = "signup">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>SIGN UP ',                                                                                                     array('controller'=>'users', 'action'=>'signup'),array('escape'=>false));?>
                                    </li>

                                    <li>
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>Carrito ',                                                                                                      array('controller'=>'pages','action' => 'home', 'display'),
                                                     					     array('target' => '_self', 'escape' => false))?>
                                    </li>
                                </ul>
                            </nav>
                        </div> <!-- Esto hay que pasarlo al resto de las páginas; No todas tienen login! -->
  
                        <div class="row" id="principal-header-nav-form">

                                <div class="col-md-8">
                                    
                                                               <?php
                               echo $this->Form->create('Product', array('url'=> array('controller' => 'products', 'action'=>'buscar'), 'type' => 'post', 'id' => 'indexform'));  
                            
                            echo $this->Form->input('', array('name' => 'name', 'type' => 'search', 'class'=> 'form-control', 'placeholder'=>'Buscar'));                        
                     
                            echo $this->Form->end();?>
                            </div> 
                                
                            
                            <div class="col-md-2">   
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <div class="dropdown dropdown-lg">
                                            <button type="button" class=" btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label for="filter">Filter by</label>
                                                        <select class="form-control">
                                                            <option value="0" selected>Title</option>
                                                            <option value="1">Actor</option>
                                                            <option value="2">Director</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            
                                            
                                            </div>
                                                      
                                            
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                    
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </div>      
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>

                            </div>


                        </div>
                            
                
                  
                    
           </header>
        

		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		      <hr>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
