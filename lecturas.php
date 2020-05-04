<?php
include("includes/php/cnf.php");
$funciones= new funciones();

$fecha=date("Y-m-d H:i:s");
$fecha_rel=date("Y-m-d");
$fecha = substr($fecha, 0, 10);
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

if (isset($_POST['enviar_uno'])&& $_POST['tot']=="1") {
	

if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
    //echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 46384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {

        // Archivo temporal
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        // Tipo de archivo
        $tipo = $_FILES['imagen']['type'];

        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);

        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysqli_escape_string($con, $data);

        // Insertamos en la base de datos.
        $resultado = @mysqli_query( $con, "INSERT INTO campo_galeria_medidas (Imagen, tipo_imagen, fecha, fecha_rel, medidor) VALUES ('$data', '$tipo', '".$fecha."', '".$fecha_rel."', 'Pozo1')");

        if ($resultado)
        {
            echo "El archivo ha sido copiado exitosamente.";
        }
        else
        {
            //echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

}





if (isset($_POST['enviar_dos']) && $_POST['tot1']=="2") {
	

if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
    //echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 46384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {

        // Archivo temporal
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        // Tipo de archivo
        $tipo = $_FILES['imagen']['type'];

        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);

        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysqli_escape_string($con, $data);

        // Insertamos en la base de datos.
        $resultado = @mysqli_query( $con, "INSERT INTO campo_galeria_medidas (Imagen, tipo_imagen, fecha, fecha_rel, medidor) VALUES ('$data', '$tipo', '".$fecha."', '".$fecha_rel."', 'PozoNuevo')");

        if ($resultado)
        {
            echo "El archivo ha sido copiado exitosamente.";
        }
        else
        {
            //echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

}

$smarty->assign("fecha_completa", $fecha_completa);
$smarty->assign("Title", "Lecturas");
$smarty->assign("Name", "Medidor");
$smarty->display("lecturas.tpl");



?>


