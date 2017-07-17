<div class="container">
    <div class="row">
        <h3>Atenciones</h3>
    </div>
    <div class="row">
        <?php if(count($atenciones)>0): ?>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha Atencion</th>
                            <?php if($_SESSION['permiso'] != 'Cliente'): ?>
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
                            <?php if($_SESSION['permiso'] != 'Cliente'): ?>
                            <td><?=$atencion->nombre_cliente?></td>
                            <?php endif; ?>
                            <td><?=$atencion->nombre_abogado?></td>
                            <td><?=$atencion->estado?></td>
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