<?php
include("../../cnf.php");
$funciones= new funciones();

$fecha_alta=date("Y-m-d H:i:s");
$fecha_medida=date("Y-m-d");

$fecha = substr($fecha_alta, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  $fecha_completa= $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

$mes= date("M");

if ($_POST['tot'] == "1") {

$Medida=$_POST['Medida'];

	if ($Medida=="") {echo"esta vacio";}else{}

$sql = mysqli_query($con, "INSERT INTO campo_medidas (fecha_alta, fecha_medida, no_medidor, medida,  marca_medidor, clave_servicio, parcela, estado, municipio, calle, concesion, dia, mes, anio, dia_no) VALUES ( '".$fecha_alta."', '".$fecha_medida."', 'H87', '".$Medida."', 'Turbo IR 8 ANALOGO BERMAND', '41112504', '15 Z-1 P-1/2', 'Tlaxcala', 'Altzayanca', 'Zona rural San Francisco y madero', '04TLX101893/18AMDL15', '".$nombredia."', '".$nombreMes."', '".$anio."', '".$numeroDia."'  )");

if ($sql) {
	echo"<br><br><div style='font-size:26px;color:green;font-weight:bold;'><strong>Registro guardado exitosamente al medidor H87 de la parcela 15 Z-1 P-1/2</strong></div>";
}

}else{

$Medida=$_POST['Medida1'];
if ($Medida=="") {echo"esta vacio";}else{}

}










?>


