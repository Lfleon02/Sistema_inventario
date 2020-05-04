<?php  
session_start();
include("../../cnf.php");
$sess = $_SESSION['nombre'];
$input = filter_input_array(INPUT_POST);

$cod = mysqli_real_escape_string($con, $input["cod"]);
$nombre = mysqli_real_escape_string($con, $input["nombre"]);
$puesto = mysqli_real_escape_string($con, $input["puesto"]);
$departamento = mysqli_real_escape_string($con, $input["departamento"]);
$curp = mysqli_real_escape_string($con, $input["curp"]);


if($input["action"] === 'edit')
{
 echo$query = "
 UPDATE personal 
 SET cod = '".$cod."',
 nombre = '".$nombre."',
 puesto = '".$puesto."', 
 departamento = '".$departamento."', 
 curp = '".$curp."'    
 WHERE id = '".$input["id"]."' ";
$que  = mysqli_query($con, "SELECT * FROM  almacen_inventario WHERE id = ".$input['id']." ");
while($res=mysqli_fetch_assoc($que)){$use[]=$res;}
    foreach($use  as $res){
    $id1 = $res['cod'];
    $nombre1 = $res['nombre'];
    $puesto1 = $res['puesto'];
    $departamento1 = $res['departamento'];
    $curp1 = $res['curp'];
    }
 $inserta_actualizacion = mysqli_query($con, "INSERT INTO log (Usuario,antes,despues,tabla_modificada,campo_modificado,motivo,fecha_modificacion,fecha,activo)VALUES('".$sess."', '".$antes."', '".$despues."',  'almacen_inventario', '".$campo."'  - '".$motivo."'  - '".$fecha_modificacion."'  - '".$fecha."' - '1')");
 $actualiza=mysqli_query($con, $query);


}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM personal  
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($con, $query);
}

echo json_encode($input);

?>