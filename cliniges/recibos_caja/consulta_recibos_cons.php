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
	color: #FFFFFF;
}
</style>


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
	<legend style="color:#33CC00"><strong>LISTA DE RECIBOS DE CAJA MENOR</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form action="exportar_excel.php" method="post">
     
     <tr>
     <? include("logo.php");?>

      
      </tr>
         <tr>
         <td align="CENTER"><strong>#Recibo
         </strong>
         </td> 
         <td  align="center"><strong>Fecha
         </strong>
         </td>
          <td align="center"><strong>Cliente
         </strong>
         </td>
         
                 
          <td align="center"><strong>Estado
         </strong>
         </td>



         
         </tr>    
         <tr>
                 <?
       require_once("../../conexion.php");
       $fecha_ini=$_POST['fecha_ini'];
       $fecha_fin=$_POST['fecha_fin'];
       
       $select="select * from recibo_caja where fecha between '$fecha_ini' and  '$fecha_fin' 
       order by consecutivo asc";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv = mysql_query($select, $conectBD) or die (mysql_error());
	   while($arreglo=mysql_fetch_array($resultadoinv ))
       {
       $cedula=$arreglo['id_cliente'];
       $reembolso=$arreglo['reembolso'];


       $select1="select * from cliente where id_cliente='$cedula' ";
       mysql_select_db($basedatos, $conectBD);
	   $resultadoinv1 = mysql_query($select1, $conectBD) or die (mysql_error());
	   while($arreglo1=mysql_fetch_array($resultadoinv1 ))
       {
       $paciente=$arreglo1['razon_social']. $arreglo1['nombre'].' '.$arreglo1['apellido'];
       $nit=$arreglo1['cedula'];
       }

       
             ?>
      <tr>
      <td style="width: 76px" align="center"><input type="text" value="<? echo $arreglo['consecutivo'];?>"style="width: 61px"></td>
          
      <td style="width: 87px" align="center">
	  <input type="text"  value="<? echo $arreglo['fecha']?>"style="width: 96px"></td>
      
       <td style="width: 122px">
	   <input type="text" value="<? if( $arreglo['cliente']==''){ echo $paciente; } else { echo $arreglo['cliente'];} ;?>" style="width: 198px"></td>
	   
	   <td style="width: 122px">
	   <input type="text" value="<? if( $arreglo['estado']=='1'){ echo 	"ANULADO";} else {echo "APROBADO";};?>" style="width: 173px"></td>


 <?php if ($reembolso=='0' and  $arreglo['estado']=='0' ){?>
      <td>
		<div><a href="reembolsar.php?id_factura=<?  echo $arreglo['id_recibo'];?>" target="popup" onclick='window.open("", "popup", "")' > 
  		<img  src="../../images/reembolsar.jpg" alt="" name="Image6" width="33" height="31" border="0">
   		</a></div>
		</td>
<?php }

else
{ ?><td style="width: 122px"></td><?
}
?>
      
       <td>
		<div><a href="imprimir_recibo.php?id_factura=<?  echo $arreglo['id_recibo'];?>" target="popup" onclick='window.open("", "popup", "")' > 
  <img  src="../images/impresora.jpg" alt="" name="Image6" width="24" height="24" border="0">
   </a></div>
</td>
<td>
		<div><a href="anular_recibo.php?id_factura=<?  echo $arreglo['id_recibo'];?>" target="popup" onclick='window.open("", "popup", "")' > 
  <img  src="../images/borrador.png" alt="" name="Image6" width="22" height="19" border="0">
   </a></div>
</td>


       
              

      </tr>
      <?  if($arreglo['estado']==0 and $arreglo['reembolso']==0 ) { $total=$total+$arreglo['valor'];}
      
      }?>
      
      <tr bgcolor="#339933"><td colspan="3" bgcolor="#339933" class="style1"><strong>Total:</strong></td><strong><td class="style1"><? echo $total;?></strong></td></tr>
      
      <input type="hidden"   name="fecha_ini" value="<? echo $_POST['fecha_ini']?>"/>
      
       <input type="hidden"   name="fecha_fin" value="<? echo $_POST['fecha_fin']?>"/>

      

      <input type="hidden">

      

               

                                    <tr>
                <td colspan="5"><div align="center">
                  &nbsp;<input type="submit" name="boton" value="Exportar Excel"   /></div></td></tr>


			
	</form>
			
</table>
	</strong>
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



