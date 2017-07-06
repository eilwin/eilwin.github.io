<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Calculo de ET alumnos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <?= form_open("formulario/resultado")?>
            <div class="form-group">
                <?= form_label('Nombre','nombre')?>
                <?= form_dropdown('alumno_id',$alumnos,'',array('class'=>'form-control'))?>
            </div>
            <div class="form-group">
                <?= form_label('Promedio Notas','notas')?>
                <?= form_input(array('name'=>'nota','type'=>'number','class'=>'form-control','min'=>'1','max'=>'7','value'=>'1'))?>
            </div>
            <div class="form-group">
                <?= form_button(array('type'=>'reset','class'=>'btn btn-warning'),"Restablecer")?>
                <?= form_button(array('name'=>'btn-calcular','type'=>'submit','class'=>'btn btn-primary'),"Calcular")?>
            </div>
            <?= form_close()?>
        </div>
    </div>
</div>