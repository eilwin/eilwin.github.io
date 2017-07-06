<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Resultados de calculo ET</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>RUT</th><th>Nombre</th><th>Nota presentacion a ET</th><th>Nota necesaria en ET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <?=$rut?>
                        </td>
                        <td>
                            <?=$nombre?>
                        </td>
                        <td style="color:<?=($nota<4?"red":"blue")?>">
                            <?=$nota?>
                        </td>
                        <td style="color:<?=($et<4?"red":"blue")?>">
                            <?php
                            if ($et > 7) {
                                echo "Ni siquiera el ET te hara pasar";
                            }
                            elseif ($et < 1){
                                echo "No necesitas rendir el ET para aprobar";
                            }
                            else {
                                echo $et;
                            }
                            ?>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="<?= base_url()?>" class="btn btn-warning">Volver</a>
    </div>
</div>