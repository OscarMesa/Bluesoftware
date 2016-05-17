<?php
//include("../sesion.php");


require_once("../../conexion.php");

$select="select * from parametrizacion_factura where estado='0'";
mysql_select_db($basedatos,$conectBD);
$resultado = mysql_query($select,$conectBD) or die (mysql_error());
while($vector=mysql_fetch_array($resultado))
{
$resolucion=$vector['resolucion'];
$fecha_resolucion=$vector['fecha_Resolucion'];
$nit=$vector['nit'];
$direccion=$vector['direccion'];
$ciudad=$vector['ciudad'];
$telefono=$vector['telefono'];
$consecutivo_inicial=$vector['consecutivo_inicial'];
$consecutivo_final=$vector['consecutivo_final'];
$nombre=$vector['nombre'];



}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bluesoftware</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script>
function valide_campos()
{

if (document.form1.resolucion.value=='')
 { alert("Debe ingresar el campo resolucion");
    document.form1.resolucion.focus();
    
 return false;
 }
 else if (document.form1.fecha.value=='')
 { alert("Debe ingresar la fecha de resolucion");
 document.form1.fecha.focus();

 return false;
 }
 else if (document.form1.nit.value=='')
 { alert("Debe ingresar el Nit");
 document.form1.nit.focus();

 return false;
 }
else if (document.form1.telefono.value=='')
 { alert("Debe ingresar el telefono");
 document.form1.telefono.focus();
 return false;
 }
else if (document.form1.ciudad.value=='')
 { alert("Debe ingresar la ciudad");
 document.form1.ciudad.focus();

 return false;
 }
 else if (document.form1.direccion.value=='')
 { alert("Debe ingresar la direccion");
 document.form1.direccion.focus();
 return false;
 }
else if (document.form1.inicial.value=='')
 { alert("Debe ingresar el campo consecutivo inicial");
 document.form1.inicial.focus();

 return false;
 }
 
 else if (document.form1.final.value=='')
 { alert("Debe ingresar el campo consecutivo final");
 document.form1.final.focus();

 return false;
 }
 
 
   
 else
 { return true;
 }

 









  
 


 /*else
 {
   return true
 }*/
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
      <h1><a href="#"> <img src="../../images/logo.png" alt="" height="100"/> <span></span> </a></h1>
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
<div>
    </div>

  <div id="content">
    <div class="content_section">
    <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>PARAMETRIZACION FACTURA</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form name="form1" action="" method="post">
     
     <tr>
    <td>
     <? include("logo.php");?>
     </td>
      
</tr>


      <tr>
                <td width="205" ><div align="right">Resolucion<span class="style1">*</span></div></td>
				 				
				
				
                <td width="229" >
				<textarea  name="resolucion" style="width: 258px; height: 39px"><? echo $resolucion;?></textarea><td>
        </tr>
        
         				  <tr>
                <td style="height: 33px"><div align="right">Fecha resolucion<span class="style1">*</span></div></td>
                <td style="height: 33px"><input type="text" name="fecha" style="width:130px"  value="<? echo $fecha_resolucion;?>"/>
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
				<input type="text" name="nit" style="width:258px"  value="<? echo $nit;?>" onKeypress=" return validar_texto(event);" /></td>
                </tr>
                <tr>
                <td><div align="right">Nombre<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="nit" style="width:258px"  value="<? echo $nombre;?>" onKeypress=" return validar_texto(event);" /></td>
                </tr>

               <tr>
                <td><div align="right">Telefono<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="telefono" style="width:258px"  value="<? echo $telefono;?>"onKeypress=" return validar_texto(event);"  /></td>
                </tr>
                <tr>
                <td><div align="right">Ciudad<span class="style1">*</span></div></td>
                <td>
                <input type="text" value="<? echo $ciudad;;?>">
				</td>
                </tr>
                <tr>
                <td><div align="right">Direccion<span class="style1">*</span></div></td>
                <td>
				<input type="text" name ="direccion" value="<? echo $direccion;?>" id="sel2" style="width: 258px"/></td>
                </tr>

			   <tr>
                <td><div align="right">Consecutivo inicial<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="inicial" style="width:258px; height: 21px;"  value="<? echo $consecutivo_inicial;?>" onKeypress=" return validar_texto(event);" /></td>
                </tr>
                <tr>
                <td><div align="right">Consecutivo Final<span class="style1">*</span></div></td>
                <td>
				<input type="text" name="final" style="width:258px" value="<? echo $consecutivo_final;?>" onKeypress=" return validar_texto(event);" /></td>
               </tr>
                                               <tr>
                <td width="55%" colspan="2" style="width: 100%"><div align="center">
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
