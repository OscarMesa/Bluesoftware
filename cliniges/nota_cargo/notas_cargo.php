
<?php
error_reporting(0);
require_once("../../comun.php");


   require_once("../../conexion.php");

 $mysqlinv = " select * from  parametrizacion_factura";
	mysql_select_db($basedatos, $conectBD);
	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
	while($arreglo=mysql_fetch_array($resultadoinv))
	{
	 $no_documento=$arreglo['consecutivo_nota'];
	}


?>

<script>
function validarFormulario (f)
{

var formulario = document.form1;
var todoCorrecto = true;


 if (f.elements["cedula"].value == '0')
 {
   alert("Debe ingresar la razon social");
   
    f.elements.cedula.focus();
    return false;
    todoCorrecto=false;
 }
 
  if (f.elements["elaborado"].value == '')
 {
   alert("Debe ingresar el nombre del elaborador");
   
    f.elements.elaborado.focus();
    return false;
    todoCorrecto=false;
 }



 
 return true;
 
if (todoCorrecto ==true) {formulario.submit();}

 
 }
</script>

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
<form id="form1" name="form1" action='guardar.php' method='post' onsubmit="return validarFormulario (this)">
 <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>DOCUMENTO EQUIVALENTE</strong></legend>

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
				  <input type="date"  name="fecha_documento" value="<?echo date('Y-m-d',time())?>" style="width: 155px"/>
 		  </td>

 		</tr>
 		<tr>
 		  		  <td style="width: 238px"><div align="right">Nota de Cargo No</div>
				  <td style="width: 338px"> 
				  <input type="text"  name="no_documento" style="width: 155px" value="<? echo $no_documento;?>"/>
 		  </td>

 		</tr>
 		
 		<tr>
                <td style="width: 238px"><div align="right">Residente</div></td>
               <td style="width: 338px" ><?
			
			$estado.="<select name='cedula' style='width: 300px' id='cedula' >";
		
		 
		    
						
	     	$select="select * from huesped  order by nombre ASC";
						mysql_select_db($basedatos,$conectBD);
						$resultado = mysql_query($select,$conectBD) or die (mysql_error());
						if($resultado==TRUE){
						if (mysql_num_rows($resultado)>0){
						while($pos=mysql_fetch_array($resultado)){
						if($pos['cedula']==$pos){
						
						$estado.="<option selected value='$pos[id_cedula]'>$pos[nombre]";

						
						                            }
                         else{
						
						$estado.="<option value=$pos[id_cedula]>$pos[nombre] $pos[apellido]";
						}
						}
						}
						}
						else
						{
						$estado.="<option value='0'>no hay ningun estado del paciente</option>";
           				}

               
              if($huesped=='0' or $huesped==''){ $estado.="<option selected value='0'>Seleccione el paciente</option></select> ";}
               echo $estado;
               
              
			?></td>
			    </tr>
			    
			    
			    
			    <tr>
                <td style="width: 109px" ><div align="right">Responsable</div></td>
                <td width="181" ><?
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px'  >";

     
     			
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
 </td>
 </tr>
 
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
           <tr><td colspan="4" align="center"><input type="submit" value="Grabar"onClick="javascript:validarcampos()" id="bnt_grabar" ></td></tr>
 
  <!--Insertar los datos en la tabla -->
 
 <script type="text/javascript" charset="utf-8">
 var total = 0;
 var iva = 0;
 var totales = 0;
 var i = 0;
    $(function() {
		$("#btnInsertar").click(addUsuario);
 
	});
	
	$("#bnt_grabar").click(function(e)
	{
	 var  valor_factura=($("#valor_total").text());
	 var total=parseInt(valor_factura);
	/*  isNaN(total)
    {
   	  alert("El documento debe tener un valor");
   	  
   	  e.preventDefault();
    }*/

	 
	 
	   

	 	
	 	
	});
 
	function addUsuario(){
		var Nombres=$('select#txtNombres').val();
		var apellidos=$("#txtApellidos").val();
		var telefono=$("#txtTelefono").val();
		var descuento=$("#txtDescuento").val();
		var tablaDatos= $("#tblDatos");
		var valor=(apellidos*telefono)
		var nombre1=$('#txtNombres').val()
		var valor_total=($("#valor_total").text());		
		
		total=(parseInt( valor_total));	
		
    isNaN(total)
    {
    total=apellidos;
    }

		
	//	$("#valor_total").html(apellidos);
		
		$("#valor_total").html(total);
	
		
		
		
		
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
				//	alert(response(data));
					//alert (nombre1);
				}
			});
      
      
      
		//alert(nombre1);
		
 
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
<br/>
 <table height='' align='center' style="width: 99%"  border="1">
			<tr bgcolor="#339933"><td style="width: 163px" class="style1">
				<strong>Total Documento</strong></td>
			<td><div id="valor_total"></div></td>
			</tr>
			</table>
<tr>
           <td  ><br>Elaborado por:</td>
           <td  ><input type="text" name="elaborado" style="width: 174px" id="elaborado"></td>
           <td  >Recibido por:</td>
           <td  ><input type="text" name="recibido" style="width: 181px; height: 22px"></td>
           
           </tr>
           
            </fieldset>

 

 </form>
 
</body>
 </div>
  </div>
   
   
   <div id="sidebar" style="width: 219px">
   <div>
	  <a href="../../menu_admin_comer.php"><img alt="" height="38" src="../../images/home_1.jpg" style="float: right" width="38" /></a>
	   <a href="../../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>
	   <div align="right"><?php include("../../usuario_activo.php");?></div>

	  </div>

  <div class="sidebar_section">
      <h2 class="style4">Notas de cargo</h2>
      <div class="sidebar_section_content">
        <ul class="categories_list">
                       <lu></lu>
          
                   
         <li><a href="#"><strong>Notas de Cargo</strong></a>
               <lu></lu>
          </li>

          <li><a href="notas_cargo.php">Notas Cargo</a>
               <lu></lu>
          </li>
          <li><a href="consulta_notas.php">Consulta notas Cargo</a>
               <lu></lu>
          </li></ul>
          
          
                </div>
    </div>
          
          
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


