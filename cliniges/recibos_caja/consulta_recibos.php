<?php

error_reporting(0);
require_once("../../comun.php");
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


  


</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1><a href="#"> <img src="../../images/logo.png" alt="" width="400" /> <span></span> </a></h1>
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
	<legend style="color:#33CC00"><strong> FILTRO RECIBOS</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form action="consulta_recibos_cons.php" method="post">
       <tr>
    <td>
     <? include("logo.php");?>
     </td>
      
</tr>

          
         <tr>
         <td align="CENTER" style="width: 120px"><strong>Fecha inicial(ddmmaaaa)</strong></td>
						<td style="width: 64px"><input type="date" name="fecha_ini"></td>
                 
         <td  align="center"><strong>Fecha final (ddmmaaaa)
         </strong></Td><td><input type="date" name="fecha_fin"></td>
         
         
         </tr> 
            <tr>
                <td width="55%"  colspan="4" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Consultar" onClick="javascript:validarcampos()"  />
                  
                   <input type="hidden" name="id_concepto" value="<? echo $_GET['id_concepto']?>"   />

                </div></td></tr>
   
         <tr>
                       

               

                                <tr>
                <td colspan="2"><div align="center">
                  &nbsp;<input type="hidden" name="cedula" value="<? echo $_GET['cedula']?>"   /></div></td></tr>


			
	</form>
			
</table>
</fieldset>
         </div>
    <div class="cleaner_h40"></div>
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
      <h2>Recibos Caja</h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
          <li><a href="#"><strong>Recibos de Caja</strong></a>
               <lu></lu>
          </li>

          <li><a href="recibos_caja.php">Recibos</a>
               <lu></lu>
          </li>
          <li><a href="consulta_recibos.php">Consulta Recibos</a>
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
