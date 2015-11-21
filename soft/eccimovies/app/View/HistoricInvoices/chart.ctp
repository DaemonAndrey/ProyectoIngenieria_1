

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
            google.visualization.events.addListener(chart, 'ready', function () {
              var content = '<img src="' + chart.getImageURI() + '">';
              $('#graphImages').append(content);
            });
          chart.draw(data, options);
        }
        </script>

        <div id="series_chart_div" style="width: 100%; height: 400px;"></div>




    </div>

</div>

<script>
   function pdf() {
var doc = new jsPDF('p', 'pt', 'a4', false) /* Creates a new Document*/
doc.setFontSize(15); /* Define font size for the document */
var yAxis = 30;
var imageTags = $('#graph img');
for (var i = 0; i < imageTags.length; i++) {
        if (i % 2 == 0 && i != 0) { /* I want only two images in a page */
            doc.addPage();  /* Adds a new page*/
            yAxis = 30; /* Re-initializes the value of yAxis for newly added page*/
        }
        var someText = 'Chart '+(i+1);
        doc.text(60, yAxis, someText); /* Add some text in the PDF */
        yAxis = yAxis + 20; /* Update yAxis */
        doc.addImage(imageTags[i], 'png', 40, yAxis, 530, 350, undefined, 'none');
        yAxis = yAxis+ 360; /* Update yAxis */
    }
}
 
doc.save('Chart_Report' + '.pdf') /* Prompts user to save file on his/her machine */
</script>

<div class="row text-center">
    <div class="col-md-12">
      
       <?php
          if(count($data) > 0)
          {
              echo "<button onclick = 'pdf()' style = 'margin-top:20px'>DOWNLOAD PDF</button>";
          }
       ?>
    </div>

</div>