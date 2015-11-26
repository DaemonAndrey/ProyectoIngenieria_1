

<div class="row text-center">
    <div class="col-md-12">
      
       <?php
          if(count($data) < 1)
          {
              echo "<h4>Lo sentimos, no hubo coincidencias en su búsqueda.\nVuelva a intentarlo</h4>";
          }
          else
          {
              echo " <h1>Graphic of Consumption</h1>";
              if(isset($begin))
              {
                echo " <h3>Date Range: ".$begin." -- ".$end."</h3>";
              }

          }
       ?>
    </div>

</div>


<div class="row text-center">
  <div class="col-md-12" id="graph">
      
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawSeriesChart);

        function drawSeriesChart() {

          var data = google.visualization.arrayToDataTable([

           
              <?php		

                if(isset($data[0][0]))
                {
                  echo "['Name', 'Amount Sold', 'Month','Gender'],";
                  $size  = count($data);
                    for($i = 0; $i < ($size - 1); ++$i)
                    {
                         $date = $data[$i]['HistoricInvoice']['invoice_date'];
                        $date = split(' ', $date);
                        $date = $date[0];
                        $date = split('-',$date);
                        echo "[ '".$data[$i]['HistoricProduct']['product_name']."', ".$data[$i][0]['product_quantity'].", ".$date[1].", '".$data[$i]['HistoricInvoice']['user_gender']."'], ";
                    }


                      $i = ($size - 1);
                        $date = $data[$i]['HistoricInvoice']['invoice_date'];
                        $date = split(' ', $date);
                        $date = $date[0];
                        $date = split('-',$date);
                        echo "[ '".$data[$i]['HistoricProduct']['product_name']."', ".$data[$i][0]['product_quantity'].", ".$date[1].", '".$data[$i]['HistoricInvoice']['user_gender']."' ]"; 




                }	
                else
                {
                  echo "['Name', 'Amount Sold', 'Month', 'Gender'],";
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
                }	  

                
              ?>

          ]);

          var options = {
            title: 'Consumption',
            hAxis: {title: 'Amount Sold'},
            vAxis: {title: 'Month'},
            bubble: {textStyle: {fontSize: 11}}
          };

          var div = document.getElementById('series_chart_div');
          var chart = new google.visualization.BubbleChart(div);
		  /**
            google.visualization.events.addListener(chart, 'ready', function () {
              div.innerHTML = '<img  class="image" src="' + chart.getImageURI() + '">';
              console.log(div.innerHTML);

            });
			**/
          chart.draw(data, options);

        //document.getElementById('png').outerHTML = '<a href="' + chart.getImageURI() + '">Printable version</a>';


        }
        </script>

        <div id="series_chart_div" style="width: 100%; height: 400px;"></div>




    </div>

</div>





<div class="row text-center">
    <div class="col-md-12">

      <div id='png'></div>

    </div>
</div>

<script>
  
  var url = $(".image").prop("src");
  console.log(url);
</script>
