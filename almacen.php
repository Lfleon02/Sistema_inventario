<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();

$sql1 = mysqli_query($con, "SELECT  count(id) total FROM `almacen_inventario` ") OR die(mysqli_error($con));
while($row1 = mysqli_fetch_assoc($sql1))
{
$datan[] = $row1;
}

$sql2 = mysqli_query($con, "SELECT * from almacen_inventario order by fecha_alta desc limit 1") OR die(mysqli_error($con));
while($row2 = mysqli_fetch_assoc($sql2))
{
$data2[] = $row2;
}

$sql3 = mysqli_query($con, "SELECT sum(precio) total FROM `almacen_inventario`") OR die(mysqli_error($con));
while($row3 = mysqli_fetch_assoc($sql3))
{
$data3[] = $row3;
}

$smarty->assign("data3", $data3);
$smarty->assign("data2", $data2);
$smarty->assign("datan", $datan);
$smarty->assign("Title", "Inicio");
$smarty->assign("Name", "Almacen");
$smarty->display("almacen.tpl");

?>


