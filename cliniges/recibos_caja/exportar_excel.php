<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?


$mes_select=date("m", time());
$d=date("d", time());
$a=date("Y", time());

  switch($mes_select)
{
case 01:
$mes="ENERO";
break;
case 02:
$mes="FEBRERO";
break;
case 03:
$mes="MARZO";
break;
case 04:
$mes="ABRIL";
break;
case 05:
$mes="MAYO";
break;
case 06:
$mes="JUNIO";
break;
case 07:
$mes="JULIO";
break;
case 08:
$mes="AGOSTO";
break;
case 09:
$mes="SEPTIEMBRE";
break;
case 10:
$mes="OCTUBRE";
break;
case 11:
$mes="NOVIEMBRE";
break;
case 12:
$mes="DICIEMBRE";
break;
}
ob_start();?>
<style type="text/css">
<!--
.Estilo15 {
	color: #CC3300;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo17 {color: #CC3300}
.style3 {
	text-align: left;
}
.style11 {
	color: #008000;
	background-color: #339966;
}
.style12 {
	background-color: #339966;
}
.style14 {
	font-weight: bold;
	color: #FFFFFF;
	background-color: #339966;
}
.style15 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.style16 {
	color: #008000;
	font-weight: bold;
	background-color: #339966;
}
.style17 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style18 {
	background-color: #339966;
	color: #FFFFFF;
}
.style19 {
	color: #FFFFFF;
	text-align: center;
	background-color: #339966;
}
.style20 {
	color: #008000;
	text-align: center;
	background-color: #FFFFFF;
}
.style21 {
	background-color: #FFFFFF;
}
.style22 {
	background-color: #339966;
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<br>
<br>
<?php
require_once('../../conexion.php');
error_reporting(0);
 $fecha_ini=$_POST['fecha_ini'];
 $fecha_fin=$_POST['fecha_fin'];


$select="SELECT * FROM huesped where cedula = '$cedula'";
            
mysql_select_db($basedatos,$conectBD);

$resulta=mysql_query($select,$conectBD); 
while($vector=mysql_fetch_array($resulta))
{
 $paciente=$vector['nombre'].$vector['apellido'];
 $num_cedula=$vector['cedula'];
 $edad=$vector['edad'];
 $fecha_nac=$vector['fechanacimiento'];
 $id_cedula=$vector['id_cedula'];
}


 $ano=date("Y",time());
              $com=$fecha_nac[0].$fecha_nac[1].$fecha_nac[2].$fecha_nac[3];
              $eda=$ano-$com;
              $mes=$fecha_nac[4].$fecha_nac[5]; 
              
              $m=date("m",time()); 
              if($m<$mes)
              {
                $eda=$eda-1;
              }
              $d=date("d",time());   
              $dia=$fecha_nac[6].$fecha_nac[7];



$select="SELECT * FROM dieta where cedula = '$cedula'";
            
mysql_select_db($basedatos,$conectBD);

$resulta=mysql_query($select,$conectBD); 
while($vector=mysql_fetch_array($resulta))
{
 $dieta=$vector['dieta'];

 }


?>
<table align="center" border="0" cellspacing="0" cellpadding="0" style="width: 993px">
 
  
 <tr>
 <td style="width: 86%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 &nbsp;</td>
 <td>
   
  
  
  <table border="1" align="center" cellpadding="0" cellspacing="0" style="width:993px">
  
  
   <tr>
 
  <td style="width: 86%" colspan="7" ><div align="center">
	  <span >LISTADO DE RECIBOS DE CAJA MENOR DEL <? echo $fecha_ini;?> AL <? echo $fecha_fin;?> </span> </div></td>
  </tr>
  <tr>
         <td align="CENTER"><strong>#Recibo
         </strong>
         </td> 
         <td  align="center"><strong>Fecha
         </strong>
         </td>
          <td align="center"><strong>Nit
         </strong>
         </td>

          <td align="center"><strong>Cliente
         </strong>
         </td>
          <td align="center"><strong>Concepto
         </strong>
         </td>

         
         <td align="center"><strong>Valor
         </strong>
         </td>
          
          <td align="center"><strong>Estado
         </strong>
         </td>
         
         
         
          <tr>
                 <?
       require_once("../../conexion.php");
       $fecha_ini=$_POST['fecha_ini'];
       $fecha_fin=$_POST['fecha_fin'];
       
       $select="select * from recibo_caja where fecha between '$fecha_ini' and  '$fecha_fin' and estado=0 ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv = mysql_query($select, $conectBD) or die (mysql_error());
	   while($arreglo=mysql_fetch_array($resultadoinv ))
       {
       $cedula=$arreglo['id_cliente'];

       $select1="select * from cliente where id_cliente='$cedula' ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv1 = mysql_query($select1, $conectBD) or die (mysql_error());
	   while($arreglo1=mysql_fetch_array($resultadoinv1 ))
       {
       $paciente=$arreglo1['razon_social']. $arreglo1['nombre'].' '.$arreglo1['apellido'];
       $nit=$arreglo1['cedula'];
       }

       
             ?>
      <tr>
      <td style="width: 76px" align="center"><? echo $arreglo['consecutivo'];?></td>
          
      <td style="width: 87px" align="center">
	  <? echo $arreglo['fecha']?></td>
	   <td style="width: 87px" align="center">
	  <? echo $nit;?></td>

      
       <td style="width: 122px">
	   <? if( $arreglo['cliente']==''){ echo $paciente; } else { echo $arreglo['cliente'];} ;?></td>
	      <td style="width: 87px" align="center">
	  <? echo $arreglo['concepto']?></td>

	    
	    <td style="width: 87px" align="center">
      <? echo $valor= $arreglo['valor'];
     
      ?></td>

	   <td style="width: 122px">
	   <? if( $arreglo['estado']=='1'){ echo 	"ANULADO";} else {echo "APROBADO";};?></td>

       
              

      </tr>
      <? $total=$total + $arreglo['valor'];}?>
      
      <tr><td colspan="5">Total</td> <td align="center"> <? echo number_format($total, 0, ".", ",");?></td></tr>


 				        
</table>

	      
<? 


$reportes = ob_get_clean(); 
header("Content-type: application/vnd.ms-xls"); 
header("Content-Disposition: attachment; filename=Listado recibos de caja.xls"); 

/*header("Content-Type: application/download"); 
header("Pragma: no-cache");  
header("Expires: 0"); */

header('mso-number-format: @' );


echo $reportes;?>

