<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
</head>

<body background="">
<?php


//include("../sesion.php");

require_once("../conexion.php");
$concepto=$_POST['concepto'];
$nombre=$_POST['nombre'];
$valor=$_POST['valor'];
$signo=$_POST['signo'];
$id_concepto=$_POST['id_concepto'];

$mysqlinv = "update conceptos set codigo='$concepto', nombre_concepto='$nombre', valor='$valor',signo='$signo'
where id='$id_concepto'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
			print ("<br />");
 			print ("<br />");
 			print ("<br />");
			print ("<br />");
 			print ("<br />");
$emergente="parametrizacion.php";
?><script>alert("PROCESO EXITOSO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";



?>


</body>