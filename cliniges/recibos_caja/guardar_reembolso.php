<?php

error_reporting(0);
require_once("../../comun.php");


require_once("../../conexion.php");

$fecha_reembolso=$_POST['fecha_reembolso'];
$id_factura=$_POST['id_factura'];
 $fecha_registro=date('Y-m-d');

$mysqlinv = "update recibo_caja set reembolso=1, fecha_reembolso= '$fecha_registro' where id_recibo='$id_factura'  ";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());

?><script>alert("PROCESO EXITOSO");</script>

<script>

window.close();
</script>















 
 
 



 