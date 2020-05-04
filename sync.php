<?php
include("includes/php/cnf.php");

$sql = mysqli_query($con, "SELECT id, LEFT(nombre,3) tot, LEFT(categoria,3) total from almacen_inventario ORDER by id ASC");


while($row = mysqli_fetch_array($sql)) {
	$ran = rand(0,9999);
	$sku = $row['tot']."".strtoupper($row['total'])."".$ran."";
	$actualiza = mysqli_query($con, "UPDATE almacen_inventario SET sku = '".$sku."' WHERE id=".$row['id']." ");

	echo"listo: ".$sku." insertado correctamente <br>";
}

?>