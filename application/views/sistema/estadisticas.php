    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"> 
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart); 
       
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?=base_url()?>sistema/getData", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width:600,height:450,title: 'Cantidad de Clientes segun Tipo Persona'}); 
    } 
 
    </script>

    <!--Div that will hold the pie chart--> 
    <!--<h1 style="text-align:center">Quantity of fruits we have in our store - Displayed by Google Chart and Codeigniter with MySQL</h1>-->
    
    <div class="row">
        <div id="chart_div" class="col-sm-6"></div>
        <div class="col-sm-6">
            Aca van los datos de la tabla
        </div>
    </div>
    
