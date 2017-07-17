<div class="container">
    <div class="row">
        <h3>Busqueda de Clientes</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open('clientes/buscar')?>
            <div class="col-sm-3">
                <?= form_dropdown('opcion',array('rut'=>'RUT','nombre'=>'Nombre','tipo_persona'=>'Tipo Persona'),'',array('class'=>'form-control'))?>
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