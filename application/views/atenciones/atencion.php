<div class="container">
    <div class="row">
        <h3><?=$accion?> Atencion</h3>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php if(isset($error) && strlen($error)>0): ?>
            <div class="alert alert-danger">
                <?=$error?>
            </div>
            <?php endif; ?>
            <?= form_open('atenciones/guardar')?>
            <?= form_input(array('type'=>'hidden','name'=>'action','value'=>$action))?>
            <?= form_input(array('type'=>'hidden','name'=>'id','value'=>(isset($atencion['id'])?$atencion['id']:'')))?>
            <div class="form-group">
                <?= form_label('Fecha Atencion','fecha_atencion')?>
                <?= form_input(array('name'=>'fecha_atencion','type'=>'text','class'=>'form-control','id'=>'fecha'))?>
                <script type="text/javascript">
                    $(function () {
                        $('#fecha').datetimepicker({
                            locale: 'es',
                            defaultDate: new Date('<?=(isset($atencion['fecha_atencion'])?$atencion['fecha_atencion']:date('Y-m-d H:i'))?>')
                        });
                    });
                </script>
            </div>
            <div class="form-group">
                <?= form_label('Nombre de Cliente','id_cliente')?>
                <?= form_dropdown('id_cliente',$clientes,(isset($atencion['id_cliente'])?$atencion['id_cliente']:''),array('class'=>'form-control')) ?>
            </div>
            <div class="form-group">
                <?= form_label('Nombre de Abogado','id_abogado')?>
                <?= form_dropdown('id_abogado',$abogados,(isset($atencion['id_abogado'])?$atencion['id_abogado']:''),array('class'=>'form-control'))?>
            </div>
            <div class="form-group">
                <?= form_label('Estado','estado')?>
                <?= form_dropdown('estado',array('agendada'=>'Agendada','confirmada'=>'Confirmada','anulada'=>'Anulada','perdida'=>'Perdida','realizada'=>'Realizada'),($action=='edit')?$atencion['estado']:'',array('class'=>'form-control'))?>
            </div>
            <div>
                <?= form_button(array('type'=>'reset','class'=>'btn btn-default'),'Restablecer')?>
                <?= form_button(array('type'=>'submit','class'=>'btn btn-primary'),'Guardar')?>
            </div>
            <?= form_close()?>
        </div>
    </div>
</div>