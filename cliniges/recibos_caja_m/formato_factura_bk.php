<?
require_once("../pdf/fpdf.php");
require_once("../conexion.php");
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
.style5 {
	text-align: center;
}
-->
</style>
<br>
<br>
<?php
require_once('../conexion.php');
$id_factura=$_GET['id_factura'];



$select="SELECT * FROM facturacion where id='$id_factura'";
            
mysql_select_db($basedatos, $conectBD);
$resulta= mysql_query($select, $conectBD) or die (mysql_error());
while($vector=mysql_fetch_array($resulta))
{
 $cliente=$vector['cliente'];
 $nit=$vector['nit'];
 $direccion=$vector['direccion'];
 $telefono=$vector['telefono'];
 $elaborado=$vector['elaborado'];
 $revisado=$vector['Revisado'];
  $contabilizado=$vector['contabilizado'];
  $dia=$vector['dia'];
  $mes=$vector['mes'];
  $ano=$vector['ano'];
  $factura=$vector['id_factura_dian'];
  
  $cedula=$vector['paciente'];


}



       $select1="select * from huesped where cedula='$cedula' ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv1 = mysql_query($select1, $conectBD) or die (mysql_error());
	   while($arreglo1=mysql_fetch_array($resultadoinv1 ))
       {
       $paciente=$arreglo1['nombre'].' '.$arreglo1['apellido'];
        $nit=$arreglo1['cedula'];

       }


$select1="SELECT * FROM parametrizacion_factura";
            
mysql_select_db($basedatos, $conectBD);
$resulta1= mysql_query($select1, $conectBD) or die (mysql_error());
while($vector1=mysql_fetch_array($resulta1))
{
 $fecha_resolucion=$vector1['fecha_Resolucion'];
 $nit_res=$vector1['nit'];
 $direccion_res=$vector1['direccion'];
 $ciudad_res=$vector1['ciudad'];

 $telefono_res=$vector1['telefono'];
 $consecutivo_ini_res=$vector1['consecutivo_inicial'];
 $consecutivo_fin_res=$vector1['consecutivo_final'];
 $resolucion=$vector1['resolucion'];



}

?>
   <Html>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

   <body>
   <hr style="width: 812px" color="black">

   <table width="800" align="center">
    <tr>
    <td style="width: 152px">
    <table style="width: 241px"> <tr>
    <td><img alt="" height="68" src="../images/home.jpg" width="161"></td>
    </tr>
     <tr>
    <td>Ricado Diaz Palacio</td>
    </tr>
     <tr>
    <td><? echo $nit_res;?></td>
    </tr>
 <tr>
    <td><? echo $direccion_res;?></td>
    </tr>
 <tr>
    <td><? echo $ciudad_res;?></td>
    </tr>
 <tr>
    <td><? echo $resolucion;?></td>
    </tr>
     <tr>
    <td><? echo $fecha_resolucion;?></td>
    </tr>
     <tr>
    <td> Numeracion del <? echo $consecutivo_ini_res;?> al <? echo $consecutivo_fin_res;?> </td>
    </tr>





    </table>
    </td>
   	
	<td>
	<table align="left" border="1" style="width: 200px; height: 100px">
	<tr>
	<td colspan="3" class="style4"> Factura de Venta
	:<? echo $factura;?><br>
	</td>

	</tr>
	<tr>
	<td colspan="3" class="style4"> Fecha
	</td>
	</tr>
	<tr>
	<td class="style4" style="height: 10px; width: 69px;"><? echo $dia. '-'.$mes.'-'.$ano;?></td>
		
			</tr>


	</table>
	</td>
    
    
    </tr>
   
   <tr>
   <td style="width: 152px">
   <table border="1" style="width: 378px" align="center">
   <tr>
   <td style="width: 73px"> Señor</td><td>  <?  if ( $cliente==''){ echo $paciente; } else { echo $cliente;}?></td>

   </tr>
   <tr>
   <td style="width: 73px"> Direccion</td><td><? echo $direccion;?> </td>

   </tr>

   </table>
   </td>
   
   
    <td>
   <table border="1" style="width: 436px">
   <tr>
   <td> Nit</td><td> <? echo $nit;?></td>

   </tr>
   <tr>
   <td> Telefono</td><td> <? echo $telefono;?></td>

   </tr>

   </table>
   </td>

   </tr>  
     </table>
   
    <table align="center" border="1" style="width: 818px">
    <tr>
    <td class="style4"> <strong>Codigo</strong></td>
    <td class="style4"><strong>Descripcion</strong></td>
    <td class="style4"><strong>valor Unitario</strong></td>
    <td style="width: 221px" class="style4"><strong>Total</strong></td>
    </tr>
    
    <?
    $total=0;
    $select1="SELECT * FROM detalle_factura a, conceptos b  
    where a.id_factura='$id_factura' and b.id=a.id_concepto";
            
	mysql_select_db($basedatos, $conectBD);
	$resultado= mysql_query($select1, $conectBD) or die (mysql_error());
	while($vector=mysql_fetch_array($resultado))
	{
 		$codigo=$vector['codigo'];
 		$descripcion=$vector['nombre_concepto'];
 		$signo=$vector['signo'];
        if($signo=='2')
        {
         $valor=$vector['valor'] * -1;
        }
        else
        {
         $valor=$vector['valor'] ;
        }
 		
 		$total=$total+$valor;
 		 ?>
    <tr>
    <td class="style4"> <? echo $codigo?></td>
    <td class="style4"><? echo $descripcion?></td>
    <td class="style4"><? echo $valor?></td>
    <td style="width: 221px" class="style4"><strong><? echo $valor?></strong></td>
    </tr>
    <?
 		
	}


   ?>
    <td colspan="3"> <strong>Son: </strong> <? echo numtoletras($total);?></td>
    <td colspan="1"><? echo $total;?> </td>

       
       
        <tr>
    <td colspan="2"> Elaborado <? echo $elaborado;?></td> 
     <td> Revisado: <? echo $revisado;?></td>

    <td style="width: 221px"> Contabilizado : <? echo $contabilizado;?></td>
    

       </tr>
       <tr><td  colspan="4" class="style5"><strong>NOTA: Servicios exceptuados del IVA Art. 476 del E.Tributario.</strong></td>
          
                </tr>




   </table>
   <hr style="width: 812px" color="black">
   </body>
   </html>
   <?
   

   ?>
     