<?php 
session_start();
session_destroy();
echo "<script>alert('Session finalizada con exito'); location.replace('index.php'); </script>";
 ?>