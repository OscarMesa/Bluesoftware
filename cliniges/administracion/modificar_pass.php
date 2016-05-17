<?php
include("../sesion.php");

$cedula=$_POST['cedula'];
$pass=$_POST['pass'];

require_once("../conexion.php");

$mysq="update  usuario set pass='$pass' where cedulapaciente='$cedula'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysq, $conectBD) or die (mysql_error());
?><script>alert('Proceso Exitoso. Password modificado  Correctamente')</script><?
$extra="../index.php";
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$extra>";
?>