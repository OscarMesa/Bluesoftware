<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t�tulo</title>
</head>

<body background="">
<?php


//include("../sesion.php");

require_once("../../conexion.php");

$fecha_desde=$_POST['fecha_inicial'];
$cliente=$_POST['paciente'];
$concepto=$_POST['concepto'];
echo $valor_total=$_POST['valor_total'];
$ciudad=$_POST['ciudad'];
$factura_dian=$_POST['factura_dian'];

$elaborado=$_POST['elaborado'];
 $fecha_registro=date('Y-m-d');
 
 $mysqlinv = " select consecutivo_actual_caja from parametrizacion_factura";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $consecutivo_actual=$arreglo['consecutivo_actual_caja'];
}

$mysqlinv = "INSERT INTO recibo_caja( fecha,concepto, valor, id_cliente, ciudad, elabora,consecutivo) 
VALUES ('$fecha_desde', '$concepto', '$valor_total', '$cliente', '$ciudad',  '$elaborado','$consecutivo_actual')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());

$mysqlinv = " select max(id_recibo) id from  recibo_caja";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $id_factura=$arreglo['id'];
}






$consec_sig=$consecutivo_actual+1;

$mysqlinv = " update   parametrizacion_factura set consecutivo_actual_caja='$consec_sig'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());





$emergente="formato_recibo.php?id_factura=$id_factura";
?><script>alert("PROCESO EXITOSO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";













 
 
 



 

/*$mysqlinv = "INSERT INTO parametrizacion_factura( resolucion, fecha_Resolucion, nit, direccion, ciudad,  telefono, consecutivo_inicial, consecutivo_final ) 
VALUES (

'$resolucion', '$fecha_resolucion', '$nit', '$direccion', '$ciudad',  '$telefono', '$inicial', '$final')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
			print ("<br />");
 			print ("<br />");
 			print ("<br />");
			print ("<br />");
 			print ("<br />");
$emergente="../menu.php";
<script>alert("PROCESO EXITOSO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";



*/

?>
</body>