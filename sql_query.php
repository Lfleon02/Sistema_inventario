<?php
$enlace = mysqli_connect('localhost', 'root', '');
//date_default_timezone_set('America/Mexico_City');
//error_reporting(0);
$tiempo="";
if (date_default_timezone_get()) {
    $tiempo .= 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}

if (ini_get('date.timezone')) {
    $tiempo .=  'date.timezone: ' . ini_get('date.timezone') . '<br />';
}

$tiempo .=  date("Y-m-d H:i:s");

mysqli_select_db($enlace, 'zanagess') ;


echo <<<formulario
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Reportes del Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
$tiempo
<form action="sql_query.php" method="post">
Consulta <br>

<textarea rows="4" cols="50" name="SQL"></textarea><br>
<input type="submit" value="Realizar Consulta">
</form>
formulario;

	if (@$_POST["SQL"] != "")
	{

		$consulta  = stripslashes($_POST["SQL"]);
		//echo stripslashes($consulta);

		if (strtoupper (substr(trim($consulta),0,6))!="SELECT")
		{
			echo "<br><br><strong>S&oacute;lo se pueden hacer consultas, corrija su consulta</strong><br>$consulta";
			echo $result = @mysqli_query ($consulta );

		}
		else
		{
			$result = mysqli_query($enlace,$consulta);
			if (!$result)
			{
				echo "<br> La consulta:<br><br><strong>" . $consulta . "</strong><br><br> Es incorrecta, corregir";
			}
			else
			{
				$no_campos = mysqli_num_fields($result);
				echo "<br><br>La consulta realizada es:<br><br>" . $consulta . "<br><br>";
				echo "<table border=1><tr>";
				for ($i = 0; $i< $no_campos; $i++)
				{
					echo$i;
					echo "<th>" . mysqli_fetch_fields($result, $i) . "</th>";
				}
				echo "</tr>\n";

				while ($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					for ($i = 0; $i< $no_campos; $i++)
					{
						echo "<td>" .  $row[$i] . "</td>";
					}
					echo "</tr>\n";
		  		}
				echo "</table>";
			}
		}
	}

?>

</body>
</html>
