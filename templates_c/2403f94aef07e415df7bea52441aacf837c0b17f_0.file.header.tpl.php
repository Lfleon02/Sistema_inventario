<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 09:46:55
  from 'C:\xampp\htdocs\migrate\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb02adfbedd12_05481123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2403f94aef07e415df7bea52441aacf837c0b17f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\migrate\\templates\\header.tpl',
      1 => 1588602561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb02adfbedd12_05481123 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
<meta charset="utf-8">
<?php if ($_smarty_tpl->tpl_vars['Name']->value == "Admin" || $_smarty_tpl->tpl_vars['Name']->value == "Personal") {?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="includes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="includes/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="includes/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="includes/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="includes/plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['Name']->value == "Inventario") {?>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <?php }?>

<?php if ($_smarty_tpl->tpl_vars['Name']->value == "Almacen" || $_smarty_tpl->tpl_vars['Name']->value == "Inicio" || $_smarty_tpl->tpl_vars['Name']->value == "Alta" || $_smarty_tpl->tpl_vars['Name']->value == "Medidor" || $_smarty_tpl->tpl_vars['Name']->value == "Personal" || $_smarty_tpl->tpl_vars['Name']->value == "Admin" || $_smarty_tpl->tpl_vars['Name']->value == "Salidas" || $_smarty_tpl->tpl_vars['Name']->value == "Inventario" || $_smarty_tpl->tpl_vars['Name']->value == "Reportes" || $_smarty_tpl->tpl_vars['Name']->value == "Vista") {
echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="includes/js/jquery.tabledit.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="includes/js/jquery.tabledit.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="includes/css/styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"><?php echo '</script'; ?>
>


</head>
<body oncontextmenu="return true" onkeydown="return true">
  <?php if ($_smarty_tpl->tpl_vars['Name']->value == "Almacen" || $_smarty_tpl->tpl_vars['Name']->value == "Alta" || $_smarty_tpl->tpl_vars['Name']->value == "Salidas" || $_smarty_tpl->tpl_vars['Name']->value == "Inventario" || $_smarty_tpl->tpl_vars['Name']->value == "Reportes") {?>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin.php">Panel principal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inventario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="almacen_alta.php">Alta de productos</a>
          <a class="dropdown-item" href="almacen_salidas.php">Gesti&oacute;n</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="almacen_inventario.php">Inventario</a>
        </div>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="almacen_reportes.php">Reportes</a>
      </li>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
</div>
<?php }?>
<style type="text/css">
  body{

    font-size: 16px;
  }

</style>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['Name']->value == "Admin" || $_smarty_tpl->tpl_vars['Name']->value == "Personal") {?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Inicio</a>
      </li>
     <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu --><?php if ($_smarty_tpl->tpl_vars['rol']->value == "Admin") {?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="includes/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="includes/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="includes/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li><?php }?>
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
    <center> <img src="includes/img/logo/ylogo.png" style="width:120px;"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="includes/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php if ($_smarty_tpl->tpl_vars['rol']->value == "User") {?>
        <div class="info">
          <a href="almacen_inventario_vista.php" class="d-block"><?php echo $_smarty_tpl->tpl_vars['session']->value;?>
</a>
        </div>
        <?php } else { ?>
        <div class="info">
          <a href="admin.php" class="d-block"><?php echo $_smarty_tpl->tpl_vars['session']->value;?>
</a>
        </div>
        <?php }?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!--  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>-->
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen") {?>
          <li class="nav-item">
            <a href="almacen_alta.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Alta de productos
               <!-- <span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="almacen_salidas.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Salida - Recibo
               <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="almacen_inventario.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
          <li class="nav-item">
            <a href="campo_alta.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Alta de productos
               <!-- <span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="campo_salidas.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Salida - Recibo
               <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "nominas") {?>
          <li class="nav-item">
            <a href="nominas_grande.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nomina Grande
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="nominas_chica.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nomina chica
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="nominas_asistencias.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Asistencias
              </p>
            </a>
          </li>
          <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<?php }?>


<?php }
}
