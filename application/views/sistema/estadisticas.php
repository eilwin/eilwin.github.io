<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']}); 
    google.charts.setOnLoadCallback(clienteTipo);
    google.charts.setOnLoadCallback(clienteAtencion);
    
    function clienteTipo() { 
        var jsonData = $.ajax({ 
            url: "<?=base_url()?>sistema/getClienteTipo", 
            dataType: "json", 
            async: false 
        }).responseText; 
        var data = new google.visualization.DataTable(jsonData); 
        var chart = new google.visualization.PieChart(document.getElementById('clienteTipo')); 
        chart.draw(data, {width:600,height:450,title: 'Cantidad de Clientes segun Tipo Persona'});
    }
    
    function clienteAtencion() {
        var jsonData = $.ajax({ 
            url: "<?=base_url()?>sistema/getClienteAtencion", 
            dataType: "json", 
            async: false 
        }).responseText; 
        var data = new google.visualization.DataTable(jsonData); 
        var chart = new google.visualization.ColumnChart(document.getElementById('clienteAtencion')); 
        chart.draw(data, {width:600,height:450,title: 'Cantidad de Atenciones segun Cliente'}); 
    }

</script>

<div class="container">
    <div class="row">
        <h3>Estadisticas del Sistema</h3>
    </div>
    <div class="row">
        <div id="clienteTipo" class="col-sm-6"></div>
        <div class="col-sm-6">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tipo Persona</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clienteTipo as $tipo): ?>
                    <tr>
                        <td><?=$tipo['nombre']?></td>
                        <td><?=$tipo['cantidad']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div id="clienteAtencion" class="col-sm-6"></div>
        <div class="col-sm-6">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clienteAtencion as $tipo): ?>
                    <tr>
                        <td><?=$tipo['nombre']?></td>
                        <td><?=$tipo['cantidad']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>
    
