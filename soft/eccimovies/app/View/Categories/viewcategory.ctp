<?php echo $this->Html->css('categories'); 
echo $this->Html->css('general');?>

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
                <li><a href="#" >NEW RELEASES</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" style="color:black">GENRES<span class="caret"></span></a>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <?php
                        foreach ($catego as $cat):
                        if( $cat['Page']['category_name'] !== 'Unsorted')
                        {
                            ?>
                            <li>
                                    <?php

                                        echo $this->Html->link($cat['Page']['category_name'], array('controller' => 'categories', 'action'=> 'viewcategory',$cat['Page']['category_name']), array('category_name' => 'dropdown-categories'));

                                    ?>
                                </a>
                            </li>

                           <?php 
                        }
                        endforeach; ?>
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

<?php
if($user_id != null && $admin)
{
	?>
	
	<?php
}
?>

<hr>

<div>
	<p id="cabeza_tabla_categories">
		<?php echo $category['Category']['category_name']; ?>
	</p>
	<hr>
		<?php foreach ($subcategories as $subcategory): ?>
			<?php if($subcategory['Subcategory']['category_id']==$category['Category']['id']): ?>
                <p id="tituloSubCategoria">
                    <?php //echo $subcategory['Subcategory']['subcategory_name'];
							echo $this->Html->link(	$subcategory['Subcategory']['subcategory_name'],
															array('action' => 'viewsubcategory', $subcategory['Subcategory']['subcategory_name'])
														);
							
                    ?>
				<hr>
                </p>
                <div class="row text-center" id="movie-info">
				<?php foreach ($products as $product): ?>
					<?php if($product['Product']['subcategory_id']==$subcategory['Subcategory']['id'] && $product['Product']['enable']!='0'): ?>
						<div class="col-md-3">
						 
						
							<?php echo $this->Html->link($this->Html->image(($product['Product']['code'].'.jpg'), array('alt' =>  $product['Product']['name'], 'class' => 'img-rounded',                                                             'style' => 'width:200px; height:300px','code' => 'movies-picture-img')),
                                                    					     array('controller'=>'Products','action' => 'view', $product['Product']['id']),
                                                     					     array('target' => '_self', 'escape' => false));?>
							<p id="details-movie">
								<?php echo $this->Html->link(
									$product['Product']['name'],
									array('controller'=>'Products','action' => 'view', $product['Product']['id'])
									);
								?>
							</p>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
                </div>
				<hr>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php unset($subcategory); ?>
	
</div>