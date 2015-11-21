 <?php
    if(count($data) < 1)
    {
        echo "<h4>Lo sentimos, no hubo coincidencias en su búsqueda.\nVuelva a intentarlo</h4>";
    }
    else
    {
        echo " <h1>Table of Consumption</h1>";


        echo "<table class='table'>";
		echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Amount Sold</th>";
			echo "<th>Gender</th>";
			echo "<th>Date</th>";
			echo "<th>Time </th>";
		echo "</tr>";
    }
 ?>







	<?php
		$size = count($data);

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
	?>
</table>