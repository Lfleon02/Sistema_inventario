<?php
require 'libs/Smarty.class.php';
require 'class.phpmailer.php';
$smarty = new Smarty;
ini_set('date.timezone', 'America/Mexico_City');
//error_reporting(0);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$con = mysqli_connect("127.0.0.1","root","","zanagess");
            if(!$con){

                echo"connection failed";
            }
            if (mysqli_connect_errno())
              {

                echo "Failed to connect to MySQL: " . mysqli_connect_error();

              }  
/*$con = mysqli_connect("localhost","zanagess_user","Zanagess1","zanagess_data");
            if(!$con){

                echo"connection failed";
            }
            if (mysqli_connect_errno())
              {

                echo "Failed to connect to MySQL: " . mysqli_connect_error();

              }   */
class login{
					// LOGIN INICIO DE SESION
	function acceso($usuario, $password){

		$alerta="";  
		  global $con,$ua;  

		  if($usuario=='' || $password=='' ) {

			 echo'<script>alert("Favor de no dejar ningun campo vacio");</script>';
			 }else{
			 //echo"SELECT * FROM usuarios WHERE (usuario='$usuario' OR correo = '$usuario' ) AND pass='$password' ";
			 $consultar_usuario=mysqli_query($con, "SELECT * FROM usuarios WHERE (usuario='$usuario' OR correo = '$usuario' ) AND pass='$password' ");
			 $num_usuario=mysqli_num_rows($consultar_usuario);

		  if ($num_usuario>0)
		  {
			 $query = mysqli_query($con, "SELECT * from usuarios 
        where (usuario='$usuario' OR correo = '$usuario' ) ")OR die(mysqli_error($con)); 

			   $row3 = mysqli_fetch_array($query);
			   $usuario_sess = $row3['nombre'];
			   $correo = $row3['correo'];
		     session_start();
		     $_SESSION['nombre'] = $usuario_sess;
		     $sesion_user= $_SESSION["nombre"];
		     $fecha=date('Y-m-d h:i:s');
		     $ip1=$_SERVER['REMOTE_ADDR'];
		     $insertar_usuario = mysqli_query($con, 
          "INSERT INTO inicios_sesion 
          ( Usuario, Fecha_ini, IP, SO, Sesion) 
          VALUES ( '$usuario','$fecha','$ip1','$ua','$sesion_user') ");   


	     if ($insertar_usuario){

	        $alerta="<div class='alert alert-success' role='alert'>
                    <span class='glyphicon glyphicon-ok'></span> Usuario 
                      <b>".$sesion_user."</b> </div>";
	      }else{

	       $alerta="<div class='alert alert-danger' role='alert'>
                    <span class='glyphicon glyphicon-sign'></span> 
                      El usuario ".$usuario." no fue posible guardar por 
                        un error interno. Por favor intenta de nuevo o comunicate 
                        con tu proveedor.
                  </div>";
	      }

	      $qry = mysqli_query($con, 
        "SELECT * from usuarios 
         WHERE correo='".$correo."' 
         AND nombre='".$sesion_user."' ")OR die(mysqli_error($con)); 

			  $row = mysqli_fetch_array($qry);
			  $area = $row['area'];

       echo "<script>location.replace('admin.php');</script>";
       
			 switch ($area) {
			 	case 'gerencia': echo "<script>location.replace('inicio.php'); </script>";break;
			 	case 'administracion': echo "<script>location.replace('".$area.".php'); </script>";break;
        case 'nominas': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'almacen': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'campo': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'cocina': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'construccion': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'embarque': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	case 'compras': echo "<script>location.replace('almacen_inventario_vista.php'); </script>";break;
			 	case 'mantenimiento': echo "<script>location.replace('".$area.".php'); </script>";break;
			 	default: echo "<script>location.replace('admin.php'); </script>";break;
			 }

		}else{

  			 echo$alerta="<script>alert('Usuario o password incorrectos, verifica los datos e intenta de nuevo :) ');</script>";
   }

  }
  
  return $alerta; 

	} // TERMINA LOGIN INICIO DE SESION

}



/**
 * 
 */
class funciones extends login
{
	
	function mostrar_areas()
	{

	global $con, $smarty;	
		
$sql1 = mysqli_query($con, 
  "SELECT * FROM areas  
   ORDER BY id + 0  ASC LIMIT 4") OR die(mysqli_error($con));

  while($row1 = mysqli_fetch_assoc($sql1))
  {
  $data1[] = $row1;
  }

$sql2 = mysqli_query($con, 
  "SELECT * FROM areas  
   ORDER BY id + 4  ASC LIMIT 4 OFFSET 4") OR die(mysqli_error($con));

  while($row2 = mysqli_fetch_assoc($sql2))
  {
  $data2[] = $row2;
  }

$sql3 = mysqli_query($con, 
  "SELECT * FROM areas  
   ORDER BY id + 4  ASC LIMIT 4 OFFSET 8") OR die(mysqli_error($con));

  while($row3 = mysqli_fetch_assoc($sql3))
  {
  $data3[] = $row3;
  }

  $smarty->assign("data1", $data1);
  $smarty->assign("data2", $data2);
  $smarty->assign("data3", $data3);

	}

	function mostrar_categorias()
	{

	global $con, $smarty;	
		
$sql1 = mysqli_query($con, 
  "SELECT * FROM almacen_categorias  
   ORDER BY nombre ASC") OR die(mysqli_error($con));

    while($row1 = mysqli_fetch_assoc($sql1))
    {
    $data[] = $row1;
    }
    $smarty->assign("data", $data);

	}	


function obtener_inventario(){

global $con, $smarty; 
    
$sql1 = mysqli_query($con, "SELECT * FROM almacen_inventario ") OR die(mysqli_error($con));
while($row1 = mysqli_fetch_assoc($sql1))
{
$datan[] = $row1;
}

$smarty->assign("datan", $datan);

}


function verificar_usuario($user){

global $con, $smarty; 
    
$sql1 = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre = '".$user."' ") OR die(mysqli_error($con));
$row = mysqli_fetch_assoc($sql1);
return $row['activo'];


}

function verifica_rol($user){
global $con, $smarty; 
$query = mysqli_query($con, "SELECT * from usuarios where nombre='".$user."' ")OR die(mysqli_error($con)); 
       $row3 = mysqli_fetch_array($query);
       return $row3['rol'];

}

function tipo_usuario($user){
global $con, $smarty; 
$query = mysqli_query($con, "SELECT * from usuarios where nombre='".$user."' ")OR die(mysqli_error($con)); 
       $row3 = mysqli_fetch_array($query);
       return $row3['area'];
  
}

function agregar_log($user,$antes,$despues,$tabla_mod,$campo_mod,$motivo){
global $con, $smarty; 

$fecha_mod=date("Y-m-d H:i:s");
$fecha=date("Y-m-d");
$query = mysqli_query($con, "INSERT INTO log (usuario,antes,despues,tabla_modificada,campo_modificado,motivo,fecha_modificacion,fecha,activo) 
  VALUES ('".$user."','".$antes."','".$despues."','".$tabla_mod."','".$campo_mod."','".$motivo."','".$fecha_mod."', '".$fecha."','1') ")OR die(mysqli_error($con));

  if ($query) {
     $msj="Registro agregado exitosamente.";
   }else{
    $msj="Ha ocurrido un error de ejecución, favor de revisar la consulta.";
   } 
   return$msj;
  
}


function alerta_reordenamiento($sku){
  global $con, $smarty; 

$art="";
$ort="";
$query = mysqli_query($con, "SELECT * FROM almacen_inventario WHERE  punto_reordenamiento >= existencias ");
while($row = mysqli_fetch_array($query)){

 $row['sku']."<br>";
 $nombre= $row['nombre'];
$cantidad = $row['existencias'];
$p_reordenamiento = $row['punto_reordenamiento']; 

if ($p_reordenamiento >= $cantidad) {
  $msj="<script>alert('ya se va a terminar');</script>";
$art.=$row['sku']." - ".strtolower(htmlentities($nombre))." Cantidad: ".$cantidad." Punto de reordenamiento: ".$p_reordenamiento." <br>";
$ort.=$row['sku']." ";

}else{
  $msj="<script>alert('aun hay');</script>";
}

}

if (!empty($art)) {
     try {
//echo$art;

  $mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas

  $mail->IsMail();                           // Usamos el metodo SMTP de la clase PHPMailer

  $mail->SMTPAuth   = false;                  // habilitado SMTP autentificación

  $mail->Port       = 25;                    // puerto del server SMTP

  $mail->Host       = "mail.zanagess.com"; // SMTP server

  $mail->From       = 'no-reply@zanagess.com'; //Remitente de Correo

  $mail->FromName   = 'Zana-Gess'; //Nombre del remitente

  $to = 'sistemas@zanagess.com'; //Para quien se le va enviar

  $mail->AddAddress($to);
  //$mail->addCC('copiado@hotmail.com');
  $mail->addBCC('sistemas@zanagess.com');

  $mail->Subject  = "Pedido de articulos"; //Asunto del correo

  $mensaje="Tiene articulos que han llegado al limite de ordenamiento o agotados, contactar a proveedor para su pedido. Sku´s: ".$ort ." <br><br><br><a href='https://zanagess.com/informado.php'><input type='button' value='Informado'></a>";

        $mail->msgHTML($mensaje);

  $mail->IsHTML(true); // Enviar como HTML

  $mail->Send();//Enviar

 $msj='<script>alert("Gracias, mensaje enviado. ");</script>';

} catch (phpmailerException $e) {

  echo $e->errorMessage();//Mensaje de error si se produciera.

}
}

//echo$msj;
//exit();

}

function enviar_correo($email,$asunto,$mensaje){

 try {

  $mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas

  $mail->IsMail();                           // Usamos el metodo SMTP de la clase PHPMailer

  $mail->SMTPAuth   = false;                  // habilitado SMTP autentificación

  $mail->Port       = 25;                    // puerto del server SMTP

  $mail->Host       = "mail.zanagess.com"; // SMTP server

  $mail->From       = 'no-reply@zanagess.com'; //Remitente de Correo

  $mail->FromName   = 'Zana-Gess'; //Nombre del remitente

  $to = $email.''; //Para quien se le va enviar

  $mail->AddAddress($to);

  $mail->Subject  = "".$asunto; //Asunto del correo

        $mail->msgHTML($mensaje);

  $mail->IsHTML(true); // Enviar como HTML

  $mail->Send();//Enviar

 echo'<script>alert("Gracias, mensaje enviado. ");</script>';

} catch (phpmailerException $e) {

  echo $e->errorMessage();//Mensaje de error si se produciera.

}

}

}



  function getPlatform($user_agent){
    if(strpos($user_agent, 'Windows NT 10.0') !== FALSE)
      return "Windows 10";
    elseif(strpos($user_agent, 'Windows NT 6.3') !== FALSE)
      return "Windows 8.1";
    elseif(strpos($user_agent, 'Windows NT 6.2') !== FALSE)
      return "Windows 8";
    elseif(strpos($user_agent, 'Windows NT 6.1') !== FALSE)
      return "Windows 7";
    elseif(strpos($user_agent, 'Windows NT 6.0') !== FALSE)
      return "Windows Vista";
    elseif(strpos($user_agent, 'Windows NT 5.1') !== FALSE)
      return "Windows XP";
    elseif(strpos($user_agent, 'Windows NT 5.2') !== FALSE)
      return 'Windows 2003';
    elseif(strpos($user_agent, 'Windows NT 5.0') !== FALSE)
      return 'Windows 2000';
    elseif(strpos($user_agent, 'Windows ME') !== FALSE)
      return 'Windows ME';
    elseif(strpos($user_agent, 'Win98') !== FALSE)
      return 'Windows 98';
    elseif(strpos($user_agent, 'Win95') !== FALSE)
      return 'Windows 95';
    elseif(strpos($user_agent, 'WinNT4.0') !== FALSE)
      return 'Windows NT 4.0';
    elseif(strpos($user_agent, 'Windows Phone') !== FALSE)
      return 'Windows Phone';
    elseif(strpos($user_agent, 'Windows') !== FALSE)
      return 'Windows';
    elseif(strpos($user_agent, 'iPhone') !== FALSE)
      return 'iPhone';
    elseif(strpos($user_agent, 'iPad') !== FALSE)
      return 'iPad';
    elseif(strpos($user_agent, 'Debian') !== FALSE)
      return 'Debian';
    elseif(strpos($user_agent, 'Ubuntu') !== FALSE)
      return 'Ubuntu';
    elseif(strpos($user_agent, 'Slackware') !== FALSE)
      return 'Slackware';
    elseif(strpos($user_agent, 'Linux Mint') !== FALSE)
      return 'Linux Mint';
    elseif(strpos($user_agent, 'Gentoo') !== FALSE)
      return 'Gentoo';
    elseif(strpos($user_agent, 'Elementary OS') !== FALSE)
      return 'ELementary OS';
    elseif(strpos($user_agent, 'Fedora') !== FALSE)
      return 'Fedora';
    elseif(strpos($user_agent, 'Kubuntu') !== FALSE)
      return 'Kubuntu';
    elseif(strpos($user_agent, 'Linux') !== FALSE)
      return 'Linux';
    elseif(strpos($user_agent, 'FreeBSD') !== FALSE)
      return 'FreeBSD';
    elseif(strpos($user_agent, 'OpenBSD') !== FALSE)
      return 'OpenBSD';
    elseif(strpos($user_agent, 'NetBSD') !== FALSE)
      return 'NetBSD';
    elseif(strpos($user_agent, 'SunOS') !== FALSE)
      return 'Solaris';
    elseif(strpos($user_agent, 'BlackBerry') !== FALSE)
      return 'BlackBerry';
    elseif(strpos($user_agent, 'Android') !== FALSE)
      return 'Android';
    elseif(strpos($user_agent, 'Mobile') !== FALSE)
      return 'Firefox OS';
    elseif(strpos($user_agent, 'Mac OS X+') || strpos($user_agent, 'CFNetwork+') !== FALSE)
      return 'Mac OS X';
    elseif(strpos($user_agent, 'Macintosh') !== FALSE)
      return 'Mac OS Classic';
    elseif(strpos($user_agent, 'OS/2') !== FALSE)
      return 'OS/2';
    elseif(strpos($user_agent, 'BeOS') !== FALSE)
      return 'BeOS';
    elseif(strpos($user_agent, 'Nintendo') !== FALSE)
      return 'Nintendo';
    else
      return 'Unknown Platform';
  }
  $ua = getPlatform($user_agent);

?>