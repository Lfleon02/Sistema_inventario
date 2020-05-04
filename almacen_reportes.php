<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$i=1;
$sql1 = mysqli_query($con, "SELECT  fecha_alta FROM `almacen_inventario` ORDER BY fecha_alta DESC LIMIT 2 ") OR die(mysqli_error($con));
while($row1 = mysqli_fetch_assoc($sql1))
{
$lol = explode(" ", $row1['fecha_alta']);
$fecha= $lol[0];
$data[] = $row1;
}

$smarty->assign("data", $data);
$smarty->assign("i", $i);
$smarty->assign("Title", "Inicio");
$smarty->assign("Name", "Reportes");
$smarty->display("almacen_reportes.tpl");

?>


