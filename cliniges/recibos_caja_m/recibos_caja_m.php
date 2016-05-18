<?php
//error_reporting(0);
//require_once("../../comun.php");
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'mvc'.DIRECTORY_SEPARATOR.'funciones'.DIRECTORY_SEPARATOR.'funciones_generales.php';
?>


<script>
function validarFormulario (f)
{

var formulario = document.form1;
var todoCorrecto = true;


 if (f.elements["fecha_inicial"].value == "")
 {
   alert("Debe ingresar la fecha del documento");
   
    f.elements.fecha_inicial.focus();
    return false;
    todoCorrecto=false;
 }


 
 
  if (f.elements["concepto"].value == "")
 {
   alert("debre ingresar un concepto para el documento");
   
    f.elements.concepto.focus();
    return false;
    todoCorrecto=false;
 }
 
 if (f.elements["ciudad"].value == "")
 {
   alert("debre ingresar una ciudad para el documento");
   
    f.elements.ciudad.focus();
    return false;
    todoCorrecto=false;
 }
 
  if (f.elements["entregado_por"].value == "")
 {
   alert("debre ingresar la persona que entrega el documento");
   
    f.elements.entregado_por.focus();
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
      <script type="text/javascript"></script>
          <form   name="form1"  id="form1" action="insertar_recibo_cajam.php" method="post">
     <table>
     
     <tr>
     <?php include("logo.php");?>

      
      </tr>

     <?php
      require_once("../../conexion.php");
      $id_contacto=$_POST['paciente'];

      $mysqlinv = " select * from  parametrizacion_factura";
    	mysql_select_db($basedatos, $conectBD);
    	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
    	while($arreglo=mysql_fetch_array($resultadoinv))
    	{
    	 $resolucion=$arreglo['consecutivo_recibo_caja'];
    	}
    	
    	 $mysqlinv = " select * from  contactos where id='$id_contacto' and tipo_familar='2'";
    	mysql_select_db($basedatos, $conectBD);
    	$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
    	while($arreglo=mysql_fetch_array($resultadoinv))
    	{
    	 $nombre_responsable=$arreglo['nombre_contact'].' '.$arreglo['apellido_contact'];
    	 $nit_responsable=$arreglo['nit'];
    	 $direccion_responsable=$arreglo['direccion'];
    	 $tel_responsable=$arreglo['tel_fijo'].' '.$arreglo['celular'];
    	 $id_paciente=$arreglo['cedula'];
    	 
    	}

		


     
     ?>
     <tr>
     <td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td><td>
     <table align="left" border="1" bordercolor="green" style="width: 500px">
     <tr>
     <td class="style1" colspan="4"><strong>Recibo de caja </strong></td>

     </tr>
     <tr>
     <td class="style1" colspan="4" ><input type="text" name="factura_dian" value="<?php echo $resolucion;?>"></td>

     </tr>

    

      <tr>
     <td style="width: 143px"><strong>Fecha</strong>
     </td><td><input type="date" name="fecha_inicial" id="fecha_inicial" maxlength="2" style="width: 340px"></td>
             
     </tr>
     
      <tr>
	     <td style="width: 143px"><strong>Ciudad</strong>
	     </td><td><input type="text" name="ciudad" id="ciudad" style="width: 340px"></td>
	             
     </tr>
     
      <tr>
	     <td style="width: 143px"><strong>Entregado por</strong>
	     </td><td><input type="text" name="recibido_por"  id="entregado_por" style="width: 340px"></td>
	             
     </tr>
     

       <tr>
	     <td style="width: 143px"><strong>Concepto</strong>
	     </td><td><textarea name="concepto" id="concepto" style="width: 334px; height: 45px"></textarea></td>
	             
     </tr>
     <tr>
	     <td style="width: 143px"><strong>Valor Total $</strong>
	     </td><td>
       <label id="lbl_valor_total" style="width: 340px">0</label>
       <input type="hidden" name="valor_total" id="valor_total"/></td>
	             
     </tr>


     

     
     </table></td>
     </tr>
     <br>
           <tr>
     <td>
     <td></td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td style="width: 109px" ><div align="right">Responsable</div></td>
                <td width="181" ><?php
                $estado1='';
                  $estado1.="<select name='paciente' style='width: 300px' >";

     						    $select="select * from contactos where tipo_familar='2' and id='$id_contacto' order by nombre_contact ASC";
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
			
			         
     
          
     </table></td>
     </tr>
     
     
     <br>
      <tr>
     <td>
     <td></td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td style="width: 109px"  colspan="5"><div align="center">Facturas</div>
	</tr>
     
     <tr>
                <td style="width: 109px"><div align="center">#Factura</div>
                </td>
                 <td style="width: 109px"><div align="center">Valor</div>
                </td>
                 <td style="width: 109px"><div align="center">Seleccion</div>
                </td>
                 <td style="width: 109px"><div align="center">Abono</div>
                </td>
                <td style="width: 109px"><div align="center">Valor restante</div>
                </td>


                <?php
                $mysqlinv = " select * from  facturacion a, detalle_factura b where a.paciente='$id_paciente' and a.estado=0
                and a.id=b.id_factura and cancelado=0";
				mysql_select_db($basedatos, $conectBD);
				$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
				while($arreglo=mysql_fetch_array($resultadoinv))
				{
          if(($arreglo['valor_concepto'] - $arreglo['abono']) > 0 ){
  			?> <tr>
  				     <td><?php echo $arreglo['id_factura_dian']; ?></td>
  				     <td>
  				     <input class="valor_concepto" type="hidden" value="<?php echo $arreglo['valor_concepto'] - $arreglo['abono'];?>" name="valor_factura[]">
               <label><?php echo $arreglo['valor_concepto'];?></label>
  				     </td>
  				     <td ><input type="checkbox" class="chk-abono" value="<?php echo $arreglo['id_factura']?>" name="facturas[]"></td>
  				     <td ><input type="text" disabled="disabled" class="abono" name="abonos[<?php echo $arreglo['id_factura']?>]"></td>
               <td class="valor_restante"><?php echo $arreglo['valor_concepto'] - $arreglo['abono'];?></td>
  				 	</tr><?php 
					 }
	      }?>

               
	</tr>
	
		
	 <br>
      <tr>
     </td><table align="center" border="1" style="width: 490px" bordercolor="green">
     <br>
     
     <tr>
                <td style="width: 109px"  colspan="5"><div align="center">Notas de cargo</div>
	</tr>
     
     <tr>
                <td style="width: 109px"><div align="center">#Nota</div>
                </td>
                 <td style="width: 109px"><div align="center">Valor</div>
                </td>
                 <td style="width: 109px"><div align="center">Seleccion</div>
                </td>
                 <td style="width: 109px"><div align="center">Abono</div>
                </td>
                <td style="width: 109px"><div align="center">Valor restante</div>
                </td>
                <?php
                $mysqlinv = " select no_documento,sum(valor) as valor, a.id_nota, a.id_nota,a.saldo,a.abono from  notas a, detalle_nota b where a.id_cedula='$id_paciente' and a.estado=0
                and a.id_nota=b.id_nota and cancelado=0 group by no_documento, a.id_nota";
				mysql_select_db($basedatos, $conectBD);
				$resultadoinv = mysql_query($mysqlinv, $conectBD) or die (mysql_error());
				while($arreglo=mysql_fetch_array($resultadoinv))
				{
			?> <tr>
				     <td><?php echo $arreglo['no_documento']; ?></td>
				     <td>
                <input class="valor_concepto" type="hidden" value="<?php echo $arreglo['valor']; ?>"/>
                <label><?php echo $arreglo['valor']; ?></label>
             </td>
				     <td ><input type="checkbox" class="chk-abono" value="<?php echo $arreglo['id_nota']?>" name="notas[]"></td>
				     <td ><input type="text" class="abono" disabled="disabled" name="abonosnotas[<?php echo $arreglo['id_nota']?>]"/></td>
             <td class="valor_restante"><?php echo $arreglo['saldo'];?></td>
				 	</tr><?php 
					 
	            }?>

               
	</tr>

          
     </table></td>
     </tr>

     </table>
     <br>
     <br>
 
     <br>
     
     
     <table border="1" align="center">
			<tr>
			<td style="width: 83px">No Cheque</td><td><input type="text" name="cheque"></td>
			<td>Banco</td><td><input type="text" name="banco"></td>
			
			
			</tr>
			
			<tr>
			<td>Sucursal</td><td colspan="3">
						<input type="text" name="sucursal" style="width: 350px"></td>
			</tr>
			
			<tr>
			<td style="width: 83px">Traslado bancario</td><td><input type="checkbox" name="transaccion" value="1"></td>
			<td style="width: 83px">Efectivo</td> <td><input type="checkbox" name="efectivo" value="1" ></td>


			</tr>
			<tr>
			<td style="width: 83px" class="style2">Valor efectivo</td><td colspan="3">
						<input type="text" name="valor_efectivo" style="width: 332px"></td>
			</tr>
      <tr>
        <td style="width: 83px" class="style2">Valor mayor</td><td colspan="3"><input type="text" id="valor_mayor" name="valor_mayor" style="width: 332px"></td>
      </tr>


			</table>
     <br>
     
           <table border="1" style="width: 479px" align="center" bordercolor="green">
     		<tr><td> Preparado</td>
             <td style="width: 76px">
	  <input type="text" name="elaborado"  id="elaborado" style="width: 468px"></td>
          
            </tr>
      <tr><td> Aprobado</td>
             <td style="width: 76px">
	 		 <input type="text" name="aprobado"  style="width: 468px"></td>
          
            </tr>
            
       <tr><td> Contabilizado</td>
             <td style="width: 76px">
	 		 <input type="text" name="contabiliza"  style="width: 468px"></td>
          
            </tr>

     

     
     </table>
                                             <tr>
                <td width="55%" style="width: 100%"><div align="center">
                  <input type="submit" name="Submit" value="Generar Recibo"/>
                  
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
          <li><a href="cartera_edades.php">Cartera por edades</a>
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
<div id="preload"></div>
<div id="content_wrapper_bottom"></div>
<!-- end of content_wrapper -->
<div id="footer">
   Copyright &copy; 2013 <a href="#">BLUESOFTWARE-CLINIGES</a>  </div>
<!-- end of footer -->
</body>
<script src="<?php echo base_url('lib/jquery/jquery-2.2.3.min.js'); ?>"></script>
<script type="text/javascript">
 $("#form1").submit(function(e){
    if(validarFormulario (this))
    {
      $('#preload').toggle();
      $.post("insertar_recibo_cajam.php",$(this).serialize(),function(respuesta){
        $('#preload').toggle();
        if(respuesta.rpt){
          alert(respuesta.msg);
          window.location.replace("<?php echo base_url('cliniges/recibos_caja_m/formato_recibo.php?id_factura='); ?>"+respuesta.id_factura);
        }
      },'json');
    }
    e.preventDefault();
 });

  $('.chk-abono').change(function(e){
    $(this).parent().parent().find('.abono').val('');
    if($(this).is(':checked')){
      $(this).parent().parent().find('.abono').prop("disabled", false);
    }else{
      valorInicial = parseInt($(this).parent().parent().find('.valor_concepto').val());
      $(this).parent().parent().find('.valor_restante').html(valorInicial);
      $(this).parent().parent().find('.abono').prop("disabled", true);
    }
    calcularTotalPago();
  });

  $('.abono').keyup(function(e){
      if(e.which==8){
        validarAbono(e,this);
      }
      calcularTotalPago();
  });

  $("#valor_mayor").keyup(function(e){
      calcularTotalPago();
  });

  $('.abono').keypress(function(e){
    validarAbono(e,this);   
  });
  
  function validarAbono(e,t) {
      var valor = 0, valorInicial = 0 ;
      if($.isNumeric(String.fromCharCode(e.which))) {
        if( (valor = parseInt($(t).val()+String.fromCharCode(e.which))) > (valorInicial = parseInt($(t).parent().parent().find('.valor_concepto').val())) ) {
          e.preventDefault();
        }else{
            $(t).parent().parent().find('.valor_restante').html(valorInicial - valor);
        }
      }else{
        valorInicial = parseInt($(t).parent().parent().find('.valor_concepto').val());
        valor = $(t).val();
        $(t).parent().parent().find('.valor_restante').html(valorInicial - valor);
        e.preventDefault();
      }
  }
  function calcularTotalPago() {
    var total = 0;
    $('.abono').each(function(i,elemento){
      if($.isNumeric($(elemento).val())) {
        total += parseInt($(elemento).val());
      }
    }).promise().done(function(){
      if($.isNumeric($("#valor_mayor").val()))
        total += parseInt($("#valor_mayor").val());
      $("#lbl_valor_total").html(total);
      $("#valor_total").val(total);
    });
  }

</script>

</html>