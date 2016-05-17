<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body background="">
<?php


//include("../sesion.php");

require_once("../../conexion.php");
$resolucion=$_POST['resolucion'];
$fecha_resolucion=$_POST['fecha'];
$nit=$_POST['nit'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$inicial=$_POST['inicial'];
$final=$_POST['final'];


echo$tamano = $_FILES["archivo"]['size'];
   echo $tipo = $_FILES["archivo"]['type'];
    echo $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
    $nombrearchivo= $prefijo."_".$archivo;

   


    if ($archivo != "") {

        
        
        $target_path = "logo/";
          $target_path = $target_path . basename( $_FILES['archivo']['name']); if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {// echo "El archivo ". basename( $_FILES['archivo']['name']). " ha sido subido";
} else{
echo "Ha ocurrido un error, trate de nuevo!";
}
    }
    



 

$mysqlinv = "INSERT INTO parametrizacion_factura( resolucion, fecha_Resolucion, nit, direccion, ciudad,  telefono,
 consecutivo_inicial, consecutivo_final, consecutivo_actual,imagen ) 
VALUES (

'$resolucion', '$fecha_resolucion', '$nit', '$direccion', '$ciudad',  '$telefono', '$inicial', '$final','$inicial','$nombrearchivo')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
			print ("<br />");
 			print ("<br />");
 			print ("<br />");
			print ("<br />");
 			print ("<br />");
$emergente="parametrizacion.php";
?><script>alert("PROCESO EXITOSO");</script><?
//echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";



?>


</body>