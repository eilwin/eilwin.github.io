<div class="container">
    <div class="row">
        <h3>Vista de Abogados</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($msg) && strlen($msg)>0): ?>
            <div class="alert alert-success">
                <?=$msg?>
            </div>
            <?php endif; ?>
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
                            <td><?=$abogado->rut?>-<?=$dig[$f++]?></td>
                            <td><?=$abogado->nombre?></td>
                            <td><?=$abogado->fecha_contratacion?></td>
                            <td><?=$abogado->especialidad?></td>
                            <td><?=$abogado->valor_hora?></td>
                            <td>
                                <a href="<?= base_url()?>abogados/abogado/edit/<?=$abogado->rut?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdlBorrar" onclick="document.getElementById('idSend').value='<?= base_url()?>/abogados/borrar/<?=$abogado->rut?>';"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h5>Total de Abogados registrados: <?=$f?></h5>
            <?php else:?>
            <div>
                <h5>No existen Abogados registrados</h5>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div><div class="modal fade" id="mdlBorrar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Confirmacion</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idSend">
                <p>Esta seguro que desea eliminar este Abogado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="window.location = document.getElementById('idSend').value;">Eliminar</button>
            </div>
        </div>
    </div>
</div>