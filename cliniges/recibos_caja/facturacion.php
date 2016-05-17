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
	<legend style="color:#33CC00"><strong>FACTURACION</strong></legend>
      
          <form action="insertar_facturacion.php" method="post">
     <table>
     
     <tr>
     <? include("logo.php");?>

      
      </tr>

     <?
  

require_once("../../conexion.php");
$cedula=$_POST['cedula'];

     $mysqlinv = " select * from  parametrizacion_factura";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $resolucion=$arreglo['consecutivo_actual'];
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
     <table align="left" border="1" bordercolor="green" style="width: 419px">
     <tr>
     <td class="style1" colspan="4"><strong>Factura de venta</strong></td>

     </tr>
     <tr>
     <td class="style1" colspan="4" ><input type="text" name="factura_dian" value="<? echo $resolucion;?>"></td>

     </tr>

    

     <tr>
     <td  class="style1" colspan="4"><strong>Fecha</strong></td>
     </tr>
     <tr>
     <td style="width: 143px"><strong>Del</strong>
     </td><td><input type="date" name="fecha_inicial" maxlength="2" style="width: 160px"></td>
      <td style="width: 95px"><strong>Al</strong></td>
      <td><input type="date" maxlength="2" name="fecha_final" style="width: 170px"></td>
       
     </tr>
     
     </table></td>
     </tr>
     <br>
           <tr>
     <td>
     <td></td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td width="87" ><div align="right">Paciente</div></td>
                <td width="181" ><?
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px' >";

     			require_once("../conexion.php");
     			
				    $select="select * from huesped where id_cedula='$cedula' order by nombre ASC";
						mysql_select_db($basedatos,$conectBD);
						$resultado = mysql_query($select,$conectBD) or die (mysql_error());
						if($resultado==TRUE){
						if (mysql_num_rows($resultado)>0){
						while($pos=mysql_fetch_array($resultado)){
												
						$estado1.="<option value=$pos[id_cedula]>$pos[nombre] $pos[apellido]";
						}
						}
						}
						echo $estado1;


			?></td>
			</tr>

     <tr>
          <td style="width: 54px"><strong>Señor</strong></td>
          <td style="width: 241px">
		  <input type="text" name="nombre" style="width: 410px" value="<? echo $nombre_responsable?>"></td>
     </tr>
     <tr>
          <td style="width: 54px"><strong>Nit</strong></td>
          <td style="width: 241px">
		  <input type="text" name="nit" style="width: 410px" value="<? echo $nit_responsable?>"></td>
     </tr>
     <tr>
          <td style="width: 54px"><strong>Direccion</strong></td>
          <td style="width: 241px">
		  <input type="text" name="direccion" style="width: 410px"  value="<? echo $direccion_responsable?>"></td>
     </tr>
     <tr>
          <td style="width: 54px"><strong>Telefono</strong></td>
          <td style="width: 241px">
		  <input type="text" name="telefono" style="width: 410px" value="<? echo $tel_responsable?>" ></td>
     </tr>
     

     
          
     </table></td>
     </tr>
     </table>
     <br>
     <br>
 
      <table border="1" style="width: 479px" align="center" bordercolor="green">
     <tr><td> Codigo</td>
     <script type="text/JavaScript">
	function concat(one,two)
	{
	document.getElementById('colour').value=""+one+two+"";
	}
</script>
          
     <td style="width: 117px"> Descripcion</td>
      <td style="width: 122px">Valor Pagar</td>
            </tr>
      <?
      
       
       $select="select * from comercial where cedula='$cedula'";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv = mysql_query($select, $conectBD) or die (mysql_error());
	   while($arreglo=mysql_fetch_array($resultadoinv ))
       {
		$x[]= $arreglo['id']
      ?>
      <tr>
       <td style="width: 76px"><input type="text" value="<? echo "01";?>"style="width: 61px"></td>
      
      <td style="width: 76px">
	  <input type="text" value="<? echo "Servicios asistenciales prestados";?>"style="width: 277px"></td>
          
            <td style="width: 122px"><input type="text" name="opcion[]" value="<? echo $arreglo['valor_paga'];?>" style="width: 98px"></td>
              

      </tr>
      <? }?>
      
     </table>
     <br>
     <br>
     
           <table border="1" style="width: 479px" align="center" bordercolor="green">
     <tr><td> Elaborado</td>
          
     <td style="width: 117px"> Revisado</td>
      <td style="width: 122px">Contabilizado</td>
            </tr>
      <tr>
      <td style="width: 76px"><input type="text" name="elaborado"  style="width: 160px"></td>
          
      <td style="width: 117px"><input type="text" name="revisado" style="width: 142px"></td>

       <td style="width: 122px"><input type="text"  name="contabilizado"style="width: 156px"></td>
      
      </tr>
       <tr><td  colspan="3"><strong>NOTA: Servicios exceptuados del IVA Art. 476 del E.Tributario.</strong></td>
          
                </tr>
     

     
     </table>

     
     
    



             
         				                                                 <tr>
                <td width="55%" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Generar factura" onClick="javascript:validarcampos()"  />
                  
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
