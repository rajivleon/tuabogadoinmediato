<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Tu Abogado Inmediato</title>
  <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/plugins/iCheck/flat/blue.css">
   <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('css')?>/estilos.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-white sidebar-collapse layout-top-nav">
    <div class="wrapper">
        <header class="main-header">            
            <nav class="navbar navbar-fixed-top bg-light-blue-gradient">
              <div class="container-fluid">
                <div class="navbar-header">
                    <div class="row">
<!--                        <div class="col-md-1" style="margin-top: 5px;">
                            <img src="<?php echo base_url()?>images/balanza.png" style="width: 32px;height: 32px"/>
                        </div>-->
                        <div class="col-md-9 col-md-offset-1">
                            <a href="#" class="navbar-brand section-font">www.tuabogadoinmediato.com</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>                   
                            </button>
                        </div>
                    </div>
                   
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse center" id="navbar-collapse">
                  <ul class="nav navbar-nav">
                    <?php if(!empty($barraSup)){
                        echo $barraSup;
                    }?>                      
                  </ul>                   
                    <ul class="nav navbar-nav navbar-right separa_left">
                        <li class="dropdown user-menu"><a href="" class="link-blanco link-silencioso dropdown-toggle" data-toggle="dropdown">Ingresa</a>
                             <ul class="dropdown-menu"> 
                                 <form method="post" role="form">
                                 <!-- Menu Body -->
                                    <li class="user-body login-box-body">                                       
                                            <div class="form-group has-feedback">
                                                <input type="email" class="form-control" placeholder="Usuario">
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="password" class="form-control" placeholder="Contraseña">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            </div>
                                        <hr/>
                                  </li>
                                  <!-- Menu Footer-->
                                  <li class="user-footer">
                                    <div class="pull-left">
                                      <a href="#" class="btn btn-default">Cerrar</a>
                                    </div>
                                    <div class="pull-right">
                                      <a href="#" class="btn btn-default">Ingresar</a>
                                    </div>
                                  </li>
                                </ul>
                        </li>
                        </form>
                    </ul>
                </div>                 
            </nav>
        </header>
  
