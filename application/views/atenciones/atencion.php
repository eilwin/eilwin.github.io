<div class="container">
    <div class="row">
        <h3><?=$accion?> Atencion</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open('atenciones/guardar')?>
            <div class="form-group">
                <?= form_label('Fecha Atencion','fecha_atencion')?>
                <?php if($action=='view'): ?>
                <?= form_input(array('name'=>'fecha_atencion','type'=>'text','class'=>'form-control')) ?>
                <?php else: ?>
                <??>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <?= form_label('Nombre de Cliente','cliente')?>
                <?= form_input(array('name'=>'cliente','type'=>'text','class'=>'form-control')) ?>
            </div>
            <div class="form-group">
                <?= form_label('Nombre de Abogado','abogado')?>
                <?= form_input(array('name'=>'abogado','type'=>'text','class'=>'form-control'))?>
            </div>
            <div class="form-group">
                <?= form_label('Estado','estado')?>
                <?= form_dropdown('nombre',array('agendada'=>'agendada','confirmada'=>'confirmada','anulada'=>'anulada','perdida'=>'perdida','realizada'=>'realizada'),($action=='edit')?$estado:'')?>
            </div>
            <?= form_close()?>
        </div>
    </div>
</div>