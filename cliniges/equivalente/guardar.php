<?php
error_reporting(0);
require_once("../../comun.php");



$cedula=$_POST['cedula'];
$no_documento=$_POST['no_documento'];
$observacion=$_POST['observacion'];
$fecha_documento=$_POST['fecha_documento'];
$elaborado=$_POST['elaborado'];
$recibido=$_POST['recibido'];
$responsable=$_POST['responsable'];
$retencion=$_POST['retencion'];



require_once("../../conexion.php");
//if(isset($_POST['grabar'])){
$copcetos=$_POST['fruit'];
$cantidad=$_POST['cantidad'];

$fecha_registro=date('Y-m-d');




$mysqlinv = "INSERT INTO equivalente( fecha,id_cedula, responsable, revisado, elaborado, no_documento, fecha_registro,retencion) 
VALUES ('$fecha_documento','$cedula','$responsable','$recibido','$elaborado','$no_documento','$fecha_registro','$retencion')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());



$mysqlinv = "select max(id_equivalente) as id_nota from equivalente";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $id_nota=$arreglo['id_nota'];
}






foreach($copcetos as $row=>$valor){

$concepto=$row;
$cantidadi=$cantidad[$row];

$mysqlinv = "insert into detalle_equivalente (id_equivalente,concepto, valor) 
values('$id_nota','$valor', '$cantidadi')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());




}

$mysqlinv = " select factura_equivalen from parametrizacion_factura";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $consecutivo_actual=$arreglo['factura_equivalen'];
}
$consec_sig=$consecutivo_actual+1;

$mysqlinv = " update   parametrizacion_factura set factura_equivalen='$consec_sig'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());


$emergente="../../impresiones/impresion_equivalente.php?id_equivalente=$id_nota";
?><script>alert("PROCESO EXITOSO");</script><? echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";

/*echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


//}



//}
