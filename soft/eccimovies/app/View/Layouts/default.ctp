<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

   <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<title>
		<?php echo 'ECCI Movies' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
    echo $this->Html->script('jspdf.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


        <?php echo $this->Js->writeBuffer(array('cache'=>TRUE));?>

</head>
<body>

	<div class="container">

    <div class="row page">

    <!-- LOGO DE LA PÁGINA -->

    <div class="col-xs-12 col-md-2">
       <?php echo $this->Html->link($this->Html->image('movies-logo.jpg', array('alt' => 'Bienvenido a ECCI Movies', 'class' => 'img-rounded', 'style' => 'width:200px', 'id' => 'principal-header-img')),
        array('controller'=>'pages','action' => 'home', 'display'), array('target' => '_self', 'escape' => false));
         ?>

    </div>

        <!-- NOMBRE DE LA PÁGINA -->

    <div class="col-xs-12 col-md-5" id="principal-header-text">
        <h1>ECCI Movies</h1><br>
        <h3>All you're looking for at one click</h3>
    </div>

    <div class="col-xs-12 col-md-5">

            <nav id="header-nav">
          <ul>

              <?php if($user_id == null)
              {
      ?>
      <!--LOGIN -->
      <li id="login">
      <?php echo $this->Html->link(	'<span class="glyphicon glyphicon-log-in"> </span> LOGIN ',
                array(	'controller'=>'users',
                    'action'=>'login'
                  ),
                array('escape'=>false)
              );
      ?>
      </li>

      <!-- SIGNUP -->

      <li id="signup">
      <?php echo $this->Html->link(	'<span class="glyphicon glyphicon-user" id="signup-button"> </span>SIGN UP ',
                array(	'controller'=>'users',
                    'action'=>'signup'
                  ),
                array('escape'=>false)
              );
      ?>
      </li>
      <?php
      }
      ?>

              <?php if($user_id != null)
      {
      // Si soy cliente
      if($custom)
      {
      ?>
      <!--CART-->
      <!--CART-->
      <li id="shoppingCart">
       <?php


         $options = array('controller'=>'carts','action' => 'edit', -1);

        if(isset($_SESSION['Auth']['User']['cart']))
        {
          $options = array('controller'=>'carts','action' => 'edit', $_SESSION['Auth']['User']['cart']);
        }

      echo $this->Html->link(	'<span class="glyphicon glyphicon-shopping-cart"></span> CART ',
              $options, array('target' => '_self', 'escape' => false, 'id' => 'cartBtn')
            )
      ?>
      </li>
      <?php
      }
      // Si soy administrador
      if($admin)
      {
      ?>
      <!--MANAGE-->
      <li id="shoppingCart">
      <?php
      echo $this->Html->link(	'<span class="glyphicon glyphicon-tasks"></span> MANAGE ',
              array('controller'=>'users','action' => 'manage'),
              array('target' => '_self', 'escape' => false)
            )
      ?>
      </li>
      <?php
      }
      // Si soy manager
      if($manager)
      {
      ?>
      <!--CHARTS-->
      <li id="shoppingCart">
      <?php
      echo $this->Html->link(	'<span class="glyphicon glyphicon-stats"></span> STATS ',
              array('controller'=>'pages','action' => 'home'),
              array('target' => '_self', 'escape' => false)
            )
      ?>
      </li>
      <?php
      }
      ?>
      
      
      <!-- MY ACCOUNT -->
      <?php
      if($custom)
      {
          ?>
              <li id="account">
              <?php
              echo $this->Html->link(	'<span class="glyphicon glyphicon-cog" id="account-button"></span> MY ACCOUNT ',
                    array('controller'=>'users','action' => 'my_account'),
                    array('target' => '_self', 'escape' => false)
                  )
              ?>
              </li>
            <?php
      }
      ?>
      <?php
      if($admin)
      {
          ?>
              <li id="account">
              <?php
              echo $this->Html->link(	'<span class="glyphicon glyphicon-cog" id="account-button"></span> MY ACCOUNT ',
                    array('controller'=>'users','action' => 'settings'),
                    array('target' => '_self', 'escape' => false)
                  )
              ?>
              </li>
            <?php
      }
      ?>
      <?php
      if($manager)
      {
          ?>
              <li id="account">
              <?php
              echo $this->Html->link(	'<span class="glyphicon glyphicon-cog" id="account-button"></span> MY ACCOUNT ',
                    array('controller'=>'users','action' => 'settings'),
                    array('target' => '_self', 'escape' => false)
                  )
              ?>
              </li>
            <?php
      }
      ?>
      
              
              

      <!--LOGOUT-->
      <li id="logout">
      <?php
      echo $this->Html->link(	'<span class="glyphicon glyphicon-log-out"></span> LOGOUT ',
            array('controller'=>'users','action' => 'logout','display'),
            array('target' => '_self', 'escape' => false)
          )
      ?>
      </li>
      <?php
      }
      ?>

          </ul>

      </nav>

      <br>
      <br>

      <form class="form-inline" action="/Tienda/soft/eccimovies/products/buscar"  method="post" accept-charset="utf-8" >
        <div class="input-group">
          <select name="filter" class="form-control btn btn-default dropdown-toggle" data-toggle = "dropdown" id="search-filter">
          <option> All </option>
          <option>Title</option>
          <option>Actor</option>
          <option>Director</option>
         </select>

          <input name="name" class="form-control" placeholder="Search" id="search-text" type="search" required="required">

          <button type="submit" class="btn btn-default"  id="search-btn">
          <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
          </button>
        </div>


      </form>



    </div>




</div>


















		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

    <footer>

    </footer>

	</div>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
