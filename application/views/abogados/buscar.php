<div class="container">
    <div class="row">
        <h3>Busqueda de Abogados</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open('abogados/buscar')?>
            <div class="col-sm-3">
                <?= form_dropdown('opcion',array('rut'=>'RUT','nombre'=>'Nombre','especialidad'=>'Especialidad'),'',array('class'=>'form-control'))?>
            </div>
            <div class="col-sm-9">
                <div class="input-group">
                    <?= form_input(array('name'=>'palabra','class'=>'form-control','type'=>'text','placeholder'=>'Buscar...'))?>
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
                <?php if(count($abogados)>0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>RUT</th><th>Nombre</th><th>Fecha Contratacion</th><th>Especialidad</th><th>Valor Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $f=0;foreach ($abogados as $abogado): ?>
                        <tr>
                            <td><?=$abogado->rut?>-<?=$dv[$f++]?></td>
                            <td><?=$abogado->nombre?></td>
                            <td><?=$abogado->fecha_contratacion?></td>
                            <td><?=$abogado->especialidad?></td>
                            <td><?=$abogado->valor_hora?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h5>Total de Abogados encontrados: <?=$f?></h5>
            <?php else:?>
            <div>
                <h5>No se han encontrado Abogados</h5>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>