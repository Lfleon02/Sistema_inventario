<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$funciones->mostrar_categorias();
$activo =$funciones->verificar_usuario($session);
$rol = $funciones->verifica_rol($session);
$area = $funciones->tipo_usuario($session);
$tipo = $funciones->tipo_usuario($session);

if ($activo == "1" && $rol=="Admin" && $area=="nominas") {

$smarty->assign("session", $session);
$smarty->assign("rol", $rol);
$smarty->assign("tipo", $tipo);
$smarty->assign("Title", "Gestion");
$smarty->assign("Name", "Personal");
$smarty->display("nominas_asistencias.tpl");

}else{

	echo"<center><div style='background-color:red;color:#ffffff;font-size:19px;width:100%;'><strong>Este usuario se encuentra desactivado o no tiene permitido ver este departamento, favor de contactar a su administrador de sistemas.</strong></div></center>";

}

?>


