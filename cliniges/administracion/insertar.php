<?php
include("../sesion.php");

$cedula=$_POST['cedula'];
$pass=$_POST['pass'];
$perfil='';
require_once("../conexion.php");

$mysq="insert into usuario(cedulapaciente,pass,permiso)values('$cedula', '$pass', '$perfil')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysq, $conectBD) or die (mysql_error());
?><script>alert('Proceso Exitoso. Usuario creado  Correctamente')</script><?
$extra="../index.php";
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$extra>";
?>