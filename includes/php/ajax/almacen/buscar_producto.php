<?php
  session_start();
if(empty($_SESSION['nombre'])){echo "<script>location.replace('../../index.php');</script>";}
include("../../cnf.php");
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

$mensaje = "";
$campo=utf8_decode("Descripción");

if (isset($consultaBusqueda)) {

 	 $sql1 = "SELECT * FROM almacen_inventario WHERE nombre LIKE '%$consultaBusqueda%' OR descripcion LIKE '%$consultaBusqueda%' OR nombre LIKE '%$consultaBusqueda%' OR almacenes LIKE '%$consultaBusqueda%' OR fecha_alta LIKE '%$consultaBusqueda%'  OR sku LIKE '%$consultaBusqueda%'";
      $consulta = mysqli_query( $con, $sql1 );
	

	$filas = mysqli_num_rows($consulta);

	if ($filas === 0) {
		$mensaje = "<p>No hay ningún producto con ese nombre y/o apellido</p>";
	} else {
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		while($resultados = mysqli_fetch_array($consulta)) {
			$id=$resultados['id'];
			$nombre=$resultados['nombre'];
			//$descripcion = $resultados[$campo];
			//$descripcion = utf8_decode($descripcion)
			//Output
			$mensaje .= '
			<p>
			<option value="'.$resultados['sku'].'-'.$nombre.'-'.$id.'"  id="valor_obtenido" onclick="getin();getin1();">'.$resultados['sku'].' - ' . $nombre . '</option>
			<input type="text" value="'.$id.'" id="id_producto_obtenido">
			</p>';

		};

	}; 

};


echo $mensaje;

?>