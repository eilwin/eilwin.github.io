<div class="container">
    <div class="row">
        <h3>Vista de Clientes</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($msg) && strlen($msg)>0): ?>
            <div class="alert alert-success">
                <?=$msg?>
            </div>
            <?php endif; ?>
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
                            <td><?=$cliente->rut?>-<?=$dig[$f++]?></td>
                            <td><?=$cliente->nombre?></td>
                            <td><?=$cliente->fecha_incorporacion?></td>
                            <td><?=$cliente->tipo_persona?></td>
                            <td><?=$cliente->direccion?></td>
                            <td>(+56) 9 <?=$cliente->telefono?></td>
                            <td>
                                <a href="<?= base_url()?>clientes/cliente/edit/<?=$cliente->rut?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdlBorrar" onclick="document.getElementById('idSend').value='<?= base_url()?>/clientes/borrar/<?=$cliente->rut?>';"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h5>Total de Clientes registrados: <?=$f?></h5>
            <?php else:?>
            <div>
                <h5>No existen Clientes registrados</h5>
            </div>
            <?php endif; ?>
        </div>
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
                <p>Esta seguro que desea eliminar este Cliente?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="window.location = document.getElementById('idSend').value;">Eliminar</button>
            </div>
        </div>
    </div>
</div>