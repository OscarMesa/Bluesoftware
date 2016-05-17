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


</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1><a href="#"> <img src="../images/logo.png" alt="" width="400" /> <span></span> </a></h1>
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
	<legend style="color:#33CC00"><strong>LISTA DE CONCEPTOS</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form action="insertar_concepto.php" method="post">

          
         <tr>
         <td align="CENTER"><strong>Codigo
         </strong>
         </td> 
         <td  align="center"><strong>Descripcion
         </strong>
         </td>
          <td align="center"><strong>Valor
         </strong>
         </td>

         
         </tr>    
         <tr>
                 <?
       require_once("../conexion.php");
       $select="select * from conceptos";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv = mysql_query($select, $conectBD) or die (mysql_error());
	   while($arreglo=mysql_fetch_array($resultadoinv ))
       {
        $x[]= $arreglo['id']
      ?>
      <tr>
      <td style="width: 76px" align="center"><input type="text" value="<? echo $arreglo['codigo'];?>"style="width: 61px"></td>
          
      <td style="width: 87px" align="center">
	  <input type="text"  value="<? echo $arreglo['nombre_concepto'];?>"style="width: 233px"></td>

       <td style="width: 122px"><input type="text" value="<? echo $arreglo['valor'];?>" style="width: 98px"></td>
      
       <td>
		<div><a href="consulta_conceptos_proc.php?id_concepto=<?  echo $arreglo['id'];?>" target="popup" onclick='window.open("", "popup", "")' > 
  <img  src="../images/modificar.png" alt="" name="Image6" width="24" height="24" border="0">
   </a></div>
</td>

       
              

      </tr>
      <? }?>
      

               

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
          <li><a href="#"><strong>Conceptos</strong></a>
               <lu></lu>
          </li>

           <li><a href="concepto.php">Configuracion de conceptos</a>
               <lu></lu>
          </li>
          <li><a href="consulta_conceptos_cons.php">Consulta de conceptos</a>
               <lu></lu>
          </li>

         <li><a href="#"><strong>Facturacion</strong></a>
               <lu></lu>
          </li>

          <li><a href="facturacion.php">Facturacion</a>
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
