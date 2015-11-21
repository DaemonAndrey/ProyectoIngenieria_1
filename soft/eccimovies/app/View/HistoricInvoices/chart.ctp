 <?php
    if(count($data) < 1)
    {
        echo "<h4>Lo sentimos, no hubo coincidencias en su búsqueda.\nVuelva a intentarlo</h4>";
    }
    else
    {
        echo " <h1>Graphic of Consumption</h1>";
    }
 ?>




 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([

          ['Name', 'Amount Sold', 'Month', 'Gender'],
          <?php
          
              $size  = count($data);

              for($i = 0; $i < ($size - 1); ++$i)
              {
                  $date = $data[$i]['HistoricInvoice']['invoice_date'];
                  $date = split(' ', $date);
                  $date = $date[0];
                  $date = split('-',$date);
                  echo "[ '".$data[$i]['HistoricProduct']['product_name']."', ".$data[$i]['HistoricProduct']['product_quantity'].", ".$date[1].", '".$data[$i]['HistoricInvoice']['user_gender']."'], ";
              }

                $i = ($size - 1);
                  $date = $data[$i]['HistoricInvoice']['invoice_date'];
                  $date = split(' ', $date);
                  $date = $date[0];
                  $date = split('-',$date);
                  echo "[ '".$data[$i]['HistoricProduct']['product_name']."', ".$data[$i]['HistoricProduct']['product_quantity'].", ".$date[1].", '".$data[$i]['HistoricInvoice']['user_gender']."']";
            
          ?>

      






      ]);

      var options = {
        title: 'Consumption',
        hAxis: {title: 'Amount Sold'},
        vAxis: {title: 'Month'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>

    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>