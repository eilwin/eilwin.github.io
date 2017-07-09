<div class="container">
    <div class="modal fade" id="mdlLogin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title">Inicio de Sesion</h4>
                </div>
                <?= form_open('login/login')?>
                <div class="modal-body">
                    <div class="form-group">
                        <?= form_label('Usuario','username')?>
                        <?= form_input(array('name'=>'username','class'=>'form-control'))?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Contrasena','password')?>
                        <?= form_input(array('name'=>'password','type'=>'password','class'=>'form-control'))?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?= form_button(array('class'=>'btn btn-default','data-dismiss'=>'modal'),'Cancelar')?>
                    <?= form_button(array('type'=>'submit','class'=>'btn btn-primary'),'Acceder')?>
                </div>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>