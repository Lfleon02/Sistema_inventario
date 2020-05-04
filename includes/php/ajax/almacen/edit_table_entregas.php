<?php  
session_start();
include("../../cnf.php");
$sess = $_SESSION['nombre'];
$input = filter_input_array(INPUT_POST);

$numero_nota = mysqli_real_escape_string($con, $input["numero_nota"]);
$producto = mysqli_real_escape_string($con, $input["producto"]);
$cantidad = mysqli_real_escape_string($con, $input["cantidad"]);
$fecha_salida = mysqli_real_escape_string($con, $input["fecha_salida"]);
$fecha = mysqli_real_escape_string($con, $input["fecha"]);
$entrego = mysqli_real_escape_string($con, $input["entrego"]);

if($input["action"] === 'edit')
{
 /*echo$query = "
 UPDATE almacen_salidas
 SET numero_nota = '".$numero_nota."',
 producto = '".$producto."', 
 cantidad = '".$cantidad."', 
 fecha = '".$fecha."',
 entrego = '".$entrego."'
  WHERE id = '".$input["id"]."'";*/
  $query = "
 UPDATE almacen_entregas
 SET fecha = '".$fecha."'
  WHERE id = '".$input["id"]."'";
$que  = mysqli_query($con, "SELECT * FROM  almacen_entregas WHERE id = ".$input['id']." ");
while($res=mysqli_fetch_assoc($que)){$use[]=$res;}
    foreach($use  as $res){
    $id1 = $res['id'];
    $numero_nota1 = $res['numero_nota'];
    $producto1 = $res['producto'];
    $cantidad1 = $res['cantidad'];
    $fecha = $res['fecha'];
    $entrego1 = $res['entrego'];
    }
   /* $quer="INSERT INTO log (Usuario,Fecha_actualizacion,Tabla_afectada,Accion,Antes,Despues) 
    VALUES 
    ('".$sess."', '".$fecha."', 'descuento_cliente_prod', 'Actualizacion', '".$Cliente." - ".$Grupo." - ".$Producto." - ".$Descuento." - ".$KIT." - ".$Fecha_ini." - ".$Fecha_fin." - ".$Activo."',  '".$cliente." - ".$grupo." - ".$producto." - ".$descuento." - ".$kit." - ".$f_ini." - ".$f_fin." - ".$activo."' )";
 $inserta_actualizacion = mysqli_query($con, $quer);*/
 $actualiza=mysqli_query($con, $query);


}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM almacen_salidas  
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($con, $query);
}

echo json_encode($input);

?>