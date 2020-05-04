<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-04 09:46:55
  from 'C:\xampp\htdocs\migrate\templates\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb02adfce46e5_79614000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba8d8201c5fb12083bfb7303aa2df5e5bcef8c6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\migrate\\templates\\footer.tpl',
      1 => 1588603611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb02adfce46e5_79614000 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['Name']->value == "Admin") {?>

<footer class="main-footer">
    <strong>Luis Fer D Leon &copy; 2020.</strong>
     Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versi&oacute;n</b> 1.5.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php echo '<script'; ?>
 src="includes/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.11.4 -->
<?php echo '<script'; ?>
 src="includes/plugins/jquery-ui/jquery-ui.min.js"><?php echo '</script'; ?>
>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?php echo '<script'; ?>
>
  $.widget.bridge('uibutton', $.ui.button)
<?php echo '</script'; ?>
>
<!-- Bootstrap 4 -->
<?php echo '<script'; ?>
 src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<!-- ChartJS -->
<?php echo '<script'; ?>
 src="includes/plugins/chart.js/Chart.min.js"><?php echo '</script'; ?>
>
<!-- Sparkline -->
<?php echo '<script'; ?>
 src="includes/plugins/sparklines/sparkline.js"><?php echo '</script'; ?>
>
<!-- JQVMap -->
<?php echo '<script'; ?>
 src="includes/plugins/jqvmap/jquery.vmap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="includes/plugins/jqvmap/maps/jquery.vmap.usa.js"><?php echo '</script'; ?>
>
<!-- jQuery Knob Chart -->
<?php echo '<script'; ?>
 src="includes/plugins/jquery-knob/jquery.knob.min.js"><?php echo '</script'; ?>
>
<!-- daterangepicker -->
<?php echo '<script'; ?>
 src="includes/plugins/moment/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="includes/plugins/daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- Tempusdominus Bootstrap 4 -->
<?php echo '<script'; ?>
 src="includes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"><?php echo '</script'; ?>
>
<!-- Summernote -->
<?php echo '<script'; ?>
 src="includes/plugins/summernote/summernote-bs4.min.js"><?php echo '</script'; ?>
>
<!-- overlayScrollbars -->
<?php echo '<script'; ?>
 src="includes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="includes/dist/js/adminlte.js"><?php echo '</script'; ?>
>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<?php echo '<script'; ?>
 src="includes/dist/js/pages/dashboard.js"><?php echo '</script'; ?>
>
<!-- AdminLTE for demo purposes -->
<?php echo '<script'; ?>
 src="includes/dist/js/demo.js"><?php echo '</script'; ?>
>

<?php }?>
</body>
</html>
<?php }
}
