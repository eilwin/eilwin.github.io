<div class="container">
    <div class="row">
        <h3><?=$accion?> Abogado</h3>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php if(isset($error) && strlen($error)>0): ?>
            <div class="alert alert-danger">
                <?=$error?>
            </div>
            <?php endif; ?>
            <?= form_open('abogados/guardar')?>
            <?= form_input(array('name'=>'action','id'=>'action','type'=>'hidden','value'=>$action))?>
            <div class="form-group">
                <?= form_label('RUT','rut')?>
                <div class="form-inline">
                    <?= form_input(array('name'=>'rut','type'=>'text','class'=>'form-control','maxlength'=>'8','value'=>(isset($abogado['rut'])?$abogado['rut']:'')))?>
                    -
                    <?= form_input(array('name'=>'dv','type'=>'text','class'=>'form-control','maxlength'=>'1','size'=>'1','value'=>(isset($abogado['dv'])?$abogado['dv']:'')))?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('Nombre','nombre')?>
                <?= form_input(array('name'=>'nombre','type'=>'text','class'=>'form-control','value'=>(isset($abogado['nombre'])?$abogado['nombre']:'')))?>
            </div>
            <div class="form-group">
                <?= form_label('Fecha Contratacion','fecha_contratacion')?>
                <div class="input-group date" id="fecha">
                    <?= form_input(array('name'=>'fecha_contratacion','type'=>'text','class'=>'form-control'))?>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#fecha').datetimepicker({
                            locale: 'es',
                            defaultDate: new Date('<?=(isset($abogado['fecha_contratacion'])?$abogado['fecha_contratacion']:date('Y-m-d H:i'))?>')
                        });
                    });
                </script>
            </div>
            <div class="form-group">
                <?= form_label('Especialidad','especialidad')?>
                <?= form_input(array('name'=>'especialidad','type'=>'text','class'=>'form-control','value'=>(isset($abogado['especialidad']))?$abogado['especialidad']:''))?>
            </div>
            <div class="form-group">
                <?= form_label('Valor Hora','valor_hora')?>
                <?= form_input(array('name'=>'valor_hora','type'=>'text','class'=>'form-control','value'=>(isset($abogado['valor_hora'])?$abogado['valor_hora']:'')))?>
            </div>
            <div class="form-group">
                <?= form_button(array('type'=>'reset','class'=>'btn btn-default'),'Restablecer')?>
                <?= form_button(array('type'=>'submit','class'=>'btn btn-primary'),'Guardar')?>
            </div>
            <?= form_close()?>
        </div>
    </div>
</div>