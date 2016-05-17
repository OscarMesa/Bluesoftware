<?php


include("../../comun.php");

require_once("../../conexion.php");

$fecha_desde=$_POST['fecha_inicial'];
$cliente=$_POST['paciente'];
$concepto=$_POST['concepto'];
$valor_total=$_POST['valor_total'];
$ciudad=$_POST['ciudad'];
$factura_dian=$_POST['factura_dian'];

$elaborado=$_POST['elaborado'];
$fecha_registro=date('Y-m-d');
$recibido_enca=$_POST['recibido_por'];



$cheque=$_POST['cheque'];
$banco=$_POST['banco'];
$sucursal=$_POST['sucursal'];
$transaccion=@$_POST['transaccion'];
$efectivo=@$_POST['efectivo'];
$aprobado=$_POST['aprobado'];
$contabiliza=$_POST['contabiliza'];
$valor_efectivo=$_POST['valor_efectivo'];
$facturas=$_POST['facturas'];
$abonos=$_POST['abonos'];
$valor_factura=$_POST['valor_factura'];
$valor_mayor = $_POST['valor_mayor'];

$notas=@$_POST['notas'];
$notas_abono=@$_POST['abonosnotas'];
$valor_total=0;
$cantidad=0;


$mysqlinv = " select max(id_recibo) id from  recibo_caja_m";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $id_factura=$arreglo['id'];
}
$id_factura=$id_factura+1;
#abonos facturas
if(!empty($facturas ) )
{
//echo "<pre>";print_r($facturas);print_r($abonos);
//foreach ($facturas as $clave => $valor){
 

   	foreach($abonos as $valor => $valor1)
	{
	 $valor_factura=0;
	 	
	   
	  if (!empty($valor1) && $valor1<>0  )
	  {
	   // $valor_total= $valor_total+$valor1;
	    
	    $mysqlinv ="INSERT INTO detalle_caja( id_factura, id_caja_mayor,valor) 
		VALUES ('$valor', '$id_factura', '$valor1')";
		mysql_select_db($basedatos, $conectBD);
		$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	   
	  }

	}
	
 //   $cantidad=$cantidad+1;

//}

 //$valor_total=$valor_total/$cantidad;#/$cantidad;
}


#abonos notas
$cantidad=0;
$valor_nota=0;
if(!empty($notas) )
{
//foreach ($notas as $clave => $valor){
 

   	foreach($notas_abono as $valor => $valor1)
	{
	 $valor_factura=0;
	 	
	   
	  if (!empty($valor1) && $valor1<>0  )
	  {
	    $valor_nota= $valor_nota+$valor1;
	    
	    $mysqlinv ="INSERT INTO detalle_caja( id_nota, id_caja_mayor,valor) 
		VALUES ('$valor', '$id_factura', '$valor1')";
		mysql_select_db($basedatos, $conectBD);
		$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	   
	  }

	}
	
  //  $cantidad=$cantidad+1;

//}
//$valor_nota=$valor_nota/$cantidad;
}

//$valor_total=$valor_total+$valor_nota;





//echo $valor_total;
if($cheque=='1')
{
 $transaccion=$valor_total-$valor_efectivo;
}
if(($cheque=='0' or $cheque=='') and($efectivo=='0' or $efectivo=='') )
{
 $valor_efectivo=$valor_total;
}

if($valor_efectivo<$valor_total and $cheque=='0' or $cheque=='')
{
 $valor_efectivo=$valor_total;
}



$mysqlinv ="INSERT INTO recibo_caja_m( fecha,concepto, valor, id_cliente, ciudad, elabora,consecutivo, recibido_enca,
cheque,banco,sucursal,transferencia,efectivo,aprueba, contabiliza, valor_efectivo, valor_mayor) 
VALUES ('$fecha_desde', '$concepto', '$valor_total', '$cliente', '$ciudad',  '$elaborado','$factura_dian',
'$recibido_enca','$cheque','$banco','$sucursal','$transaccion','$efectivo','$aprobado','$contabiliza','$valor_efectivo', '$valor_mayor')";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());






$mysqlinv = " select consecutivo_recibo_caja from parametrizacion_factura";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
 $consecutivo_actual=$arreglo['consecutivo_recibo_caja'];
}
$consec_sig=$consecutivo_actual+1;

$mysqlinv = " update   parametrizacion_factura set consecutivo_recibo_caja='$consec_sig'";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());


#recorre el insert realizado para actualizar saldo de las facturas y notas de cargo

$mysqlinv = "select sum(valor) as valor_recibo, id_factura,id_nota from  detalle_caja where id_caja_mayor='$id_factura'
group by id_factura,id_nota";
mysql_select_db($basedatos, $conectBD);
$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
while($arreglo=mysql_fetch_array($resultadoinv))
{
  $valor_recibo=$arreglo['valor_recibo'];

  $id_facturacion_f=$arreglo['id_factura'];
  $id_notaf=$arreglo['id_nota'];

 
   $mysqlfac = "select sum(valor_concepto) as valor_f , id_factura as id_ft from  
   detalle_factura where id_factura='$id_facturacion_f' group by id_factura";
   mysql_select_db($basedatos, $conectBD);
   $resultadofac = mysql_query($mysqlfac , $conectBD) or die (mysql_error());
   
   while($arreglofac=mysql_fetch_array($resultadofac))
		{
		  $cancelado=0;
		  $valor_ft=$arreglofac['valor_f'];
		  $saldo_f= $valor_ft-$valor_recibo;
		  if($saldo_f<=0)
		   { 
		    $cancelado=1;
		   }
		   
		  
		  $mysqlinvf = " update   facturacion set abono=abono + '$valor_recibo', saldo='$saldo_f', cancelado='$cancelado'
		  where id='$id_facturacion_f'";
		  mysql_select_db($basedatos, $conectBD);
		  $resultadoinvf = mysql_query($mysqlinvf , $conectBD) or die (mysql_error());
		  
		}
		 
		#notas
		$mysqlfac = "select sum(valor) as valor_f , id_nota as id_ft from  
                     detalle_nota where id_nota='$id_notaf' group by id_nota";
   mysql_select_db($basedatos, $conectBD);
   $resultadofac = mysql_query($mysqlfac , $conectBD) or die (mysql_error());
   
   while($arreglofac=mysql_fetch_array($resultadofac ))
		{
		  $cancelado=0;
		  $valor_ft=$arreglofac['valor_f'];
		  $saldo_f= $valor_ft-$valor_recibo;
		  if($saldo_f<=0)
		   { 
		    $cancelado=1;
		   }
		   
		  
		  $mysqlinvf = " update   notas set abono=abono + '$valor_recibo', saldo='$saldo_f', cancelado='$cancelado'
		  where id_nota='$id_notaf'";
		  mysql_select_db($basedatos, $conectBD);
		  $resultadoinvf = mysql_query($mysqlinvf , $conectBD) or die (mysql_error());
		}
   
}

/*
$emergente="formato_recibo.php?id_factura=$id_factura";
?><script>alert("PROCESO EXITOSO");</script><?
echo"<META HTTP-EQUIV=Refresh CONTENT=0;URL=$emergente>";
*/
echo json_encode(array(
		'msg' => 'PROCESO EXITOSO',
		'id_factura' => $id_factura,
		'rpt' => true
	));
