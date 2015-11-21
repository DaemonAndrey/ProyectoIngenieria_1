<table class="table">
	<tr>
		<th>Name</th>
		<th>Amount Sold</th>
		<th>Gender</th>
		<th>Date</th>
		<th>Time </th>
	</tr>

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