<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$activo =$funciones->verificar_usuario($session);
$rol = $funciones->verifica_rol($session);
$area = $funciones->tipo_usuario($session);
echo$funciones->mostrar_categorias();


if ($activo == "1" && $area="almacen") {

$smarty->assign("rol", $area);
$smarty->assign("rol", $rol);
$smarty->assign("Title", "Almacen");
$smarty->assign("Name", "Salidas");
$smarty->display("almacen_salidas.tpl");

}else{

	echo"<center><div style='background-color:red;color:#ffffff;font-size:19px;width:100%;'><strong>Este usuario se encuentra desactivado o no tiene permitido ver este departamento, favor de contactar a su administrador de sistemas.</strong></div></center>";

}

?>


