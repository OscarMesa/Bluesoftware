<?php
error_reporting(0);
require_once("../../comun.php");



   require_once("../../conexion.php");

 $mysqlinv = " select * from  parametrizacion_factura";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $no_documento=$arreglo['consecutivo_egreso'];
	}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Factura</title>
<link href="../../style.css" rel="stylesheet" type="text/css" />

 <script src="jquery-1.9.1.js"></script>
        <script type="jquery.min.js"></script>
        
        <script type="text/javascript" src="jquery.js" charset="utf-8"></script>
        <script src="jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
        
        
  <script>
function validarFormulario (f)
{

var formulario = document.form1;
var todoCorrecto = true;


 if (f.elements["fecha_documento"].value == "")
 {
   alert("Debe ingresar la fecha del documento");
   
    f.elements.fecha_inicial.focus();
    return false;
    todoCorrecto=false;
 }


 if (f.elements["cedula"].value == "0")
 {
   alert("Debe ingresar el tercero ");
   
    f.elements.valor.focus();
    return false;
    todoCorrecto=false;
 }
 
  if (f.elements["valor_efectivo"].value == "")
 {
   alert("Debe ingresar el valor del documento");
   
    f.elements.concepto.focus();
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


 
<script type="text/javascript">
  function borrar(obj,valor,iva,totales,descuento) {
  fila = obj.parentNode.parentNode;
  document.getElementById('tabla').removeChild(fila);
 
 
  total = total - valor;
$("#txttotal").val(total);
 
 
 
 iva  = total * 0.19;
$("#txtiva").val(iva);
 
 
totales=total + iva- descuento ;
  $("#txttotales").val(totales);
 
  }
</script>
 

<style type="text/css">
.style1 {
	color: #FFFFFF;
}
.style4 {
	font-size: small;
}
.style5 {
	text-align: right;
}
</style>
 

<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1><a href="#"> <img src="../images/logo.png" alt=""  height="100"/> <span></span> </a></h1>
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
<div id="content_wrapper" style="height: 679px">
  <div id="content">
    <div class="content_section">
    


 
       

 
<body>
<form name='form1' id='form1' action='guardar.php' method='post' onsubmit="return validarFormulario (this)">
    <div class="style5">
 <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>COMPROBANTE DE EGRESO</strong></legend>

 <table width='90%' height='180' align='center'  class='tabl' >
  <tr>
    <td>
     <? include("logo.php");?>
     </td>
      
</tr>


 
 <tr>
 <td colspan="5">
 		<table align="center" style="width: 87%" border="1">
 		<tr>
 		  		  <td style="width: 238px"><div align="right">Fecha </div>
				  <td style="width: 338px"> 
				  <input type="date"  name="fecha_documento" style="width: 155px"/>
 		  </td>

 		</tr>
 		<tr>
 		  		  <td style="width: 238px"><div align="right">Egreso No</div>
				  <td style="width: 338px"> 
				  <input type="text"  name="no_documento" style="width: 155px" value="<? echo $no_documento;?>"/>
 		  </td>

 		</tr>
 		
 		<tr>
                <td style="width: 238px"><div align="right">Nombre o razon social</div></td>
               <td style="width: 338px" ><?
			
			$estado.="<select name='cedula' style='width: 300px' >";
						
	     	$select="select * from cliente   order by razon_social,nombre ASC";
						mysql_select_db($basedatos,$conectBD);
						$resultado = mysql_query($select,$conectBD) or die (mysql_error());
						if($resultado==TRUE){
						if (mysql_num_rows($resultado)>0){
						while($pos=mysql_fetch_array($resultado)){
						if($pos['cedula']==$pos){
						
						$estado.="<option selected value='$pos[id_cliente]'>$pos[razon_social] $pos[nombre] $pos[apellido]";

						
						                            }
                         else{
						
						$estado.="<option value=$pos[id_cliente]> $pos[razon_social] $pos[nombre] $pos[apellido]";
						}
						}
						}
						}
						else
						{
						$estado.="<option value='0'>no hay ningun estado del paciente</option>";
           				}

               
              if($huesped=='0' or $huesped==''){ $estado.="<option selected value=0>Seleccione</option></select> ";}
               echo $estado;
               
              
			?></td>
			    </tr>
			    
			    
			    

 		
 		 		
 		

 		</table>
 </td>
 </tr>
 
 
  <table border="1" align="center" style="width: 545px">
			
			
						
			<tr>
			<td style="width: 134px">Traslado bancario</td><td><input type="radio" name="transaccion" value="1"></td>
			<td style="width: 83px">Efectivo</td> <td style="width: 128px"><input type="radio" name="efectivo" value="1" ></td>


			</tr>
			<tr>
			<td style="width: 134px" class="style2">Valor efectivo</td><td colspan="3">
						<input type="text" name="valor_efectivo" style="width: 332px"></td>
			
			</tr>
			
			<tr><td>RTE FTE %</td>
<td><input type="text" name="retencion"></td>

<tr>




			</table>

 
 <!--Ingreso de productos cantidad y valor -->
            <table align="center" whidth="100px" border="1">
            <tr>
            <td>CONCEPTO</td>
            <td>
          
                      <input type="text" name='txtNombres' id='txtNombres' style='width: 300px' >
          
		
		                

            
            
            
            </td>
             <td>VALOR</td>
            <td><input type='text' name='txtApellidos' id='txtApellidos'/></td>
			
            <td><input name="btnInsertar" id="btnInsertar" type="button" value="Insertar" class="" /></td>
            
            </tr>
            
            </table>
            
            <br/>
            <br/>
            
 
<table height='' align='center' bgcolor='#FFFFFF' class='style1' id="tblDatos" style="width: 99%"  border="1">
           <tbody id="tabla">
           <tr bgcolor="#339933" >
           <td  colspan="2"><strong>Concepto</strong></td>
            
             <td style="width: 131px"><strong>Valor</strong></td>
             <td style="width: 230px"><strong>Eliminar</strong></td>
           </tr>
           <tr><td colspan="4" align="center"><input type="submit" value="Grabar" onClick="javascript:validarcampos()"></td></tr>
 
  <!--Insertar los datos en la tabla -->
 
 <script type="text/javascript" charset="utf-8">
 var total = 0;
 var iva = 0;
 var totales = 0;
 var i = 0;
    $(function() {
		$("#btnInsertar").click(addUsuario);
 
	});
 
	function addUsuario(){
		var Nombres=$('select#txtNombres').val();
		var apellidos=$("#txtApellidos").val();
		var telefono=$("#txtTelefono").val();
		var descuento=$("#txtDescuento").val();
		var tablaDatos= $("#tblDatos");
		var valor=(apellidos*telefono)
		var nombre1=$('#txtNombres').val()
		
		
		
		jQuery.ajax(
		
		{
		
				type: "post", 
				dataType: "json",
				async: false,
				data: {
					nombre_concepto : Nombres
				},
				url: "./buscar_producto.php",
				success: function (data) {
					alert(response(data));
					alert (nombre1);
				}
			});
      
      
      
		alert(nombre1);
		
 
		if(Nombres!="" || apellidos!="" || telefono!=""  ){
tablaDatos.append("<tr><td><input type='text'  style='width: 300px'  value='"+nombre1+"' style='background-color:#FFF' /><td><input type='hidden' name='fruit[]' value='"+nombre1+"' autofocus readonly style='background-color:#FFF' /></td><td><input type='text' name='cantidad[]' value='"+apellidos+"'   /></td><td align='center'><input type='button' onclick='borrar(this,"+valor+","+iva+","+totales+","+descuento+")' value='ELIMINAR' /></td></tr>");
 
 total = total + valor;
 iva  = total * 0.19;
 
 totales=total + iva - descuento
$("#txttotal").val(total);
$("#txtiva").val(iva);
$("#txtdescuento").val(descuento);
$("#txttotales").val(totales);
		reset_campos();
		}
	}
	function reset_campos(){
		$("#txtNombres").val("");
		$("#txtApellidos").val("");
		$("#txtTelefono").val("");
   }
 
$(".delete").live('click', function(event) {
	$(this).parent().parent().remove(tr);
});
</script>
           
 
</tbody>
</table>
<table>

<tr>
           <td  >Elaborado por:</td>
           <td  ><input type="text" name="elaborado" style="width: 174px"></td>
           <td  >Revisado por:</td>
           <td  ><input type="text" name="recibido" style="width: 181px; height: 22px"></td>
           
           </tr>
           
           <tr>
           <td>Aprobado por:</td>
           <td><input type="text" name="aprueba" style="width: 174px"></td>
           <td>Contabiliza</td>
           <td><input type="text" name="contabiliza" style="width: 181px; height: 22px"></td>
           
           </tr>
</table>

		

           
            </fieldset>


 

 </div>


 

 </form>
 
</body>
 </div>
  </div>
   
   
   <div id="sidebar" style="width: 219px">
   <div>
	  <a href="../../menu_admin_comer.php"><img alt="" height="38" src="../images/home_1.jpg" style="float: right" width="38" /></a>
	   <a href="../../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>
	  <div align="right"><?php include("../../usuario_activo.php");?></div>

	  </div>

    <div class="sidebar_section">
      <h2 class="style4"></h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
                       <lu></lu>
          
                   
         <li><a href="#"><strong>Comprobante de egreso</strong></a>
               <lu></lu>
          </li>

          <li><a href="egresos.php">Comprobante de egreso</a>
               <lu></lu>
          </li>
          <li><a href="consulta_equivalente.php">Consulta Egresos</a>
               <lu></lu>
          </li>
          
          
                </div>
    </div>
    <div class="cleaner_h30"></div>
    <div class="sidebar_section">
      <h2>Galatea</h2>
      <div class="sidebar_section_content">
                <div class="cleaner"></div>
      </div>
    </div>
  </div>

</html>