<?php  
session_start();
include("../../cnf.php");
$sess = $_SESSION['nombre'];
$input = filter_input_array(INPUT_POST);

$sku = mysqli_real_escape_string($con, $input["sku"]);
$nombre = mysqli_real_escape_string($con, $input["nombre"]);
$almacenes = mysqli_real_escape_string($con, $input["almacenes"]);
$categoria = mysqli_real_escape_string($con, $input["categoria"]);
$existencias = mysqli_real_escape_string($con, $input["existencias"]);
$precio = mysqli_real_escape_string($con, $input["precio"]);
$precio_unitario = mysqli_real_escape_string($con, $input["precio_unitario"]);
$punto_reordenamiento = mysqli_real_escape_string($con, $input["punto_reordenamiento"]);
$fecha_alta = mysqli_real_escape_string($con, $input["fecha_alta"]);
$unidad_medida = mysqli_real_escape_string($con, $input["unidad_medida"]);

if($input["action"] === 'edit')
{
 echo$query = "
 UPDATE almacen_inventario 
 SET sku = '".$sku."',
 nombre = '".$nombre."',
 almacenes = '".$almacenes."', 
 categoria = '".$categoria."', 
 existencias = '".$existencias."',
 precio = '".$precio."', 
 precio_unitario = '".$precio_unitario."', 
 punto_reordenamiento = '".$punto_reordenamiento."',
 fecha_alta = '".$fecha_alta."',
 unidad_medida = '".$unidad_medida."'    
 WHERE id = '".$input["id"]."' ";
$que  = mysqli_query($con, "SELECT * FROM  almacen_inventario WHERE id = ".$input['id']." ");
while($res=mysqli_fetch_assoc($que)){$use[]=$res;}
    foreach($use  as $res){
    $id1 = $res['id'];
    $nombre1 = $res['nombre'];
    $almacenes1 = $res['almacenes'];
    $categoria1 = $res['categoria'];
    $precio1 = $res['precio'];
    $precio_unitario1 = $res['precio_unitario'];
    $punto_reordenamiento1 = $res['punto_reordenamiento'];
    $fecha_alta1 = $res['fecha_alta'];
    $unidad_medida1 = $res['unidad_medida'];
    }
 $inserta_actualizacion = mysqli_query($con, "INSERT INTO log (Usuario,antes,despues,tabla_modificada,campo_modificado,motivo,fecha_modificacion,fecha,activo)VALUES('".$sess."', '".$antes."', '".$despues."',  'almacen_inventario', '".$campo."'  - '".$motivo."'  - '".$fecha_modificacion."'  - '".$fecha."' - '1')");
 $actualiza=mysqli_query($con, $query);


}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM almacen_inventario  
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($con, $query);
}

echo json_encode($input);

?>