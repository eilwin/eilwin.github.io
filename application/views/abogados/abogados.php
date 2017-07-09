<div class="container">
    <div class="row">
        <h2>Abogados</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if(count($abogados)>0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>RUT</th><th>Nombre</th><th>Fecha de Contratacion</th><th>Especialidad</th><th>Valor Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($abogados as $abogado): ?>
                        <tr>
                            <td><?=$rut?></td>
                            <td><?=$nombre?></td>
                            <td><?=$fecha_contratacion?></td>
                            <td><?=$especialidad?></td>
                            <td><?=$valor?></td>
                            <?php if($_SESSION['permisos']=='Administrador'): ?>
                            <td><a></a></td>
                            <td><a></a></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <h5>No existen abogados registrados</h5>
            <?php endif; ?>
        </div>
    </div>
</div>