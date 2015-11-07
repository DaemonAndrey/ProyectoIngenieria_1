<hr>

<?php echo $this->Html->css('invoice'); ?>

<?php if($user_id != null && $custom){ ?>

    <header>
        <h2 id="purchase-h"> 
            Your order has been processed <?php echo $this->Html->image('Icon_check.png', array('class' => 'img-rounded', 'style' => 'width:20px; height:20px')); ?>
        </h2> 

    </header>

    <hr>
    
    <h3 id="purchase-h2">
        Payment Information
    </h3>

    <hr>
    
    <div class="row">
        <div class="control-label col-md-2">
            <p>Name :</p>
        </div>
        <div class="control-label col-md-3">
            <p class="label-class1"> <?php echo $paymentMethods2['PaymentMethod']['name_card']; ?> </p>
        </div>  
    </div>
    
    <div class="row">
        <div class="control-label col-md-2">
            <p class="information-invoice">Shipping Address :</p>
        </div>
        <div class="control-label col-md-6">
            <p class="label-class1"> <?php echo $addresses2['Address']['full_address']; ?> </p>
        </div>  
    </div>

    <div class="row">
        <div class="control-label col-md-2">
            <p class="information-invoice">Payment Method:</p>
        </div>
        <div class="control-label col-md-7">
            <p class="label-class1"> <?php echo $paymentMethods2['PaymentMethod']['issuer'].'<br>'.$paymentMethods2['PaymentMethod']['account']; ?> </p>
        </div>
    </div>
    
    <hr>

    <table class="table">
         <tr>
            <th>Quantity</th>
             <th>Product</th>
            <th>Price</th>
            <th>Total Item</th>
        </tr>
        <?php foreach ($carts_products as $carts_product): ?>
            <?php if($carts_product['CartsProduct']['cart_id']==$carts['Cart']['id']): ?>
                <?php foreach ($products as $product): ?>
                    <?php if($product['Product']['id']==$carts_product['CartsProduct']['product_id']): ?>
                        <tr>
                            <td><?php echo $carts_product['CartsProduct']['quantity']; ?></td>
                            <td><?php echo $product['Product']['name']; ?> </td>
                            <td><?php echo '$ '.$product['Product']['price']; ?></tc>
                            <td>
                                <?php echo '$ '.$carts_product['CartsProduct']['quantity']*$product['Product']['price']; ?>
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
            <p class="ammount-class"> <?php echo '$ '.($carts['Cart']['subtotal']+$shippingPrice);?> </p>
            <p class="ammount-class"> <?php echo '$ '; echo number_format((float)$totalTaxes, 2, '.', ''); ?></p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="control-label col-md-12">
            <p id='totalAmmount'> Total For This Order : $
                <?php echo number_format((float)$totalAmmount, 2, '.', '');?>
            </p>
        </div>
    </div>
    
    <div class="row">
        <div class='col-md-6'>                 
                <button id="continue-button" onclick="window.location.href='<?php echo Router::url('/', array('controller' => 'pages', 'action' => 'display', 'home'))?>'">Continue Shopping</button>
        </div>
   </div>

<?php } ?>

            <?php if(!$custom || $user_id == null)
            {
                ?> <h1 id='nothing'> NOTHING TO SEE HERE... </h1> <?php
            } ?>



<hr>