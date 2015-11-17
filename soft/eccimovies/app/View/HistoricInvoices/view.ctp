

<div class="row">
  <div class="col-md-12">
    <h1 style="text-align:center">CONSUMER REPORTS</h1>
    <hr>
  </div>
</div>


  <div class="row">
    <div class="col-md-4"><h3>DATA RANGE</h3></div>
  	<div class="col-md-1"><h4>BEGIN</h4></div>
  	<div class="col-md-3"><input type="date" name="inferior_range" style="width:60%;float:left;color:black"></div>
  	<div class="col-md-1 col-xs-12"><h4>END</h4></div>
  	<div class="col-md-3 col-xs-12"><input type="date" name="inferior_range" style="width:60%;float:left;color:black"></div>
  </div>


<br>
<br>
<h4>SELECT PRODUCTS TO COMPARE</h4>




<div class="row">

    <div class="col-md-4 col-xs-12" id="category-id" style="padding-left:40px">
      <h5>CATEGORIES</h5>

        <?php
        echo  $this->Form->create();
             foreach ($categories as $category)
             {

               echo $this->Form->input($category['Category']['category_name'], array('hiddenField'=>false,'type'=>'checkbox','name'=>$category['Category']['category_name'], 'value'=>$category['Category']['category_name']));

             }

          echo $this->Form->end();
          unset($category);
         ?>
    </div>

    <div class="col-md-4 col-xs-12" id="subcategory-id">
    <h5>SUBCATEGORIES</h5>
      <?php
        echo $this->Form->create('subcat');
          $sub = $this->Session->read('subcategories');

          for($i = 0; $i < count($sub); ++$i)
          {
            for($j = 0; $j < count($sub[$i]['Subcategory']); ++$j)
            {
              $name = $sub[$i]['Subcategory'][$j]['subcategory_name'];
               echo $this->Form->input($name, array('hiddenField'=>false,'type'=>'checkbox','name'=>$name, 'value'=>$name));

            }
          }
        echo  $this->Form->end();


      ?>
    </div>

    <div class="col-md-4 col-xs-12" id="product-id">
    <h5>PRODUCTS</h5>

        <?php
            echo $this->Form->create('product');
                $pro = $this->Session->read('products');

                for($i = 0; $i < count($pro); ++$i)
                {
                  for($j = 0; $j < count($pro[$i]['Product']); ++$j)
                  {
                    $name = $pro[$i]['Product'][$j]['name'];
                     echo $this->Form->input($name, array('hiddenField'=>false,'type'=>'checkbox','name'=>$name, 'value'=>$name));

                  }
                }

            echo $this->Form->end();

         ?>
    </div>
</div>

<div id="message">
  <?php

   ?>
</div>


<?php
// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus
$data = $this->Js->get('#HistoricInvoiceViewForm input[type=checkbox]')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#HistoricInvoiceViewForm input[type=checkbox]')->event(
   'change',
   $this->Js->request(
    array('action' => 'printData', 'controller' => 'HistoricInvoices'),
    array(
        'update' => '#message',
        'data' => $data,
        'async' => true,
        'dataExpression'=>true,
        'method' => 'POST',
        'complete'=> 'self.setInterval("updateSubcat()",100);'
    )
  )
);
echo $this->Js->writeBuffer();
?>

<script>
  function updateSubcat()
  {
    $("#subcategory-id").load(location.href+" #subcategory-id");
  }
</script>


<?php
// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus
$data = $this->Js->get('#subcatViewForm input[type=checkbox]')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#subcatViewForm input[type=checkbox]')->event(
   'change',
   $this->Js->request(
    array('action' => 'getProducts', 'controller' => 'HistoricInvoices'),
    array(
        'update' => '#message',
        'data' => $data,
        'async' => true,
        'dataExpression'=>true,
        'method' => 'POST',
        'complete'=> 'self.setInterval("updateProducts()",100);'
    )
  )
);
echo $this->Js->writeBuffer();
?>

<script>
  function updateProducts()
  {
    $("#product-id").load(location.href+" #product-id");
  }
</script>
