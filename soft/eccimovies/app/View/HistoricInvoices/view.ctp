

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

    <div class="col-md-4 col-xs-12" id="category-id">
      <h5>CATEGORIES</h5>
      <form>
        <?php

         foreach ($categories as $category)
         {
            echo "<label>";
              echo"<input type = 'checkbox' name = ".$category['Category']['category_name'] . "> " .$category['Category']['category_name'];
            echo "</label>";
            echo "<br>";
         }

         ?>

      </form>
    </div>
    
    <div class="col-md-4 col-xs-12" id="subcategory-id">
    <h5>SUBCATEGORIES</h5>
      <?php foreach ($category['Subcategory'] as $subcategory){

        echo $subcategory['subcategory_name'];
        echo "<br>";
      }
         
        unset($subcategory);
        unset($category);
      ?>
    </div>

    <div class="col-md-4 col-xs-12" id="product-id">
    <h5>PRODUCTS</h5>
      
    </div>
</div>

<div id="message">
  
</div>

<script>

var selected = "";

$( "input[type=checkbox]" ).on( "click", getData);


function getData()
{
    selected = [];

   $('input[type=checkbox]').each(function() {
     if ($(this).is(":checked")) {
         selected.push($(this).attr('name')+" , ");
     }
    })

   sendData();
}

function sendData()
{


  alert(selected.toString());


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("message").innerHTML = "Hola";
          }
      };
      xmlhttp.open("GET", "/Tienda/soft/eccimovies/historicinvoices/printData?q=" + selected, true);
      xmlhttp.send();
      
}

 /**
$( "input[type=checkbox]" ).on( "click", m );

var selected = [];
function m()
{
  selected.length = 0;

 $('input[type=checkbox]').each(function() {
   if ($(this).is(":checked")) {
       selected.push($(this).attr('name'));
   }
  })

  myfun();
}



function myfun()
{
   alert(selected);
}**/
</script>


