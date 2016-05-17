<?php 
    include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'mvc'.DIRECTORY_SEPARATOR.'funciones'.DIRECTORY_SEPARATOR.'funciones_generales.php';

    include_once dirname(__FILE__).'/../../mvc/modelos/contactos.php';

    $modeloContacto = new Contactos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bluesoftware</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../style.css" rel="stylesheet" type="text/css" />
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

<div id="content_wrapper" style="overflow: hidden;">
  <div id="content">
    <div class="content_section">
    <fieldset style="border-color:#33CC00; width:530px; border-height:120px ">
	<legend style="color:#33CC00"><strong>CARTERA DE EDADES</strong></legend>
       <form id="frm-carta" method="post" action="<?php echo base_url('mvc/controladores/Cfacturacion.php?accion=generaReporteEdades'); ?>">
       <table>
       	<tr>
       		<?php include("logo.php");?>      
        </tr>
        <tr>
            <td>
              <label for="f_init">Fecha inicio: </label><br/><input style="text-align: center" name="f_init" type="date" id="f_init" size="14" />
            </td>
            <td>
              <label for="f_fin">Fecha fin: </label><br/><input style="text-align: center" name="f_fin" type="date" id="f_fin" size="14" />
            </td>
            <td>
            <?php 
              $data = $modeloContacto->consultar("select * from contactos where tipo_familar='2' order by nombre_contact ASC");
             // print_r($data);
            ?>

              <label for="cliente">Cliente: </label><br/>
              <select style="width: 160px;height: 25px;" name="cliente">
                  <option selected="selected">---Seleccionar---</option>

                  <?php foreach ($data as $contacto) {
                    echo "<option value=".$contacto['id']." >".ucwords(strtolower($contacto['nombre_contact']." ".$contacto['apellido_contact']))."</option>";
                  } ?>
              </select>
            </td>
        </tr>
            <td>
                <input type="submit" value="Generar"/>
            </td>
        <tr>
        </tr>
       </table>
       </form>
     </fieldset>
    </div>
   </div>

   <div id="sidebar">
   <div>
    <a href="../../menu_admin_comer.php"><img alt="" height="38" src="../images/home_1.jpg" style="float: right" width="38"></a>
     <a href="../../salir.php">
    <img alt="" height="32" src="../images/candado.png" style="float: right" width="35"></a>
      <div align="right"></div>

    </div>

    <div class="sidebar_section">
        <h2>Cartera por edades</h2>
        <div class="sidebar_section_content">
          <ul class="categories_list">
                         <lu></lu>
            
                     
           <li><a href="recibos_caja_mini.php">Recibos de Caja</a>
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
            <li><a href="#"><strong>Cartera por edades</strong></a>
                 <lu></lu>
            </li>
                  </ul></div>
      </div>
      <div class="cleaner_h30"></div>
      <div class="sidebar_section">
        <h2>Historias Clinicas</h2>
        <div class="sidebar_section_content">
                  <div class="cleaner"></div>
        </div>
      </div>
    </div>
</div>	
<div id="content_wrapper_bottom"></div>

<div id="footer">
   Copyright © 2013 <a href="#">BLUESOFTWARE-CLINIGES</a>  </div>
</body>
<script src="<?php echo base_url('lib/jquery/jquery-2.2.3.min.js'); ?>"></script>
</html>