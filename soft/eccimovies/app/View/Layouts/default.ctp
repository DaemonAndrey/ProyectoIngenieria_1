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
                
                <!-- LOGO DE LA PÁGINA -->
                
                <div class="col-md-2">
                   <?php echo $this->Html->link($this->Html->image('movies-logo.jpg', array('alt' => 'Bienvenido a ECCI Movies', 'class' => 'img-rounded', 'style' => 'width:200px', 'id' => 'principal-header-img')),
                    array('controller'=>'pages','action' => 'home', 'display'), array('target' => '_self', 'escape' => false));
                     ?>
                           
                </div>
                    
                <!-- NOMBRE DE LA PÁGINA -->     
                
                <div class="col-md-6" id="principal-header-text">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h1>ECCI Movies</h1>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <h3>All you're looking at one click</h3>
                        </div>
                    </div>      
                    
                </div>
                    
                   
                <!-- FORMULARIO -->
                
                <div class="col-md-4">
                    

                    <div class="row">
                        <div class="col-md-12" id="principal-header-nav">
                            <nav id="header-nav">
                                <ul>
                                    <!--LOGIN -->
                                    <li id="login">
                                    
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-log-in">                                             </span> LOGIN ',   array('controller'=>'users',                                                                    'action'=>'login'),array('escape'=>false));
                                        ?>
                                            
                                    </li>
                                    
                                    <!-- SIGNUP -->
                                    
                                    <li id="signup">
                                        
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user">                                                </span>SIGN UP ',                                                                                              array('controller'=>'users','action'=>'signup'),array('escape'=>false));
                                        ?>
                                                     
                                    </li>
                                    
                                    <!--CARRITO-->
                                    <li>
                                       <?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-                                          cart"></span>Cart ',array('controller'=>'pages','action' => 'home',                                             'display'), array('target' => '_self', 'escape' => false))
                                        ?>
                                        
                                    </li>
                                </ul>
                            
                            </nav>
                        </div>
                    </div>
                    
                    
                    
                    <!--BUSCAR -->
                    
                    <div class="row">
                        <div class="col-md-12" id="principal-nav-search">
                            
                         <!-- BOTÓN DE BUSCAR -->
                           <?php
                               echo $this->Form->create('Product', array('url'=> array('controller' => 'products',                                  'action'=>'buscar'), 'type' => 'post', 'id' => 'indexform', 'class'=>'form-inline', 'inputDefaults' => array('label'=>false, 'div'=>false)));  
                            
                              echo "<div class='form-group'>";

                              echo $this->Form->input(' ',array(
                                    'options' => array('Title','Actor','Director'),
                                    'empty' => 'All',
                                    'class'=>'form-control btn btn-default dropdown-toggle',
                                    'data-toggle'=> 'dropdown',
                                    'name'=>'filter',
                                    'id'=>'search-filter'
                               
                              ));

                              echo $this->Form->input('search', array('name' => 'name', 'type' => 'search', 'class'=>                                     'form-control', 'placeholder'=>'Search', 'id' => 'search-text'));                       

                             echo "</div>";
                     
                             echo $this->Form->button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>',array('type'=>'search', 'class'=>'btn btn-primary'));
                              echo $this->Form->end();

                              echo "<p id = 'text'> </p>"
                            ?>
                            
                            
                        </div>
                         
                    
                </div>
 
            </div>
        </header>
        

		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

        
        <footer>
            <!--PENDIENTE -->
        </footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
