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
<div align="right"><?php include("../../usuario_activo.php");?></div>
  <div id="content">
    <div class="content_section">
    <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>PARAMETRIZACION FACTURA</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form action="insertar_parametrizacion.php" method="post">
     
     
<tr>
    <td>
     <? include("logo.php");?>
     </td>
      
</tr>
    


      <tr>
                <td width="205" ><div align="right">Resolucion<span class="style1">*</span></div></td>
				 				
				
				
                <td width="229" >
				<textarea  name="resolucion" style="width: 258px; height: 39px"></textarea><td>
        </tr>
        
         				  <tr>
                <td style="height: 33px"><div align="right">Fecha resolucion<span class="style1">*</span></div></td>
                <td style="height: 33px"><input type="date" name="fecha" style="width:130px"  onclick=" return validar_texto(event);"   />
                <input type="button" id="f_clearRangeStart"  onclick="clearRangeStart()"></td>
                <script type="text/javascript">
                  RANGE_CAL_1 = new Calendar({
                          inputField: "f_rangeStart",
                          dateFormat: "%B %d, %Y",
                          trigger: "f_rangeStart_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.min = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  function clearRangeStart() {
                          document.getElementById("f_rangeStart").value = "";
                          LEFT_CAL.args.min = null;
                          LEFT_CAL.redraw();
                  };
                </script>

               
				 </tr>
              <tr>
                <td><div align="right">Nit<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="nit" style="width:258px" onKeypress=" return validar_texto(event);" /></td>
                </tr>
               <tr>
                <td><div align="right">Telefono<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="telefono" style="width:258px" onKeypress=" return validar_texto(event);"  /></td>
                </tr>
                <tr>
                <td><div align="right">Ciudad<span class="style1">*</span></div></td>
                <td>
				<input type="text" name ="ciudad" id="sel2" style="width: 258px"/></td>
                </tr>
                <tr>
                <td><div align="right">Direccion<span class="style1">*</span></div></td>
                <td>
				<input type="text" name ="direccion" id="sel2" style="width: 258px"/></td>
                </tr>

			   <tr>
                <td><div align="right">Consecutivo inicial<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="inicial" style="width:258px; height: 21px;"  onKeypress=" return validar_texto(event);" /></td>
                </tr>
                <tr>
                <td><div align="right">Consecutivo Final<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="final" style="width:258px"  onKeypress=" return validar_texto(event);" /></td>
               </tr>
               
               
               <tr>
                 <td style="width: 451px" class="style1" ><div align="right">Logo</div></td>


                <td style="width: 314px" class="style1">
				<input type="file" name="archivo" style="width: 225px"/></td>
			    </tr>

                                               <tr>
                <td width="55%" colspan="2" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Ingresar" onClick="javascript:validarcampos()"  />
                  
                   <input type="hidden" name="cedula" value="<? echo $_GET['cedula']?>"   />

                </div></td></tr>


			
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
