<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();

echo$funciones->mostrar_areas();


$smarty->assign("Title", "Inicio");
$smarty->assign("Name", "Areas Zana-gess");
$smarty->display("inicio.tpl");

?>


