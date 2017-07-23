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
            $('#fechaDesde').datetimepicker();
            $('#fechaHasta').datetimepicker({
                useCurrent: false,
                locale: es
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
                            <?= form_input(array('class'=>'form-control','id'=>'fechaDesde','name'=>'fechaDesde'))?>
                        </div>
                        <div class="col-sm-6">
                            <?= form_input(array('class'=>'form-control','id'=>'fechaHasta','name'=>'fechaHasta'))?>
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
                <?php if(count($clientes)>0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>RUT</th><th>Nombre</th><th>Fecha Incorporacion</th><th>Tipo Persona</th><th>Direccion</th><th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $f=0;foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?=$cliente->rut?>-<?=$dv[$f++]?></td>
                            <td><?=$cliente->nombre?></td>
                            <td><?=$cliente->fecha_incorporacion?></td>
                            <td><?=$cliente->tipo_persona?></td>
                            <td><?=$cliente->direccion?></td>
                            <td>(+56) 9 <?=$cliente->telefono?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h5>Total de Clientes encontrados: <?=$f?></h5>
            <?php else:?>
            <div>
                <h5>No se han encontrado Clientes</h5>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>