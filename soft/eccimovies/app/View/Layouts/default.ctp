<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>
		<?php echo 'ECCI Movies' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->script('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    
	?>
</head>
<body>
	<div class="container">
		 
            <header class="page">
                    
                    <div class="row">

                        <div class="col-md-2">
                              
                            <?php echo $this->Html->link($this->Html->image('movies-logo.jpg', array('alt' => 'Bienvenido a ECCI Movies', 'class' => 'img-                                                                                rounded', 'style' => 'width:200px', 'id' => 'principal-header-img')),
                                                    					     array('controller'=>'pages','action' => 'display', 'home'),
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
                            <div role="navigation">
                                <div class="container-fluid navbar-right">
                                    
                                    <ul class="nav navbar-nav">
                                        
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in"></span> LOGIN',                                                                                                     array('controller'=>'users', 'action'=>'login'),array('escape'=>false));?>
                                        </li>
                                                                                
                                        <li>
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> SIGN UP',                                                                                                     array('controller'=>'users', 'action'=>'registrar'),array('escape'=>false));?>
                                        </li> 
                                   
                                        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> MI CARRITO</span></a></li>
                                    </ul>
                                   
                                </div>
                            </div>
                        </div> <!-- Esto hay que pasarlo al resto de las páginas; No todas tienen login! -->
  
                        <div class="row" id="principal-header-nav-form">
                            <form role="form">
                                <div class="form-group">
                                    <input type="search" placeholder="Buscar" class="form-control">
                                </div>                                    
                            </form>
                        </div>
                            
                
                    </div>
                    
           </header>
        

		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
