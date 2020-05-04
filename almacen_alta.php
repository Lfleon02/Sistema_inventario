<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
echo$funciones->mostrar_categorias();



$smarty->assign("Title", "Almacen");
$smarty->assign("Name", "Alta");
$smarty->display("almacen_alta.tpl");

?>


