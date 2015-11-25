<?php echo $this->Html->css('wishlists'); ?>
<?php echo $this->Html->css('product.css'); ?>
<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('general'); ?>

<?php
$wishlist_user_id = h($post['Wishlist']['user_id']);

// Si soy cliente y me pertenece la wishlist
if($user_id != null && $custom && $user_id == $wishlist_user_id)
{	
    ?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li class="active"><?php
                    $options = array('controller'=>'wishlists','action' => 'edit', -1);
					if(isset($_SESSION['Auth']['User']['wishlist']))
                    {
                        $options = array('controller'=>'wishlists','action' => 'edit', $_SESSION['Auth']['User']['wishlist']);
					}
					echo $this->Html->link(	'Wishlist',
                                           $options,
                                           array('target' => '_self',
                                                 'escape' => false,
                                                 'class' => 'nav-buttons'
                                                )
                                          )
                ?>
              </li> 
              
          </ul>
        </div>
      </div>
    </nav>
    
    <hr>

    <div>

        <p id="wishlists_title">
            <span class="glyphicon glyphicon-heart"></span>
            <?php echo __('My Wishlist'); ?>
            <span class="glyphicon glyphicon-heart"></span>
        </p>
        <hr>


    <div class="row text-center" id="movie-info">
        <?php $wishlistProducts = $post['WishlistProduct']; ?>
        <?php foreach($wishlistProducts as $wishlistProduct): ?>
            <div class="col-md-3">
                
                
                <p id="imagen"><?php echo $this->Html->link($this->Html->image(($wishlistProduct['Product']['code'].'.jpg'), array('alt' =>  $wishlistProduct['Product']['name'], 'id' => 'movies-picture-img')),
                                                    					     array('controller'=>'Products','action' => 'view', $wishlistProduct['Product']['id']),
                                                     					     array('target' => '_self', 'escape' => false));
				    ?>
                </p>
                <?php if($wishlistProduct['Product']['format'] === 'DVD') { ?>
                    <p> <?php echo $this->Html->image('!DVD.png', array('alt' => 'DVD format',
                                                                        'class' => 'img-rounded',
                                                                        'style' => 'width:200px; height:25px; margin-top:-20px', 
                                                                        'id' => 'dvd-format')
                                                    ); 
                        ?>
                    </p>
                    <?php }
                        else{ ?>
                            <p>
                                <?php echo $this->Html->image('!Bluray.png', array('alt' => 'Blu-ray format',
                                                                                    'class' => 'img-rounded',
                                                                                    'style' => 'width:200px; height:25px; margin-top:-20px', 
                                                                                    'id' => 'bluray-format'
                                                                                    )
                                                            ); 
                                ?>
                            </p>
                        <?php } ?>
				    <p id="details-movie">
				        <?php echo $this->Html->link(
				            $wishlistProduct['Product']['name'],array('controller'=>'Products','action' => 'view', $wishlistProduct['Product']['id'])
				        );
				        ?>
				    </p>
                <p id="remove-wishlist">
				        <?php echo $this->Form->postLink($this->Html->image(('notification_error.jpg'), array('alt' =>  'remove', 'id' => 'delete-img')),array('action' => 'removeProductFromWishlist', $wishlistProduct['id'], $post['Wishlist']['id']),array('escape' => false, 'confirm' => 'Are you sure you want to remove this item from your wishlist?')); ?>
				</p>
                    
            </div>
        <?php endforeach; ?>
        <?php unset($wishlistProducts); ?>
    </div>
      
  <hr>
    <p>
    <?php
    echo "<li id = 'fom-button'>";
    echo $this->Html->link(	'<span class="glyphicon glyphicon-home"></span> HOME ',
                            array('controller'=>'pages','action' => 'display', 'home'),
                            array('target' => '_self', 'escape' => false)
                        );

    echo "</li>";
    ?>
</p>
</div>

<?php
    }
    // Si no estoy loggeado, o soy administrador o gerente o soy cliente y no me pertenece el carrito
    if($user_id == null || ($user_id != null && ($admin || $manager || ($custom && $user_id != $wishlist_user_id))))
    {
	   ?> <h1> NOTHING TO SEE HERE... </h1> <hr><?php
    }
?>



