<div class="row">
  <div class="col-md-12">
    <h1 style="text-align:center">CONSUMER REPORTS</h1>
    <hr>
  </div>
</div>


  <div class="row">
    <div class="col-md-4"><h3>DATA RANGE</h3></div>
  	<div class="col-md-1"><h4>BEGIN</h4></div>
  	<div class="col-md-3"><input type="date" name="inferior_range" min = <?php echo $dates[0][0]?> max  = <?php echo $dates[1][0]?> style="width:60%;float:left;color:black"></div>
  	<div class="col-md-1 col-xs-12"><h4>END</h4></div>
  	<div class="col-md-3 col-xs-12"><input type="date" name="inferior_range" min = <?php echo $dates[0][0]?> max  = <?php echo $dates[1][0]?> style="width:60%;float:left;color:black"></div>
  </div>


<br>
<br>
<h4>SELECT PRODUCTS TO COMPARE</h4>




<div class="row" id="forms">

    <div class="col-md-4 col-xs-12" id="category-id" style="padding-left:40px">
      <h5>CATEGORIES</h5>
		<div style= "padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;">
			<?php
			
			echo  $this->Form->create('Categories', array('url'=>array('controller'=>'historicinvoices', 'action'=>'getCategories')));
				 foreach ($categories as $category)
				 {
					$data = utf8_encode($category['Category']['category_name']);
				   echo $this->Form->input($data, array('hiddenField'=>false,'type'=>'checkbox','name'=>$data, 'value'=>$data));

				 }
			  

			  echo $this->Form->end();
			  unset($category);
			  
			 ?>
		</div>
    </div>

    <div class="col-md-4 col-xs-12" id="subcategory-id" >
    <h5>SUBCATEGORIES</h5>
		<div style= "padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;">
		  <?php

			echo $this->Form->create('subcategories', array('url'=>array('controller'=>'historicinvoices','action'=>'getProducts')));

			
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
    </div>

    <div class="col-md-4 col-xs-12" id="product-id">
    <h5>PRODUCTS</h5>
		<div style= "padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;">
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

			   
		echo "</div>";
				echo $this->Form->button('Charts',array('type'=>'submit','formaction'=>'chart', 'style'=>'color:black;margin-top:20px'));
				 echo $this->Form->button('Table',array('type'=>'submit','formaction'=>'table', 'style'=>'color:black'));
				echo $this->Form->end();

			 ?>
	
    </div>
</div>



<?php

$data = $this->Js->get('#CategoriesViewForm ')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#CategoriesViewForm ')->event(
   'change',
   $this->Js->request(
    array('action' => 'getCategories', 'controller' => 'HistoricInvoices'),
    array(
        'data' => $data,
        'async' => true,    
        'dataExpression'=>true,
        'method' => 'POST',
		'complete' => 'update()'
    )
  )
);

echo $this->Js->writeBuffer(); 
?>

<?php

$data = $this->Js->get('#subcategoriesViewForm ')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#subcategoriesViewForm ')->event(
   'change',
   $this->Js->request(
    array('action' => 'getProducts', 'controller' => 'HistoricInvoices'),
    array(
        'data' => $data,
        'async' => true,    
        'dataExpression'=>true,
        'method' => 'POST',
		'complete' => 'update()'
    )
  )
);

echo $this->Js->writeBuffer(); 
?>


<script>
  function update () {
    //$("#subcategory-id").load(location.href+" #subcategory-id");
    
    location.reload();
  }
</script>
