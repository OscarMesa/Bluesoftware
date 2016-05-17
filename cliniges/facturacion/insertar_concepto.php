<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body background="">
<?php


//include("../sesion.php");

require_once("../conexion.php");
$concepto=$_POST['concepto'];
$nombre=$_POST['nombre'];
$valor=$_POST['valor'];
$signo=$_POST['signo'];

$mysqlinv = "INSERT INTO conceptos( codigo, nombre_concepto, valor,signo) 
VALUES ('$concepto', '$nombre', '$valor','$signo')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
			print ("<br />");
 			print ("<br />");
 			print ("<br />");
			print ("<br />");
 			print ("<br />");
$emergente="concepto.php";
?><script>alert("PROCESO EXITOSO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";



?>


</body>