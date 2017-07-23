<div class="container">
    <div class="row">
        <h3>Atenciones</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($msg) && strlen($msg)>0): ?>
            <div class="alert alert-success">
                <?=$msg?>
            </div>
            <?php endif; ?>
            <?php if(count($atenciones)>0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha Atencion</th>
                            <?php if($_SESSION['permisos'] != 'Cliente'): ?>
                            <th>Nombre Cliente</th>
                            <?php endif; ?>
                            <th>Nombre Abogado</th>
                            <th>Estado Atencion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atenciones as $atencion): ?>
                        <tr>
                            <td><?=$atencion->fecha_atencion?></td>
                            <?php if($_SESSION['permisos'] != 'Cliente'): ?>
                            <td><?=$atencion->nombre_cliente?></td>
                            <?php endif; ?>
                            <td><?=$atencion->nombre_abogado?></td>
                            <td><?=$atencion->estado?></td>
                            <?php if($_SESSION['permisos'] != 'Cliente'): ?>
                            <td>
                                <a href="<?= base_url()?>atenciones/atencion/edit/<?=$atencion->id?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdlBorrar" onclick="document.getElementById('idSend').value='<?= base_url()?>atenciones/borrar/<?=$atencion->id?>';"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else:?>
        <div class="col-sm-12">
            <h5>No existen atenciones registradas</h5>
        </div>
        <?php endif;?>
    </div>
</div>
<div class="modal fade" id="mdlBorrar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Confirmacion</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idSend">
                <p>Esta seguro que desea eliminar esta Atencion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="window.location = document.getElementById('idSend').value;">Eliminar</button>
            </div>
        </div>
    </div>
</div>