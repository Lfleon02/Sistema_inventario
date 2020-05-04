<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("../../cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();

$prod=$_POST['prod'];
$cantidad=$_POST['cantidad'];
$recibe1=$_POST['recibe1'];
$precio_pza=$_POST['precio_pza'];
$noreq=$_POST['noreq'];
$precioxcant=$_POST['precioxcant'];



if ( $prod=="" || $cantidad=='' || $recibe1==''|| $precio_pza==''|| $noreq=='' ) {
	echo"<br><br><h3>No debe dejar ningun campo vacio.</h3>";
}else{


$fecha_entre=date("Y-m-d H:i:s");;



$sql2 = mysqli_query($con, "SELECT * FROM almacen_entregas  WHERE producto = '".$prod."' limit 1") OR die(mysqli_error($con));
$row2 = mysqli_fetch_assoc($sql2);


$recibe = $row2['recibio'];
$fecha = $row2['fecha_salida'];
$cant = $row2['cantidad'];
$producto = $row2['producto'];


$lol =explode("-", $_POST['prod']);
$prod=$lol[1];
//echo"INSERT INTO almacen_entregas ( producto, cantidad,recibe, fecha_entrega) VALUES ('".$prod."','".$_POST['cantidad']."','".$session."','".$fecha_entre."')";
	$result1 = mysqli_query($con,"INSERT INTO almacen_entregas ( producto, cantidad,recibe, precio, precio_unitario, no_requ, fecha_entrega) VALUES ('".$prod."','".$_POST['cantidad']."','".$recibe1."', '".$precioxcant."', '".$_POST['precio_pza']."', '".$noreq."', '".$fecha_entre."')");


$sql = mysqli_query($con, "SELECT * FROM almacen_inventario  WHERE nombre like '%".$prod."%' limit 1") OR die(mysqli_error($con));
$row = mysqli_fetch_assoc($sql);

$id = $row['id'];
$nombre_producto = $row['nombre'];
$existen = $row['existencias'];
$costo_producto=$row['precio_unitario'];
$sku=$row['sku'];

$descuento = $existen + $cantidad;

$costo_final_producto = $costo_producto * $descuento;
//echo"<br><br>UPDATE almacen_inventario SET existencias = '".$descuento."', precio = '".$costo_final_producto."' WHERE id = ".$id." ";
$actualiza_=mysqli_query($con, "UPDATE almacen_inventario SET existencias = '".$descuento."', precio = '".$costo_final_producto."' WHERE id = ".$id." ");


if ($result1) {
	echo'<br><br><br><div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Registro guardado!</strong> Salida registrada con exito para : '.$session.'
</div>
';
$antes="No se tenia registro de esta accion, es nueva.";
$despues="Se agrega nueva entrega para ".$recibe1.", articulo: ".$prod.", cantidad: ".$_POST['cantidad'].", el dia: ".$fecha_entre;
$funciones->agregar_log($session,$antes,$despues,"almacen_entregas","todos por registro nuevo, buscar por sku: ".$sku." o REQ: ".$noreq.".", "Nueva entrega registrada por ".$session.". ");
}else{
	echo'<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Error!</strong> favor de verificar la información ingresada
  </div>';

}





}


?>
<script>

</script>