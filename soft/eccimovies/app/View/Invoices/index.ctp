<hr>

<?php echo $this->Html->css('invoice'); ?>

<?php if($user_id != null && $custom){ ?>

    <header id="principal-header-text-invoice">
    <h2> <center> Payment and Shipping Information </center> </h2>
    </header>
 
    <hr>

    <table class="table">
         <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Item</th>
        </tr>
        <?php foreach ($carts_products as $carts_product): ?>
            <?php if($carts_product['CartsProduct']['cart_id']==$carts['Cart']['id']): ?>
                <?php foreach ($products as $product): ?>
                    <?php if($product['Product']['id']==$carts_product['CartsProduct']['product_id']): ?>
                        <tr>
                            <td>
                                <?php echo $this->Html->image($product['Product']['code'].'.jpg', array('alt' =>  $product['Product']['name'], 'class' => 'img-rounded', 'style' => 'width:150px; height:200px', 'code' => 'movies-picture-img'),
                                                                                 array('controller'=>'Products','action' => 'admin_view', $product['Product']['id']),
                                                                                 array('target' => '_self', 'escape' => false));
                                ?>
                            </td>
							<td><?php echo $product['Product']['name']; ?> </td>
                            <td><?php echo $carts_product['CartsProduct']['quantity']; ?></td>
                            <td><?php 
                                      $precioFinal = $product['Product']['price'] - $product['Product']['price']*$product['Product']['discount']/100;
                                      echo '$ '.number_format((float)$precioFinal, 2, '.', ''); 
                                ?>
                            </td>
                            <td>
                                <?php 
                                      echo '$ '.number_format((float)$carts_product['CartsProduct']['quantity']*$precioFinal, 2, '.', '');
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
              <?php endforeach; ?>
              <?php unset($product); ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php unset($carts_product); ?>
    </table>

    <hr>
    
    <div class="row">
        <div class="control-label col-md-10">
            <p class="label-class"> Subtotal: </p>
            <p class="label-class"> Shipping and Handling: </p >
            <p class="label-class"> Total Before Tax: </p>
            <p class="label-class"> Sales Taxes: </p>
        </div>

        <div class="control-label col-md-2">
            <p class="ammount-class"> <?php echo '$ '.$carts['Cart']['subtotal'];?> </p>
            <p class="ammount-class"> <?php echo '$ '.$shippingPrice;?> </p>
            <p class="ammount-class"> <?php echo '$ '.($carts['Cart']['subtotal'] + $shippingPrice);?> </p>
            <p class="ammount-class"> <?php echo '$ '; echo number_format((float)$totalTaxes, 2, '.', ''); ?></p>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="control-label col-md-12">
            <p id='totalAmmount'> Total For This Shippment : $
                <?php echo number_format((float)$totalAmmount, 2, '.', ''); ?>
            </p>
        </div>
    </div>

	<?php echo $this->Form->create('Invoice', array('url'=> array('action'=>'view'), 'type' => 'post', 'id' => 'indexform', 'inputDefaults' => array('label'=>false, 'div'=>false))); 

		echo "<div class='row'>";
			 echo "<div class='control-label col-md-7'>";
				 echo "<div class='form-group'>";
					echo $this->Form->input('payment_method_id', array(
																'div' => 'form-group',      
																'label' => 'Payment Method',
																'name' => 'payment_method_id'
																)
												  );

				 echo "</div>";
			echo "</div>";     
		echo "</div>";
 
        echo "<div class='row'>";
            echo "<div class='control-label col-md-8'>";
                echo "<div class='form-group'>";
                   echo $this->Form->input('address_id', array(
                                                                'div' => 'form-group',      
                                                                'label' => 'Ship to',
                                                                'name' => 'address_id'
                                                                )
                                                  );
                   
                echo "</div>";
            echo "</div>";

            echo "<div class='col-md-4'>";                     
                echo $this->Form->button('Confirm and Pay',array('type'=>'submit', 'class'=>'btn btn-default', 'id' => 'pay-button'));
            echo "</div>";  
        echo "</div>";
                                      
    echo $this->Form->end();
                                      
} ?>
<?php if(!$custom || $user_id == null)
{
	?> <h1 id='nothing'> NOTHING TO SEE HERE... </h1> <?php
} ?>
<hr>