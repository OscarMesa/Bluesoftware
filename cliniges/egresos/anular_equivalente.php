<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
</head>

<body background="">
<?php


error_reporting(0);
require_once("../../comun.php");

require_once("../../conexion.php");
$id_factura=$_GET['id_equivalente'];

$mysqlinv = "update egreso set estado='1' where id_equivalente='$id_factura'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
			print ("<br />");
 			print ("<br />");
 			print ("<br />");
			print ("<br />");
 			print ("<br />");
$emergente="consulta_equivalente.php";
?><script>alert("EGRESO ANULADO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";



?>
<script>
window.close();
</script>



</body>