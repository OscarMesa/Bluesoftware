<?
require_once("../pdf/fpdf.php");
require_once("../../conexion.php");
require_once("numeros.php");

$pdf=new FPDF();
$pdf->AddPage();
//$pdf->Output();

  error_reporting(E_ALL ^ E_NOTICE);


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
.style4 {
	text-align: center;

{text-decoration:none;}


}
.style7 {
	border-width: 0px;
}
.style8 {
	font-family: Tahoma;
}
-->
</style>
<br>
<br>
<?php
require_once('../../conexion.php');
$id_factura=$_GET['id_factura'];



$select="SELECT * FROM recibo_caja_m where id_recibo='$id_factura'";
            
mysql_select_db($basedatos, $conectBD);
$resulta= mysql_query($select, $conectBD) or die (mysql_error());
while($vector=mysql_fetch_array($resulta))
{
 $cliente=$vector['id_cliente'];
  $elaborado=$vector['elabora'];
  $estado=$vector['estado'];
  $factura=$vector['consecutivo'];
  $fecha=$vector['fecha'];
  $concepto=$vector['concepto'];
  $valor=$vector['valor'];
  $ciudad=$vector['ciudad'];
  $recibido=$vector['recibido_enca'];
  
  $cheque=$vector['cheque'];
  $banco=$vector['banco'];
  $sucursal=$vector['sucursal'];
  $transferencia=$vector['transferencia'];
  $efectivo=$vector['efectivo'];
  $aprueba=$vector['aprueba'];
  $contabiliza=$vector['contabiliza'];
  $valor_efectivo=$vector['valor_efectivo'];
  
  $estado=$vector['estado'];
  
  if ($valor==0)
  {
     $valor= $valor_efectivo; 
      
  }









}

 $select1="select * from contactos where id='$cliente' ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv1 = mysql_query($select1, $conectBD) or die (mysql_error());
	   while($arreglo1=mysql_fetch_array($resultadoinv1 ))
       {
       $nombre=$arreglo1['nombre_contact'].' '.$arreglo1['apellido_contact'];
       $nit=$arreglo1['cedula'];

       }
       


?>
   <Html>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

   <body>
   <hr style="width: 812px" color="black">

   <table width="800" align="center">
    <tr>
    <td style="width: 152px">
    <table style="width: 300px"> <tr>
    <td style="height: 105px">
	<a href="recibos_caja_m.php">
	<img alt="" height="109" src="../../images/logo_sivana.png" width="300" style="float: left" class="style7"></a></td>
    </tr>
   
     



    </table>
    </td>
   	
	<td>
	<table align="left" border="1" style="width: 200px; height: 100px">
	<tr>
	<td colspan="3" class="style4">  Recibo de caja
	:<? echo $factura;?><br>
	</td>

	</tr>
	<tr>
	<td colspan="3" class="style4"> Fecha Recibo
	</td>
	</tr>
	<tr>
	<td class="style4" style="height: 10px; width: 69px;"><? echo $fecha?></td>
		
			</tr>


	</table>
	</td>
    
    
    </tr>
   
     <table border="1" style="width: 795px" align="center">
     <tr>
   <td style="width: 182px" colspan="3">Ciudad</td><td> <?   echo $ciudad; ?></td>

   </tr>
   
   <tr>
   <td style="width: 182px" colspan="3"> Entregado por</td><td> <?   echo $recibido; ?></td>

   </tr>


      
   <tr>
   <td style="width: 182px" colspan="3"> Responsable:</td><td> <?   echo $nombre; ?></td>

   </tr>

   <tr>
   <td style="width: 182px" colspan="1" > Concepto:</td><td colspan="3"> <?   echo $concepto; ?></td>

   </tr>
      


    

   </table>
   <br>
   
   <table border="1" align="center" style="width: 793px">
			<tr>
			<td style="width: 207px">No Cheque: <? echo $cheque;?></td>			
			<td style="width: 310px">Banco:  <? echo $banco;?></td>
						
						<td>Sucursal: <? echo $sucursal;?></td>
									
								
			</tr>
			<tr>
			<td style="width: 207px">Traslado Bancario: <? if($transferencia==1){ echo "SI";}?></td>
			<td style="width: 310px" >Efectivo:  <? if($efectivo==1){ echo "SI";}?></td>	
			<td style="width: 310px" >Valor Efectivo:  $ <? echo number_format($valor_efectivo, 0, ".", ",");?></td>	
			</tr>


			</table>

  
    
     </table>
     <br>
   
    <table align="center" border="1" style="width: 798px">
        
    <?
    $total=0;
    $select1="SELECT * FROM detalle_factura   a 
    where a.id_factura='$id_factura' ";
            
	mysql_select_db($basedatos, $conectBD);
	$resultado= mysql_query($select1, $conectBD) or die (mysql_error());
	while($vector=mysql_fetch_array($resultado))
	{
 		$descripcion='Servicios asistenciales prestados al señor(a) '.$paciente.',';
 		$signo=$vector['signo'];
     //   $valor=$vector['valor_concepto']; 		
 		$total=$total+$valor;
 		 ?>
        <?
 		
	}


   ?>
    <td colspan="2" > La suma de :<strong> </strong> 
	<? echo numtoletras($valor);?></td>
    <td colspan="1">$ <? echo number_format($valor, 0, ".", ",");?> </td>

       
       
        <tr>
    <td colspan="4"> Elaborado: <? echo $elaborado;?></td> 
    
       </tr>
       
        <tr>
    <td colspan="4"> Aprobado: <? echo $aprueba;?></td> 
    
       </tr>
       
        <tr>
    <td colspan="4"> Contabilizado: <? echo $contabiliza;?></td> 
    
       </tr>
       
        <tr>
    <td colspan="4"> Firma y sello
    <br><br>
    </td> 
    
       </tr>
       
       <?php if($estado=='1'){?>
    <tr><td align="center" style="width: 809px" colspan="3"  align="center" class="style6">
    	<strong>DOCUMENTO ANULADO</strong></td>
    </tr>
    <?php }?>




      



   </table>
   <hr style="width: 812px" color="black">
   </body>
   </html>
   <?
   

   ?>
     