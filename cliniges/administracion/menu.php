<?php
include("../sesion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Greeny</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
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
      <h1><a href="#"> <img src="../images/logo.png" alt="" /> <span></span> </a></h1>
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
	<legend style="color:#33CC00"><strong>ADMINISTRACION USUARIOS</strong></legend>
      
     <table align="center" style="width: 537px; height: 122px">
     <form action="insertar.php" method="post">

     <tr>
                <td width="155" ><div align="right">Usuario</div></td>
				
                <td width="144" ><input type="text" name="cedula" style="width:130px"  /></td>
                </tr>
				<tr>
                <td width="155" ><div align="right">Password</div></td>
				
                <td width="144" ><input type="text" name="pass"  style="width:130px"  /></td>
                </tr>
			<tr>
                <td width="50%"><div align="right">
                  <input type="submit" name="Submit" value="Registrar" />
                </div></td>
				<td width="50%"><input type="reset" name="Submit2" value="Limpiar" /></td>
				
				 
              </tr>

			
	</form>
			
</table>
</fieldset>
         </div>
    <div class="cleaner_h40"></div>
      </div>
  <!-- end of content -->
  <div id="sidebar">
   <div>
	  <a href="../index.php"><img alt="" height="38" src="../images/home_1.jpg" style="float: right" width="38" /></a>
	   <a href="../salir.php">
	  <img alt="" height="32" src="../images/candado.png" style="float: right" width="35" /></a>

	  </div>

    <div class="sidebar_section">
           <div class="sidebar_section_content">
        <ul class="categories_list">
         
                  <li><a href="cambiar_pass.php">Cambio de password</a></li>

          
                  
                 </ul>
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
    Copyright &copy; 2013 <a href="#">BLUESOFTWARE-CLINIGES</a></div>
<!-- end of footer -->
</body>
</html>
