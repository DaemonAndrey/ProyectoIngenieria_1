<div class="search_product">
    <h1>
        Resultados de la búsqueda: 
        <?php echo $this->request->data['name'];
            echo $this->request->data['filter'];
        ?>
    </h1>
        <div class="row text-center" id="movie-info">
        <?php foreach ($Product as $product): ?>
            <div class="col-md-3">
        <?php
        
			$image = $product['Product']['code'].'.jpg';
             echo "<tr>";
				 echo $this->Html->link($this->Html->image(($image), array('alt' => $product['Product']['name'], 'class' => 'img-rounded', 'style' => 'width:200p ; height:300px', 'code' => 'movie-picture-img')),
                                                    					     array('action' => 'admin_view', $product['Product']['id']),
                                                     					     array('target' => '_self', 'escape' => false));
               
            echo "</tr>"
                
        
        ?>
                
                      <p id="details-movie">
						<?php echo $this->Html->link(
							$product['Product']['name'],
							array('controller'=>'Products','action' => 'admin_view', $product['Product']['id'])
							);
						?>
					</p>
                
		      </div>
            <?php endforeach; ?>
        <?php unset($product); ?>
             
 <!--
        <?php foreach ($ActorsProduct as $actors_product): ?>
            <?php if( $actors_product['ActorsProduct']['actor_id'] == $name ):?>
                <?php foreach ($Product as $product): ?>
						<?php if( $product['Product']['id'] == $actors_product['ActorsProduct']['product_id'] ):?>
							<div class="col-md-3">
								<?php $image = $product['Product']['code'].'.jpg';
									echo $this->Html->link($this->Html->image(($image), array('alt' => $product['Product']['name'], 'class' => 'img-rounded', 'style' => 'width:200px; height:300px', 'code' => 'movie-picture-img')),
																							array('action' => 'admin_view', $product['Product']['id']),
																							 array('target' => '_self', 'escape' => false));  
								?>
							</div>
						  <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php unset($product); ?>
		<?php unset($actors_product); ?> -->
    </div>            
</div>