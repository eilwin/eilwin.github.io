<div class="container">
    <div class="row">
        <h2>Acceso de Clientes</h2>
    </div>
    <div class="row">
        <?php if(isset($error)): ?>
        <div class="alert alert-danger">
            <?=$error?>
        </div>
        <?php endif;?>
        <?= form_open('login/login')?>
        <div class="form-group">
            <?= form_label('Usuario','username')?>
            <?= form_input(array('name'=>'username','class'=>'form-control'))?>
        </div>
        <div class="form-group">
            <?= form_label('Contrasena','password')?>
            <?= form_input(array('name'=>'password','type'=>'password','class'=>'form-control'))?>
        </div>
        <?= form_button(array('class'=>'btn btn-default','data-dismiss'=>'modal'),'Cancelar')?>
        <?= form_button(array('type'=>'submit','class'=>'btn btn-primary'),'Acceder')?>
        <?= form_close()?>
    </div>
</div>