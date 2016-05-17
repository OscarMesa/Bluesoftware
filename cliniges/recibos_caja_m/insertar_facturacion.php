<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
</head>

<body background="">
<?php


//include("../sesion.php");

require_once("../../conexion.php");

$fecha_desde=$_POST['fecha_inicial'];
$fecha_final=$_POST['fecha_final'];
$cliente=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$elaborado=$_POST['elaborado'];
$contabilizado=$_POST['contabilizado'];
$revisado=$_POST['revisado'];
$factura_dian=$_POST['factura_dian'];
$nit=$_POST['nit'];
$fecha_total=$dia.$mes.$ano;
$paciente=$_POST['paciente'];
echo $fecha_registro=date('Y-m-d');

$mysqlinv = "INSERT INTO facturacion( fecha_desde,fecha_hasta, nit, cliente, direccion, telefono, elaborado, revisado, contabilizado,id_factura_dian, fecha_total,paciente,
fecha_registro) 
VALUES ('$fecha_desde', '$fecha_final', '$nit', '$cliente', '$direccion', '$telefono', '$elaborado', '$revisado', '$contabilizado','$factura_dian','$fecha_total','$paciente',
'$fecha_registro')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());

$mysqlinv = " select max(id) id from  facturacion";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $id_factura=$arreglo['id'];
}


foreach($_POST['opcion'] as $color){
    echo $color."<br>";
    
    $mysqlinv ="INSERT INTO detalle_factura( id_factura, valor_concepto) VALUES ('$id_factura', '$color')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
}



$mysqlinv = " select consecutivo_actual from parametrizacion_factura";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $consecutivo_actual=$arreglo['consecutivo_actual'];
}
$consec_sig=$consecutivo_actual+1;

$mysqlinv = " update   parametrizacion_factura set consecutivo_actual='$consec_sig'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());





$emergente="formato_factura.php?id_factura=$id_factura";
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