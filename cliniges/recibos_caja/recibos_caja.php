<?php

error_reporting(0);
require_once("../../comun.php");
require_once("../../conexion.php");
?>

<script>
function validarFormulario (f)
{

var formulario = document.form1;
var todoCorrecto = true;


 if (f.elements["fecha_inicial"].value == "")
 {
   alert("Debe ingresar la fecha del documento");
   
    f.elements.fecha_inicial.focus();
    return false;
    todoCorrecto=false;
 }


 if (f.elements["valor"].value == "")
 {
   alert("debre ingresar un valor para el documento");
   
    f.elements.valor.focus();
    return false;
    todoCorrecto=false;
 }
 
  if (f.elements["concepto"].value == "")
 {
   alert("debre ingresar un concepto para el documento");
   
    f.elements.concepto.focus();
    return false;
    todoCorrecto=false;
 }
 
 if (f.elements["ciudad"].value == "")
 {
   alert("debre ingresar una ciudad para el documento");
   
    f.elements.ciudad.focus();
    return false;
    todoCorrecto=false;
 }
 
   
 if (f.elements["elaborado"].value =="")
 {
   alert("debre ingresar la persona que elabora el documento");
   
    f.elements.elaborado.focus();
    return false;
    todoCorrecto=false;
 }

 return true;
 
if (todoCorrecto ==true) {formulario.submit();}

 
 }
</script>



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
	<legend style="color:#33CC00"><strong>RECIBOS DE CAJA MENOR</strong></legend>
      
          <form id="form1" name="form1" action="insertar_recibo.php" method="post" onsubmit="return validarFormulario (this)">
     <table>
     
     <tr>
     <? include("logo.php");?>

      
      </tr>

     <?php
  


$cedula=$_POST['cedula'];

     $mysqlinv = " select * from  parametrizacion_factura";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $resolucion=$arreglo['consecutivo_actual_caja'];
	}
	
	 $mysqlinv = " select * from  contactos where cedula='$cedula' and tipo_familar='2'";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $nombre_responsable=$arreglo['nombre_contact'].' '.$arreglo['apellido_contact'];
	 $nit_responsable=$arreglo['nit'];
	 $direccion_responsable=$arreglo['direccion'];
	 $tel_responsable=$arreglo['tel_fijo'].' '.$arreglo['celular'];
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
     </td><td><input type="date" name="fecha_inicial" id="fecha_inicial" maxlength="2" style="width: 340px"></td>
             
     </tr>
     
      <tr>
	     <td style="width: 143px"><strong>Ciudad</strong>
	     </td><td><input type="text" name="ciudad" id="ciudad" style="width: 340px"></td>
	             
     </tr>
       <tr>
	     <td style="width: 143px"><strong>Concepto</strong>
	     </td><td><textarea name="concepto" id="concepto" style="width: 334px; height: 45px"></textarea></td>
	             
     </tr>
     <tr>
	     <td style="width: 143px"><strong>Valor Total $</strong>
	     </td><td><input type="text" name="valor_total"  id="valor" style="width: 340px"></td>
	             
     </tr>


     

     
     </table></td>
     </tr>
     <br>
           <tr>
     <td>
     <td></td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td width="87" ><div align="right">Proveedor</div></td>
                <td width="181" ><?
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px' >";

     		
     			
				    $select="select * from cliente where tipo_cliente='1'
                    order by razon_social, nombre ASC";
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

         
     
          
     </table></td>
     </tr>
     </table>
     <br>
     <br>
 
     <br>
     <br>
     
           <table border="1" style="width: 479px" align="center" bordercolor="green">
     <tr><td> Elabora</td>
          
                 </tr>
      <tr>
      <td style="width: 76px">
	  <input type="text" name="elaborado" id="elaborado" style="width: 468px"></td>
          
            </tr>
       <tr><td  colspan="3">&nbsp;</td>
          
                </tr>
     

     
     </table>

     
     
    



             
         				                                                 <tr>
                <td width="55%" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Generar Recibo" onClick="javascript:validarcampos()"  />
                  
                   <input type="hidden" name="cedula" value="<? echo $_GET['cedula']?>"   />

                </div></td></tr>

  
			
	</form>
			
</fieldset>
         </div>
      </div>
  <!-- end of content -->
  <div id="sidebar">
   <div>
	  <a href="../../menu_admin_comer.php"><img alt="" height="38" src="../images/home_1.jpg" style="float: right" width="38" /></a>
	   <a href="../../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>
	  <div align="right"><?php include("../../usuario_activo.php");?></div>

	  </div>

    <div class="sidebar_section">
      <h2>Recibos caja menor</h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
                       <lu></lu>
          
                   
         <li><a href="#"><strong>Recibos de Caja menor</strong></a>
               <lu></lu>
          </li>

          <li><a href="recibos_caja.php">Recibos</a>
               <lu></lu>
          </li>
          <li><a href="consulta_recibos.php">Consulta Recibos</a>
               <lu></lu>
          </li>
           <li><a href="../../admn/maestro_cliente.php">Maestro terceros</a>
               <lu></lu>
          </li>
           <li><a href="../../admn/consulta_cliente.php">Consulta terceros</a>
               <lu></lu>
          </li>




          
                </div>
    </div>
    <div class="cleaner_h30"></div>
    <div class="sidebar_section">
      <h2>Historias Clinicas</h2>
      <div class="sidebar_section_content">
                <div class="cleaner"></div>
      </div>
    </div>
  </div>
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
