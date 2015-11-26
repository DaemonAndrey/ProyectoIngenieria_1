

<div class="row">
	<div class="col-xs-12 col-md-12">
	<div id="printableArea">
			<?php
			    if(count($data) < 1)
			    {
			        echo "<h4>Lo sentimos, no hubo coincidencias en su búsqueda.\nVuelva a intentarlo</h4>";
			    }
			    else
			    {
			        echo " <h1>Table of Consumption</h1>";


			        echo "<table class='table' style='color:white'>";
					echo "<tr>";

						if(isset($data[0][0]))
						{
							echo "<th>Name</th>";
							echo "<th>Amount Sold</th>";
							echo "<th>Gender</th>";
							if(isset($begin))
							{
								echo "<th> Date Range </th>";
							}

						}
						else
						{
							echo "<th>Name</th>";
							echo "<th>Amount Sold</th>";
							echo "<th>Gender</th>";
							echo "<th>Date</th>";
							echo "<th>Time </th>";
							echo "<th> Date</th>";
						}

					echo "</tr>";
			    }
			 ?>


	</div>

</div>


<div class="row">
	<div class="col-xs-12 col-md-12">
		
		<?php

			$size = count($data);


			if(isset($data[0][0]))
			{
				for($i = 0; $i < $size; ++$i)
				{
					echo "<tr>";
						echo "<td>";
						echo $data[$i]['HistoricProduct']['product_name']; 
						echo "</td>";
						echo "<td>";
						echo $data[$i][0]['product_quantity']; 
						echo "</td>";
						echo "<td>";
						echo $data[$i]['HistoricInvoice']['user_gender']; 
						echo "</td>";	
						if(isset($begin))
						{
							echo "<td>".$begin." - ".$end."</td>";
						}
					echo "</tr>";				

				}
			}
			else
			{

				for($i = 0; $i < $size; ++$i)
				{

					echo "<tr>";
						echo "<td>";
						 echo $data[$i]['HistoricProduct']['product_name']; 
						echo "</td>";

						echo "<td>";
						 echo $data[$i]['HistoricProduct']['product_quantity']; 
						echo "</td>";

						echo "<td>";
						 echo $data[$i]['HistoricInvoice']['user_gender']; 
						echo "</td>";

						echo "<td>";
						 $tempo = split(' ', $data[$i]['HistoricInvoice']['invoice_date']);
						 echo $tempo[0]; 
						echo "</td>";	

						echo "<td>";
						 echo $tempo[1]; 
						echo "</td>";							
					echo "</tr>";
				}				

			}
				


		?>
		</table>



	</div>

</div>

</div>



<input type="button" onclick="printDiv('printableArea')" value="print a div!" />

<script >
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>