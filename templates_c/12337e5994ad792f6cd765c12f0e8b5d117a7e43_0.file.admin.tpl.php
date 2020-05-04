<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 09:46:55
  from 'C:\xampp\htdocs\migrate\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb02adf9c2b63_82672207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12337e5994ad792f6cd765c12f0e8b5d117a7e43' => 
    array (
      0 => 'C:\\xampp\\htdocs\\migrate\\templates\\admin.tpl',
      1 => 1587055446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5eb02adf9c2b63_82672207 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen" || $_smarty_tpl->tpl_vars['tipo']->value == "campo" || $_smarty_tpl->tpl_vars['tipo']->value == "nominas") {?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen" || $_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
            <h1 class="m-0 text-dark">Tablero</h1>
            <?php }?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datan']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <p>Productos en sistema.</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="almacen_inventario.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataa']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <p>Productos en sistema.</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="campo_inventario.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php }?>
          <!-- ./col -->
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data2']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h5>Último registro</h5>
                <p> agregado el dia <?php echo $_smarty_tpl->tpl_vars['item']->value['fecha_alta'];?>
 <br> Por: <?php echo $_smarty_tpl->tpl_vars['item']->value['inserto'];?>
</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php if (empty($_smarty_tpl->tpl_vars['datab']->value)) {?>
                <?php } else { ?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datab']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h5>Último registro</h5>
                <p> agregado el dia <?php echo $_smarty_tpl->tpl_vars['item']->value['fecha_alta'];?>
 <br> Por: <?php echo $_smarty_tpl->tpl_vars['item']->value['inserto'];?>
</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          <?php }?>
          <!-- ./col -->
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data3']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>

                <p>Salidas registradas</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datac']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>

                <p>Salidas registradas</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--><br>
            </div>
          </div>
          <?php }?>
          <!-- ./col -->
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "almacen") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data4']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>

                <p>Productos recibidos</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             <br>
            </div>
          </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "campo") {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datad']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</h3>

                <p>Productos recibidos</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             <br>
            </div>
          </div>
          <?php }?>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
        
          
              </div>

<?php if ($_smarty_tpl->tpl_vars['tipo']->value == "nominas") {?>





<?php }?>


            </div>
        </div>
<?php } else { ?>

          <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">Este m&oacute;dulo no esta disponible para este tipo de usuario..</h1>
        </div>
      </div>
    </div>
  </div>

<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
