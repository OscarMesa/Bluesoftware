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
-->
</style>
<br>
<br>
<?php
require_once('../../conexion.php');
$id_factura=$_GET['id_factura'];



$select="SELECT * FROM recibo_caja where id_recibo='$id_factura'";
            
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





}

 $select1="select * from cliente where id_cliente='$cliente' ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv1 = mysql_query($select1, $conectBD) or die (mysql_error());
	   while($arreglo1=mysql_fetch_array($resultadoinv1 ))
       {
       $nombre=$arreglo1['razon_social'].$arreglo1['nombre'].' '.$arreglo1['apellido'];
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
	<a href="recibos_caja.php">
	<img alt="" height="109" src="../../images/logo_sivana.png" width="300" style="float: left" class="style7"></a></td>
    </tr>
   
     



    </table>
    </td>
   	
	<td>
	<table align="left" border="1" style="width: 200px; height: 100px">
	<tr>
	<td colspan="3" class="style4">  Recibo de caja menor
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
   <td style="width: 182px" colspan="3"> Pagado a:</td><td> <?   echo $nombre; ?></td>

   </tr>
   
   <tr>
   <td style="width: 182px" colspan="3">Nit</td><td> <?   echo $nit; ?></td>

   </tr>
   
   <tr>
   <td style="width: 182px" colspan="1" > Concepto:</td><td colspan="3"> <?   echo $concepto; ?></td>

   </tr>
      


    

   </table>
  
    
     </table>
     <br>
   
    <table align="center" border="1" style="width: 798px">
        
   
    <td colspan="3"> <strong>Son: </strong> <? echo numtoletras($valor);?></td>
    <td colspan="1">$ <? echo number_format($valor, 0, ".", ",");?> </td>

       
       
        <tr>
    <td colspan="4"> Elaborado: <? echo $elaborado;?></td> 
    
       
    
       </tr>
       
        <tr>
                <TD colspan="4">
                <? If($estado=='1') {
                ?>  <h1 class="style5"> DOCUMENTO ANULADO</h1><?
                }?>
                </TD>
                </TR>


       
       
       
      



   </table>
    <br>
   <br>
   <hr style="width: 812px" color="black">
   
   <br>
   <br>
    <br>
   <br>


   </body>
   </html>
   <?
   

   ?>
     