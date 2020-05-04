<?php
include("../../cnf.php");

$fecha = date("Y-m-d");

$sql1 = mysqli_query($con, "SELECT * FROM almacen_salidas ") OR die(mysqli_error($con));
while($row1 = mysqli_fetch_assoc($sql1))
{

$lol = explode(" ", $row1['fecha_salida']);
$tot = explode("-", $lol[0]);

$sql = mysqli_query($con, "SELECT count(producto) total FROM almacen_salidas ") OR die(mysqli_error($con));
$ro=mysqli_fetch_array($sql);
$arra = "array('y' => ".$tot[1].", 'm' => ".$ro['total'].", 'd' => 32),";

if(isset($_GET['Area_chart'])){

	
	if($_GET['Area_chart'] == 1)	{
		echo json_encode(array( array('y' => 'febrero', 'm' => $ro['total'], 'd' => 0), 
		   					array('y' => 'Marzo', 'm' => 65, 'd' => 58), 
		   					array('y' => 'Abril', 'm' => 75, 'd' => 1)));			
	}
	if($_GET['Area_chart'] == 2) {
		echo	json_encode(array( array('y' => 2011, 'a' => 45, 'b' => 32), 
		   					array('y' => 2012, 'm' => 82, 'd' => 38), 
		   					array('y' => 2013, 'm' => 75, 'd' => 1), 
		   					array('y' => 2014, 'm' => 39, 'd' => 12) ));
	}
}

}



?>