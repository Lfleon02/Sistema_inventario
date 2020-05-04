<?php
session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('index.php');</script>";}
include("../../cnf.php");
$session=$_SESSION['nombre'];
$funciones= new funciones();
$idnota=$_POST['id'];
$nota=$_POST['nota'];
$catValue=$_POST['catValue'];
$cantidad=$_POST['cantidad'];
$recibe=$_POST['recibe'];
$fecha_input=$_POST['fecha'];



if ($nota=="" || $catValue=="" || $cantidad=='' || $recibe=='' || $fecha_input=='' ) {
	
	echo"<br><br><h3>No debe dejar ningun campo vacio.</h3>";
}else{


$cantfecha=date("Y-m-d H:i:s");

echo"SELECT * FROM almacen_salidas  WHERE id = '".$idnota."' ";

$sql2 = mysqli_query($con, "SELECT * FROM almacen_salidas  WHERE id = '".$idnota."' ") OR die(mysqli_error($con));
$row2 = mysqli_fetch_assoc($sql2);

$numnota = $row2['numero_nota'];
$recibe = $row2['recibio'];
$fecha = $row2['fecha_salida'];
$cant = $row2['cantidad'];
$producto = $row2['producto'];



//if (empty($numnota)) {

$lol =explode("-", $_POST['catValue']);
$catValue=$lol[1];
$id_producto = $lol[2];
//echo"INSERT INTO almacen_salidas (numero_nota, producto, cantidad, fecha_salida, fecha, entrego, recibio) VALUES ('".$nota."','".$catValue."','".$_POST['cantidad']."','".$cantfecha."', '".$fecha_input."','".$session."','".$_POST['recibe']."')";

	$result1 = mysqli_query($con,"INSERT INTO almacen_salidas (numero_nota, producto, cantidad, fecha_salida, fecha, entrego, recibio) VALUES ('".$nota."','".$catValue."','".$_POST['cantidad']."','".$cantfecha."', '".$fecha_input."','".$session."','".$_POST['recibe']."')");

//echo"SELECT * FROM almacen_inventario WHERE nombre like '%".$catValue."%'";
$sql = mysqli_query($con, "SELECT * FROM almacen_inventario  WHERE nombre like '%".$catValue."%' ") OR die(mysqli_error($con));
$row = mysqli_fetch_assoc($sql);

$id = $row['id'];
$nombre_producto = $row['nombre'];
$sku=$row['sku'];
$existen = $row['existencias'];
$costo_producto=$row['precio_unitario'];

$descuento = $existen - $cantidad;

$costo_final_producto = $costo_producto * $descuento;
//echo"<br><br>UPDATE almacen_inventario SET existencias = '".$descuento."', precio = '".$costo_final_producto."' WHERE id = ".$id." ";
$actualiza_=mysqli_query($con, "UPDATE almacen_inventario SET existencias = '".$descuento."', precio = '".$costo_final_producto."' WHERE id = ".$id." ");


if ($result1) {
	echo'<br><br><br><div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Registro guardado!</strong> Salida registrada con exito para : '.$_POST['recibe'].'
</div>
';
$antes="No se tenia registro de esta accion, es nueva.";
$despues="Se agrega nueva salida para ".$_POST['recibe'].", articulo: ".$catValue.", cantidad: ".$_POST['cantidad'].", el dia: ".$cantfecha;
$funciones->agregar_log($session,$antes,$despues,"almacen_salidas","todos por registro nuevo, buscar por sku: ".$sku.".", "Nueva salida registrada por ".$session.". ");
}else{

	echo'<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Error!</strong> favor de verificar la información ingresada
  </div>';

}

/*}else{

$explode = explode(" ", $fecha);
$fecha_salida = $explode[0];
$hora_salida = $explode[1];
echo'<br><br><h1><strong>Nota: '.$nota.'</strong></h1> ya existe, entregada a '.$recibe.' el dia '.$fecha_salida.' a las '.$hora_salida.', se entreg&oacute; '.$cant.' de '.$producto.' <br> ';
}*/



}


?>
