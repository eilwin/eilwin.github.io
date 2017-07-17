<div class="container">
    <div class="row">
        <h3>Vista de Abogados</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
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
</div>