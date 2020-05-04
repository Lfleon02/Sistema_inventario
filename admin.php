<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("includes/php/cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$rol = $funciones->verifica_rol($session);
$activo = $funciones->verificar_usuario($session);
$funciones->verifica_rol($session);
$tipo = $funciones->tipo_usuario($session);
//$consulta_sku = $funciones->alerta_reordenamiento('BOLINS1913');


if ($activo == "1") {

$sql1 = mysqli_query($con, "SELECT  count(id) total FROM `almacen_inventario` ") OR die(mysqli_error($con));
while($row1 = mysqli_fetch_assoc($sql1))
{
$datan[] = $row1;
}

$sql2 = mysqli_query($con, "SELECT * from almacen_inventario order by id desc limit 1") OR die(mysqli_error($con));
while($row2 = mysqli_fetch_assoc($sql2))
{
$data2[] = $row2;
}

$sql3 = mysqli_query($con, "SELECT count(producto) total FROM `almacen_salidas`") OR die(mysqli_error($con));
while($row3 = mysqli_fetch_assoc($sql3))
{
$data3[] = $row3;
}

$sql4 = mysqli_query($con, "SELECT count(producto) total FROM `almacen_entregas`") OR die(mysqli_error($con));
while($row4 = mysqli_fetch_assoc($sql4))
{
$data4[] = $row4;
}

/// CAMPO

$sqla = mysqli_query($con, "SELECT  count(id) total FROM `campo_inventario` ") OR die(mysqli_error($con));
while($rowa = mysqli_fetch_assoc($sqla))
{
$dataa[] = $rowa;
}

$sqlb = mysqli_query($con, "SELECT * from campo_inventario order by id desc limit 1") OR die(mysqli_error($con));
while($rowb = mysqli_fetch_assoc($sqlb))
{
$datab[] = $rowb;
}

$sqlc = mysqli_query($con, "SELECT count(producto) total FROM `campo_salidas`") OR die(mysqli_error($con));
while($rowc = mysqli_fetch_assoc($sqlc))
{
$datac[] = $rowc;
}

$sqld = mysqli_query($con, "SELECT sum(producto) total FROM `campo_salidas`") OR die(mysqli_error($con));
while($rowd = mysqli_fetch_assoc($sqld))
{
$datad[] = $rowd;
}



$smarty->assign("data4", $data4);
$smarty->assign("data3", $data3);
$smarty->assign("data2", $data2);
$smarty->assign("datan", $datan);
$smarty->assign("dataa", $dataa);
//$smarty->assign("datab", $datab);
$smarty->assign("datac", $datac);
$smarty->assign("datad", $datad);
$smarty->assign("tipo", $tipo);
$smarty->assign("rol", $rol);

$smarty->assign("session", $session);
$smarty->assign("Title", "Inicio");
$smarty->assign("Name", "Admin");
$smarty->display("admin.tpl");

}else{

	echo"<center><div style='background-color:red;color:#ffffff;font-size:19px;width:100%;'><strong>Este usuario se encuentra desactivado, favor de contactar a su administrador de sistemas.</strong></div></center>";

}

?>


