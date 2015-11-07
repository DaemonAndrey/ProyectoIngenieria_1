<?php echo $this->Html->css('general'); ?>

<?php 
if( $user_id != null && $admin )
{
	?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
            <li><a href="#">Users</a></li> 
            <li><a href="#">Financial Entities</a></li>  
          </ul>
        </div>
      </div>
    </nav>
	<?php
}
else
{
	?> NOTHING TO SEE HERE... <?php
}
?>