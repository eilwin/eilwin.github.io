<div class="container">
    <div class="row">
        <h3>Busqueda de Clientes</h3>
    </div>
    <script type="text/javascript">
        function busqueda(){
            if(document.getElementById("opcion").value === "fecha_atencion"){
                document.getElementById("divPalabra").style.display = "none";
                document.getElementById("divFechas").style.display = "inline";
                
            }else{
                document.getElementById("divPalabra").style.display = "inline";
                document.getElementById("divFechas").style.display = "none";
            }
        }
        $(function(){
            $('#fechaDesde').datetimepicker({
                useCurrent: false,
                locale: 'es'
            });
            $('#fechaHasta').datetimepicker({
                useCurrent: false,
                locale: 'es'
            });
            $('#fechaDesde').on("dp.change", function (e){
                $('#fechaHasta').data("DateTimePicker").minDate(e.date);
            });
            $("#fechaHasta").on("dp.change", function (e){
                $('#fechaDesde').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open('atenciones/buscar')?>
            <div class="col-sm-3">
                <?= form_dropdown('opcion',array('cliente'=>'Cliente','abogado'=>'Abogado','fecha_atencion'=>'Fecha Atencion'),'',array('class'=>'form-control','id'=>'opcion','onchange'=>'busqueda()'))?>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <div id="divPalabra">
                        <?= form_input(array('name'=>'palabra','class'=>'form-control','type'=>'text','placeholder'=>'Buscar...'))?>
                    </div>
                    <div id="divFechas" style="display: none">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span class="input-group-addon">Desde</span>
                                <?= form_input(array('class'=>'form-control','id'=>'fechaDesde','name'=>'fechaDesde'))?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <span class="input-group-addon">Hasta</span>
                                <?= form_input(array('class'=>'form-control','id'=>'fechaHasta','name'=>'fechaHasta'))?>
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <?= form_button(array('type'=>'submit','class'=>'btn btn-default'),'Buscar')?>
                    </span>
                </div>
            </div>
            <?= form_close()?>
        </div>
    </div>
    <?php if(!empty($msg)): ?>
    <div class="row">
        <h4>Resultados de Busqueda</h4>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div>
            <?php if(count($atenciones)>0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha Atencion</th><th>Cliente</th><th>Abogado</th><th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $f=0;foreach ($atenciones as $atencion): $f++;?>
                        <tr>
                            <td><?=$atencion->fecha_atencion?></td>
                            <td><?=$atencion->nombre_cliente?></td>
                            <td><?=$atencion->nombre_abogado?></td>
                            <td><?=$atencion->estado?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h5>Total de Atenciones encontradas: <?=$f?></h5>
            <?php else:?>
            <div>
                <h5>No se han encontrado Atenciones</h5>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>