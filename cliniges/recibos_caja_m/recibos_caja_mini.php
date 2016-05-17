<?php

//error_reporting(0);
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
.style2 {
	font-size: x-small;
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
	<legend style="color:#33CC00"><strong>RECIBOS DE CAJA</strong></legend>
      
          <form action="recibos_caja_m.php" method="post">
     <table>
     
     <tr>
     <? include("logo.php");?>

      
      </tr>

     <?php 
      require_once("../../conexion.php");
      $cedula=@$_POST['cedula'];

         $mysqlinv = " select * from  parametrizacion_factura";
    	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $resolucion=$arreglo['consecutivo_recibo_caja'];
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
     
     <table align="left" border="1" bordercolor="green" style="width: 500px">
     <tr>
     <td class="style1" colspan="4"><strong>Recibo de caja </strong></td>

     </tr>
     
      <tr>
                <td style="width: 109px" ><div align="right">Responsable</div></td>
                <td width="181" ><?php
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px' >";

    
     			
				    $select="select * from contactos where tipo_familar='2' order by nombre_contact ASC";
						mysql_select_db($basedatos,$conectBD);
						$resultado = mysql_query($select,$conectBD) or die (mysql_error());
						if($resultado==TRUE){
						if (mysql_num_rows($resultado)>0){
						while($pos=mysql_fetch_array($resultado)){
												
						$estado1.="<option value=$pos[id]>$pos[nombre_contact] $pos[apellido_contact]";
						}
						}
						}
						echo $estado1;


			?></td>
			</tr>
         

           

     
     </table>
     </tr>
     <br>
           <tr>
     <td>
     </td>
     </tr>
     </table>
     <br>
     <br>
 
     <br>
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
	   <a href="../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>
	    <div align="right"><?php //include("../../usuario_activo.php");?></div>

	  </div>

    <div class="sidebar_section">
      <h2>Recibos caja</h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
                       <lu></lu>
          
                   
         <li><a href="#"><strong>Recibos de Caja</strong></a>
               <lu></lu>
          </li>

          <li><a href="recibos_caja_mini.php">Recibos</a>
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