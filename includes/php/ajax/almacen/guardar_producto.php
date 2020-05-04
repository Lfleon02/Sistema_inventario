<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("../../cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$categoria=substr(strtoupper($_POST['cat']),0,3);
$nombre=substr(strtoupper($_POST['nombre']),0,3);
$rand= rand(0, 9999);

$precio_unitario = $_POST['precio_uni'];

$sku=$nombre."".$categoria."".$rand;
$cantfecha=date("Y-m-d H:i:s");

$precio = $_POST['precio_uni'] * $_POST['exist'] ;

$sql2 = mysqli_query($con, "SELECT * FROM almacen_inventario  WHERE  nombre = '".$_POST['nombre']."' ") OR die(mysqli_error($con));
$row2 = mysqli_fetch_assoc($sql2);


$nombre = $row2['nombre'];

if ($_POST['nombre']=="" || $_POST['almacen']=="" || $_POST['cat']=="" || $_POST['exist']=="" || $_POST['reord']=="") {
	echo"<br><br><h3>No debe dejar ningun campo vacio.</h3>";
}else{

if (empty($nombre)) {

$result1 = mysqli_query($con,
"INSERT INTO almacen_inventario (sku, nombre, almacenes, descripcion, categoria, existencias, precio, precio_unitario, punto_reordenamiento,cantidad_apartir_fecha, fecha_alta, unidad_medida, inserto) VALUES ('".$sku."','".strtoupper($_POST['nombre'])."','".strtoupper($_POST['almacen'])."','".$_POST['nombre']."','".$_POST['cat']."','".$_POST['exist']."','".$precio."','".$precio_unitario."','".$_POST['reord']."','".$cantfecha."','".$cantfecha."','".strtoupper($_POST['unidad'])."','".$session."')");

if ($result1) {
	echo'<br><br><br><div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Registro guardado!</strong> Producto agregado con SKU: '.$sku.'
</div>';

$antes="No se tenia registro de esta accion, es nueva.";
$despues="Se agrega el articulo: ".$sku." con ".$_POST['exist']." ".strtoupper($_POST['unidad'])." por: ".$session;

$funciones->agregar_log($session,$antes,$despues,"almacen_inventario","todos por registro nuevo, buscar por sku: ".$sku.".", "Nuevo producto agregado al inventario");
}else{
	echo'<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Error!</strong> favor de verificar la información ingresada
  </div>';

}


}else{

echo'<br><br><h1><strong>Producto: '.$_POST['nombre'].'</strong></h1> ya existe<br>';
}

}//vacios
?>


