<?php 

error_reporting(0);
$reportes = ob_get_clean(); 
header("Content-type: application/vnd.ms-xls"); 
header("Content-Disposition: attachment; filename=Listado notas de cargo.xls"); 

/*header("Content-Type: application/download"); 
header("Pragma: no-cache");  
header("Expires: 0"); */

header('mso-number-format: @' );


echo $reportes;?>



<html>
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
-->
</style>
<br>
<br>
<?php
require_once('../../conexion.php');
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
	  <span >LISTADO DE EGRESOS  DEL <? echo $fecha_ini;?> AL <? echo $fecha_fin;?> </span> </div></td>
  </tr>
  <tr>
         <td align="CENTER"><strong>#Egreso
         </strong>
         </td> 
         <td  align="center"><strong>Fecha
         </strong>
         </td>
          <td align="center"><strong>Nit
         </strong>
         </td>

          <td align="center" style="width: 198px"><strong>Cliente
         </strong>
         </td>
          <td align="center" style="width: 328px"><strong>Concepto
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
       
       $select="select * from egreso where fecha between '$fecha_ini' and  '$fecha_fin'  and estado=0";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv = mysql_query($select, $conectBD) or die (mysql_error());
	   while($arreglo=mysql_fetch_array($resultadoinv ))
       {
        $cedula=$arreglo['id_cedula'];
        $id_nota=$arreglo['id_equivalente'];

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
      <td style="width: 76px" align="center"><? echo $arreglo['no_documento'];?></td>
          
      <td style="width: 87px" align="center">
	  <? echo $arreglo['fecha']?></td>
	   <td style="width: 87px" align="center">
	  <? echo $nit;?></td>

      
       <td style="width: 198px">
	   <?  echo $paciente ;?></td>
	   <td colspan="2"></td>
	      <td style="width: 122px" >
	   <? if( $arreglo['estado']=='1'){ echo 	"ANULADO";} else {echo "APROBADO";};?></td>

       
              

      </tr>	  
	  
	  
	  <?php
	  
	  
		   $selectnota="select * from detalle_egreso where id_equivalente='$id_nota' ";
	       mysql_select_db($basedatos, $conectBD);
		   $resultadonota = mysql_query($selectnota, $conectBD) or die (mysql_error());
		   while($arreglonota=mysql_fetch_array($resultadonota ))
	       {

	  ?> <tr>
	       <td colspan="4"></td>
	  		 <td style="width: 328px" align="left">
		      <? echo $arreglonota['concepto'] ;
		      ?></td>
	        
	  		 <td style="width: 87px" align="right">$
		      <? 
		     echo  $valor_nota=$arreglonota['valor'];
		      echo number_format($valor_nota) ;
		      $total=$total+$arreglonota['valor'] ;
		      
		       $total_nota=$total_nota+$arreglonota['valor'] ;

		      
		      ?></td>

	  
	 	 </tr>
	 	 <?php }?>
	  
 
	   
   <tr><td colspan="6" align="right"><strong>Total Egreso #</strong> <? echo $arreglo['no_documento'];?></td> <td align="center">$ <? echo number_format($total_nota, 0, ".", ",");?></td></tr>




	  
      <? $total=$total + $arreglo['valor'];
      
      $total_nota=0;
      }?>
      
      <tr><td colspan="6" align="right">Total</td> <td align="center">$ <? echo number_format($total);?></td></tr>


 				        
</table>

	      
