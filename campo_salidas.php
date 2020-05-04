<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$activo =$funciones->verificar_usuario($session);
echo$funciones->mostrar_categorias();

if ($activo == "1") {




$smarty->assign("Title", "Campo");
$smarty->assign("Name", "Salidas");
$smarty->display("campo_salidas.tpl");	
}else{

	echo"<center><div style='background-color:red;color:#ffffff;font-size:19px;width:100%;'><strong>Este usuario se encuentra desactivado, favor de contactar a su administrador de sistemas.</strong></div></center>";

}






?>


