<?php
$wishlist_user_id = h($post['Wishlist']['user_id']);
// Si soy cliente y me pertenece el carrito
if($user_id != null && $custom && $user_id == $wishlist_user_id)
{	
	?>
	<div class="carts view">

	<h2><?php echo __('My wishlist'); ?></h2>

	<table class="table">
		<tr>
			<th>Product</th>
			<th>Remove</th>
			<th>Add to wishlist</th>
		</tr>
		
		<?php
			$products = $post['Product'];
			
			<?php foreach ($products as $product): ?>
				<div class="col-md-3">
				    <?php echo $this->Html->link($this->Html->image(($product['Product']['code'].'.jpg'),
                                                                array('alt' =>  $product['Product']['name'],
                                                                'class' => 'img-rounded',
                                                                'style' => 'width:200px; height:300px',
                                                                 'code' => 'movies-picture-img')
                                                                ),
                                                         array('controller'=>'Products',
                                                               'action' => 'view',
                                                               $product['Product']['id']),
                                                         array('target' => '_self', 'escape' => false));
                    ?>
                    <?php
                    if($product['Product']['format'] === 'DVD'){
                    ?>
                        <p>
                            <?php echo $this->Html->image('!DVD.png', 
                                                    array('alt' => 'DVD format',
                                                    'class' => 'img-rounded',
                                                    'style' => 'width:200px; height:25px; margin-top:-20px', 
                                                    'id' => 'dvd-format'
                                                     )
                                                    ); ?>
                        </p>
                    <?php
                    }
                    else{
                    ?>
                    <p>
                        <?php echo $this->Html->image('!Bluray.png', 
                                                    array('alt' => 'Blu-ray format',
                                                    'class' => 'img-rounded',
                                                    'style' => 'width:200px; height:25px; margin-top:-20px', 
                                                    'id' => 'bluray-format'
                                                    )
                                                    ); 
                        ?>
                    </p>
                    <?php
                    }
                    ?>
                            
                    <p id="details-movie">
				        <?php echo $this->Html->link(
								$product['Product']['name'],
								array('controller'=>'Products','action' => 'view', $product['Product']['id'])
								);
				        ?>
				    </p>
                </div>
        <?php endforeach; ?>
		<?php unset($products); ?>
        
        
        
	</table>
 ?>
	</div>
<?php
}
// Si no estoy loggeado, o soy administrador o gerente o soy cliente y no me pertenece el carrito
if($user_id == null || ($user_id != null && ($admin || $manager || ($custom && $user_id != $wishlist_user_id))))
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
?>