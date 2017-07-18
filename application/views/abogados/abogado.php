<div class="container">
    <div class="row">
        <h3><?=$accion?> Cliente</h3>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php if(isset($error) && strlen($error)>0): ?>
            <div class="alert alert-danger">
                <?=$error?>
            </div>
            <?php endif; ?>
            <?= form_open('abogados/guardar')?>
            <?= form_input(array('name'=>'action','id'=>'action','type'=>'hidden','value'=>$action))?>
            <div class="form-group">
                <?= form_label('RUT','rut')?>
                <div class="form-inline">
                    <?= form_input(array('name'=>'rut','type'=>'text','class'=>'form-control','maxlength'=>'8','value'=>(isset($abogado['rut'])?$abogado['rut']:'')))?>
                    -
                    <?= form_input(array('name'=>'dv','type'=>'text','class'=>'form-control','maxlength'=>'1','size'=>'1','value'=>(isset($abogado['dv'])?$abogado['dv']:'')))?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label('Nombre','nombre')?>
                <?= form_input(array('name'=>'nombre','type'=>'text','class'=>'form-control','value'=>(isset($abogado['nombre'])?$abogado['nombre']:'')))?>
            </div>
            <div class="form-group">
                <?= form_label('Fecha Contratacion','fecha_contratacion')?>
                <div class="input-group date" id="fecha">
                    <?= form_input(array('name'=>'fecha_contratacion','type'=>'text','class'=>'form-control'))?>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#fecha').datetimepicker({
                            locale: 'es',
                            defaultDate: new Date('<?=(isset($abogado['fecha_contratacion'])?$abogado['fecha_contratacion']:date('Y-m-d H:i'))?>')
                        });
                    });
                </script>
            </div>
            <div class="form-group">
                <?= form_label('Tipo Persona','tipo_persona')?>
                <?= form_dropdown('tipo_persona',array('Natural'=>'Natural','Juridica'=>'Juridica'),(isset($cliente['tipo_persona']))?$cliente['tipo_persona']:'',array('class'=>'form-control'))?>
            </div>
            <div class="form-group">
                <?= form_label('Direccion','direccion')?>
                <?= form_input(array('name'=>'direccion','type'=>'text','class'=>'form-control','value'=>(isset($cliente['direccion']))?$cliente['direccion']:''))?>
            </div>
            <div class="form-group">
                <?= form_label('Telefono','telefono')?>
                <div class="form-inline">
                    (+56) 9
                    <?= form_input(array('name'=>'telefono','type'=>'text','class'=>'form-control','minlength'=>'8','maxlength'=>'8','value'=>(isset($cliente['telefono'])?$cliente['telefono']:'')))?>
                </div>
            </div>
            <?php if($_SESSION['permisos']=='Administrador'): ?>
            <div class="form-group">
                <?= form_label('Usuario','username')?>
                <?= form_input(array('name'=>'username','type'=>'text','class'=>'form-control','value'=>(isset($cliente['username'])?$cliente['username']:'')))?>
            </div>
            <div class="form-group">
                <?= form_label('Contraseña','password')?>
                <?= form_input(array('name'=>'password','type'=>'password','class'=>'form-control'))?>
            </div>
            <div class="form-group">
                <?= form_label('Permisos','permiso')?>
                <?= form_dropdown('permiso',array('Cliente'=>'Cliente','Secretaria'=>'Secretaria','Administrador'=>'Administrador','Gerente'=>'Gerente'),(isset($cliente['permiso'])?$cliente['permiso']:''),array('class'=>'form-control'))?>
            </div>
            <?php endif; ?>
            <?php if($_SESSION['permisos']=='Cliente'): ?>
            <div class="form-group">
                <?= form_input(array('name'=>'permisos','type'=>'text','class'=>'form-control'))?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <?= form_button(array('type'=>'reset'),'Restablecer')?>
                <?= form_button(array('type'=>'submit'),'Guardar')?>
            </div>
            <?= form_close()?>
        </div>
    </div>
</div>