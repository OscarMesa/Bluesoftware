<?php
//include("../sesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bluesoftware</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script src="../JS/src/js/jscal2.js"></script>
    <script src="../JS/src/js/unicode-letter.js"></script>

    <!-- you actually only need to load one of these; we put them all here for demo purposes -->
    <script src="../JS/src/js/lang/ca.js"></script>
    <script src="../JS/src/js/lang/cn.js"></script>
    <script src="../JS/src/js/lang/cz.js"></script>
    <script src="../JS/src/js/lang/de.js"></script>
    <script src="../JS/src/js/lang/es.js"></script>
    <script src="../JS/src/js/lang/fr.js"></script>
    <script src="../JS/src/js/lang/hr.js"></script>
    <script src="../JS/src/js/lang/it.js"></script>
    <script src="../JS/src/js/lang/jp.js"></script>
    <script src="../JS/src/js/lang/nl.js"></script>
    <script src="../JS/src/js/lang/pl.js"></script>
    <script src="../JS/src/js/lang/pt.js"></script>
    <script src="../JS/src/js/lang/ro.js"></script>
    <script src="../JS/src/js/lang/ru.js"></script>
    <script src="../JS/src/js/lang/sk.js"></script>
    <script src="../JS/src/js/lang/sv.js"></script>

    <!-- this must stay last so that English is the default one -->
    <script src="../JS/src/js/lang/en.js"></script>


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
      <h1><a href="#"> <img src="../images/logo.png" alt="" width="400"/> <span></span> </a></h1>
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
      
          <form action="recibos_caja.php" method="post">
    
     
     <?
  

require_once("../../conexion.php");
?>
<tr>
    <td>
     <? include("logo.php");?>
     </td>
      
</tr>
      <?php

require_once("../../administrativo/listado_huesped.php");

 ?>    		


     
      
     
     
    




             
         				                                                 <tr>
                <td width="55%" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Ingresar" onClick="javascript:validarcampos()"  />
                  
                  
                </div></td></tr>

  
			
	</form>
			
</fieldset>
         </div>
      </div>
  <!-- end of content -->
  <div id="sidebar">
   <div>
	  <a href="../../menu_admin_comer.html"><img alt="" height="38" src="../images/home_1.jpg" style="float: right" width="38" /></a>
	   <a href="../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>

	  </div>

    <div class="sidebar_section">
      <h2>Facturacion</h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
        <li><a href="#"><strong>Parametrizacion</strong></a>
               <lu></lu>
          </li>
          <li><a href="parametrizacion.php">Ingreso resolucion</a>
               <lu></lu>
          </li>
          <li><a href="consulta_parametrizacion.php">Consulta resolucion</a>
               <lu></lu>
          </li>
                    
         <li><a href="#"><strong>Facturacion</strong></a>
               <lu></lu>
          </li>

          <li><a href="facturacion_ini.php">Facturacion</a>
               <lu></lu>
          </li>
          <li><a href="consulta_factura.php">Consulta Factura</a>
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
