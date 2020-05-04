<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
echo$funciones->obtener_inventario();
$rol = $funciones->verifica_rol($session);

if ($rol == "User") {
	$i=1;

$libros = array();
$resultado = mysqli_query ($con, "SELECT * FROM almacen_inventario ORDER BY nombre ASC") or die (mysql_error ());
while( $rows = mysqli_fetch_assoc($resultado) ) {

$libros[] = $rows;

}

if(isset($_POST["export_data"])) {

if(!empty($libros)) {

$filename = "almacen_inventario.xls";

header("Content-Type: application/vnd.ms-excel");

header("Content-Disposition: attachment; filename=".$filename);

 

$mostrar_columnas = false;

 

foreach($libros as $libro) {

if(!$mostrar_columnas) {

echo implode("\t", array_keys($libro)) . "\n";

$mostrar_columnas = true;

}

echo implode("\t", array_values($libro)) . "\n";

}

 

}else{

echo 'No hay datos a exportar';

}

exit;

}


$smarty->assign("rol", $rol);
$smarty->assign("i", $i);
$smarty->assign("Title", "Almacen");
$smarty->assign("Name", "Vista");
$smarty->display("almacen_inventario_vista.tpl");
}else{

	echo"<center><div style='background-color:red;color:#ffffff;font-size:19px;width:100%;'><strong>Este usuario se encuentra desactivado o no tiene permitido ver este departamento, favor de contactar a su administrador de sistemas.</strong></div></center>";

}


?>


