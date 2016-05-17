<?php


error_reporting(0);
require_once("../../comun.php");


$id_factura=$_GET['id_factura'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bluesoftware</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>


<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1><a href="#"> <img src="../../images/logo.png" alt="" width="400"/> <span></span> </a></h1>
    </div>
    <div id="menu">
      <ul>
             </ul>
    </div>
    <!-- end of menu -->
       <div class="cleaner"></div>
  </div>
  <!-- end of header -->
</div>
<!-- end of header_wrapper -->
<div id="content_wrapper">
  <div id="content">
    <div class="content_section">
    <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>REEMBOLSO RECIBOS DE CAJA MENOR</strong></legend>
      
          <form action="guardar_reembolso.php" method="post">
     <table>
     
     <tr>
     <? include("logo.php");?>

      
      </tr>

     <?
  

require_once("../../conexion.php");


     $mysqlinv = " select * from recibo_caja where id_recibo='$id_factura'";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $resolucion=$arreglo['consecutivo'];
	  $fecha=$arreglo['fecha'];
	  $concepto=$arreglo['concepto'];
	  $valor=$arreglo['valor'];
	  $id_cliente=$arreglo['id_cliente'];
	  $ciudad=$arreglo['ciudad'];
	  $elabora=$arreglo['elabora'];
      $id_cliente=$arreglo['id_cliente'];


	}
	
			


     
     ?>
     <tr>
     <td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td><td>
     <table align="left" border="1" bordercolor="green" style="width: 500px">
     <tr>
     <td class="style1" colspan="4"><strong>Recibo de caja menor </strong></td>

     </tr>
     <tr>
     <td class="style1" colspan="4" ><input type="text" name="factura_dian" value="<? echo $resolucion;?>"></td>

     </tr>

    

      <tr>
     <td style="width: 143px"><strong>Fecha</strong>
     </td><td><input type="date" name="fecha_inicial" maxlength="2" style="width: 340px" value="<? echo $fecha;?>"></td>
             
     </tr>
     
      <tr>
	     <td style="width: 143px"><strong>Ciudad</strong>
	     </td><td><input type="text" name="ciudad" style="width: 340px" value="<? echo $ciudad;;?>"></td>
	             
     </tr>
       <tr>
	     <td style="width: 143px"><strong>Concepto</strong>
	     </td><td><textarea name="concepto" style="width: 334px; height: 45px"><? echo $concepto;?></textarea></td>
	             
     </tr>
     <tr>
	     <td style="width: 143px"><strong>Valor Total $</strong>
	     </td><td><input type="text" name="valor_total" style="width: 340px" value="<? echo $valor;;?>"></td>
	             
     </tr>


     

     
     </table></td>
     </tr>
     <br>
           <tr>
     <td>
     <td></td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td width="87" ><div align="right">Cliente</div></td>
                <td width="181" ><?
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px' >";

     			
     			
				    $select="select * from cliente where   id_cliente='$id_cliente' order by nombre ASC";
						mysql_select_db($basedatos,$conectBD);
						$resultado = mysql_query($select,$conectBD) or die (mysql_error());
						if($resultado==TRUE){
						if (mysql_num_rows($resultado)>0){
						while($pos=mysql_fetch_array($resultado)){
												
						$estado1.="<option value=$pos[id_cliente]>$pos[razon_social] $pos[nombre] $pos[apellido]";
						}
						}
						}
						echo $estado1;


			?></td>
			</tr>
			
			<tr>
     <td style="width: 143px"><strong>Fecha Reembolso</strong>
     </td><td><input type="date" name="fecha_reembolso" maxlength="2" style="width: 340px"></td>
             
     </tr>


         
     
          
     </table></td>
     </tr>
     </table>
     <br>
     <br>
 
     <br>
     <br>
     
           <table border="1" style="width: 479px" align="center" bordercolor="green">
     <tr><td> Aprobado</td>
          
                 </tr>
      <tr>
      <td style="width: 76px">
	  <input type="text" name="elaborado"  style="width: 468px" value="<? echo  $elabora;?>"></td>
          
            </tr>
       <tr><td  colspan="3">&nbsp;</td>
          
                </tr>
     

     
     </table>

     
     
    



             
         				                                                 <tr>
                <td width="55%" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Reembolsar" onClick="javascript:validarcampos()"  />
                  
                   <input type="hidden" name="id_factura" value="<? echo $id_factura;?>"/>
</form>

                </div></td></tr>

  
			
	</form>
			
</fieldset>
         </div>
      </div>
  <!-- end of content -->
  <!-- end of sidebar -->
  <div class="cleaner"></div>
</div>
<div id="content_wrapper_bottom"></div>
<!-- end of content_wrapper -->
<div id="footer">
   Copyright &copy; 2013 <a href="#">BLUESOFTWARE-CLINIGES</a>  </div>
<!-- end of footer -->
</body>
</html>
