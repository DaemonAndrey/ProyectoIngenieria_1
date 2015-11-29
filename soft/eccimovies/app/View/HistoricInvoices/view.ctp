<?php echo $this->Html->css('stats'); ?> 

<div class="row">
  <div class="col-md-12">
    <h1 style="text-align:center">CONSUMER REPORTS</h1>
    <hr>
  </div>
</div>


  <div class="row">

  <div class="col-md-2">
    <h4>Date Range</h4>
  </div>

    <div class="col-md-10">
        <?php
        echo $this->Form->create("date", array('class'=>'form-inline'));

          $date = $this->Session->read('date');
          $min = "";
          $max = "";
          if(isset($date['date']))
          {
            $min = $date['date']['Begin']['year']."-".$date['date']['Begin']['day']."-".$date['date']['Begin']['month'];
            $max = $date['date']['End']['year']."-".$date['date']['End']['day']."-".$date['date']['End']['month'];
          }
          else
          {
              $min = $dates[0][0];
              $max = $dates[1][0];
          }
          
          echo "<div class = 'form-group'>";
           echo  $this->Form->input('Begin',array('type'=>'date', 'class'=>'form-control', 'min'=>$min, 'max'=>$max, 'value'=>$min));
          echo "</div>";

          echo "&nbsp&nbsp&nbsp&nbsp";
          echo "<div class = 'form-group'>";
            echo $this->Form->input('End', array('type'=>'date', 'class'=>'form-control','min'=>$min, 'max'=>$max, 'value'=>$max));
          echo "</div>";

         echo $this->Form->submit('Set Date', array('class'=>'form-control', 'formaction'=>'setDate'));
         echo  $this->Form->end();

         ?>

    </div>
      
</div>



<br>
<br>
<h4>SELECT PRODUCTS TO COMPARE</h4>




<div class="row" id="forms">

    <div class="col-md-4 col-xs-12" id="category-id" style="padding-left:40px">
      <h5>CATEGORIES</h5>
	  <?php
		echo "<div style= 'padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;'>";
			
			
			echo  $this->Form->create('Categories', array('url'=>array('controller'=>'historicInvoices', 'action'=>'getCategories')));
			
				 foreach ($categories as $category)
				 {
					$data = utf8_encode($category['Category']['category_name']);
				   echo $this->Form->input($data, array('hiddenField'=>false,'type'=>'checkbox','name'=>$data, 'value'=>$data));

				 }
			  
			  
			  
			  
			
		echo "</div>";

    echo $this->Form->button('Chart', array('class' => 'chart','formaction'=>'chart/3'));
    echo $this->Form->button('Table', array('class' => 'tableH','formaction'=>'table/3'));
		echo $this->Form->end('Get Subcategories');
			  unset($category);
		 ?>
    </div>

    <div class="col-md-4 col-xs-12" id="subcategory-id" >
    <h5>SUBCATEGORIES</h5>
		<?php



		echo "<div style= 'padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;'>";
		  

			echo $this->Form->create('subcategories', array('url'=>array('controller'=>'historicInvoices','action'=>'getProducts')));
				
			
			  $sub = $this->Session->read('subcategories');
				
			  for($i = 0; $i < count($sub); ++$i)
			  {
				echo $sub[$i]['Category']['category_name']."<br>";
				for($j = 0; $j < count($sub[$i]['Subcategory']); ++$j)
				{
				  
				  $name = $sub[$i]['Subcategory'][$j]['subcategory_name'];
				   echo $this->Form->input($name, array('hiddenField'=>false,'type'=>'checkbox','name'=>$name, 'value'=>$name));

				}
			  }

		 
  		echo "</div>"; 
  		
  		if(count($this->Session->read('subcategories')) > 0)
      {
        echo $this->Form->button('Chart', array('class' => 'chart','formaction'=>'chart/2'));
        echo $this->Form->button('Table', array('class' => 'tableH','formaction'=>'table/2'));
        echo  $this->Form->end('Get Products');
      }
		
		?>
    </div>

    <div class="col-md-4 col-xs-12" id="product-id">
    <h5>PRODUCTS</h5>
		<div style= "padding-left:30px; overflow-y:scroll; overflow-x:hidden; height:300px;">
			<?php

				  echo $this->Form->create('product');
					$pro = $this->Session->read('products');

          
				  $size = count($pro);
					for($i = 0; $i < $size; ++$i)
					{
						echo $pro[$i]['Category']['category_name']." - ";
					  echo $pro[$i]['Subcategory']['subcategory_name'];
            echo "<hr>";
            $sizeP = count($pro[$i]['Product']); //Obtenemos la cantidad de elementos del subarray

					  for($j = 0; $j < $sizeP; ++$j)
					  {
						$name = $pro[$i]['Product'][$j]['name'];
						 echo $this->Form->input($name, array('hiddenField'=>false,'type'=>'checkbox','name'=>$name, 'value'=>$name));

					  }
					}

			   
		echo "</div>";

        if(count($this->Session->read('products')) > 0)
        {
          echo $this->Form->button('Chart', array('class' => 'chart','formaction'=>'chart/1'));
          echo $this->Form->button('Table', array('class' => 'tableH','formaction'=>'table/1'));
        }
				echo $this->Form->end();

			 ?>
	
    </div>
</div>







<?php
/**
$data = $this->Js->get('#dateViewForm ')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#dateViewForm ')->event(
   'change',
   $this->Js->request(
    array('action' => 'setDate', 'controller' => 'HistoricInvoices'),
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
**/
?>

<?php
/**
$data = $this->Js->get('#subcategoriesViewForm ')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#subcategoriesViewForm ')->event(
   'submit',
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
**/
?>


<script>
  function update () {
    
    location.reload();
  }
</script>

<script>
  function generateChart()
  {
  

    if($("#productViewForm input:checked").length > 0)
    {
       $("#productViewForm").attr('action', '/Tienda/soft/eccimovies/HistoricInvoices/chart/1');
       $("#productViewForm").submit();
    }
    else if($("#subcategoriesViewForm input:checked").length > 0)
    {
        
    }
    else
    {
       $("#CategoriesViewForm").attr('action', '/Tienda/soft/eccimovies/HistoricInvoices/chart/3');
       $("#CategoriesViewForm").submit();
    }
  }
</script>

<script>
  function generateTable()
  {
  

    if($("#productViewForm input:checked").length > 0)
    {
       $("#productViewForm").attr('action', '/Tienda/soft/eccimovies/HistoricInvoices/table/1');
       $("#productViewForm").submit();
    }
    else if($("#subcategoriesViewForm input:checked").length > 0)
    {
        
    }
    else
    {

      
       $("#CategoriesViewForm").attr('action', '/Tienda/soft/eccimovies/HistoricInvoices/table/3');
       $("#CategoriesViewForm").submit();
     }

    
  }
</script>