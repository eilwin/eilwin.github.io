<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap -->
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/js/moment.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/js/locale/es.js"></script>
        <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            ul.nav li a:hover:not(.active) {
                background-color: #c0c0c0;
            }
            body{ padding-top: 70px; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navopc" aria-expanded="false" aria-controls="navopc">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Buffet</a>
                </div>
                <div class="navbar-collapse collapse" id="navopc">
                    <?php if(isset($_SESSION['username'])): ?>
                    <ul class="nav navbar-nav">
                        <?php if(isset($_SESSION['permisos']) && $_SESSION['permisos']!='Cliente'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ver Clientes</a></li>
                                <li><a href="#">Buscar Cliente</a></li>
                                <li><a href="<?= base_url()?>clientes/cliente/add">Agregar Cliente</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Abogados<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url()?>abogados">Ver Abogados</a></li>
                                <li><a href="#">Buscar Abogado</a></li>
                                <?php if($_SESSION['permisos']=='Administrador'): ?>
                                <li><a href="#">Agregar Abogado</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atenciones<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url()?>atenciones">Ver Atenciones</a></li>
                                <li><a href="#">Buscar Atencion</a></li>
                                <li><a href="<?= base_url()?>atenciones/atencion/add">Agregar Atencion</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_SESSION['username'])):?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['nombre']?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="<?= base_url()?>login/logout">Salir</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li><a href="#" data-toggle="modal" data-target="#mdlLogin">Iniciar Sesion</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>