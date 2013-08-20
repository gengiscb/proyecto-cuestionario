<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Alumnos</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/Estilos.css" rel="stylesheet" type="text/css" />
<link href="css/buttons.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->
                <?php
                $sesion = new Sesion();
                echo $sesion->iniciarSesion();
                ?>
<!--LOGIN FORM-->
<form name="login-form" class="login-form"  action="ControladorAlumno.php" method="get">

	<!--HEADER-->
    <div class="header">
        <!--TITLE--><h1>Registro Alumnos</h1><!--END TITLE-->
<!--    DESCRIPTION<span>Fill out the form below to login to my super awesome imaginary control panel.</span>END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="nombre" type="text" class="input username" value="Nombre" id="nombre" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="apellido" type="text" class="input password" value="Apellido" id="apellidoP" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
        <input type="hidden" name="registrar_alumno" value="registrar"/>
        <!--LOGIN BUTTON--><input type="submit" name="btn_sesion"  id="acceder" value="Registrar" class="button2 registrar" /><!--END LOGIN BUTTON-->
                           <input type="button" class="button2 regresar" onclick="document.location = 'index.php';"  name="btn_regresar" class="boton"  id="regresar" value="Regresar"/>
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>