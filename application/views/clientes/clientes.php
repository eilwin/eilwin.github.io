<div class="container">
    <div class="row">
        <h3>Vista de Clientes</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
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