<?php
include_once 'config.inc.php';
include_once 'funciones/Sesion.php';
$sesion = new Sesion();
$sesion->sesionActiva();
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
        <title>Inicio de Sesi&oacute;n</title>

        <!--STYLESHEETS-->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/Validacion.css" rel="stylesheet" type="text/css" />
        <link href="css/buttons.css" rel="stylesheet" type="text/css" />

        <!--SCRIPTS-->
        <script type="text/javascript" src="js/jquery2.min.js"></script>
        <!--Slider-in icons-->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".username").focus(function() {
                    $(".user-icon").css("left", "-48px");
                });
                $(".username").blur(function() {
                    $(".user-icon").css("left", "0px");
                });

                $(".password").focus(function() {
                    $(".pass-icon").css("left", "-48px");
                });
                $(".password").blur(function() {
                    $(".pass-icon").css("left", "0px");
                });
            });
        </script>

    </head>
    <body id="bodylogin">

        <!--WRAPPER-->
        <div id="wrapper">

            <!--SLIDE-IN ICONS-->
            <div class="user-icon"></div>
            <div class="pass-icon"></div>
            <!--END SLIDE-IN ICONS-->
            <!--LOGIN FORM-->
            <form name="login-form" class="login-form"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                <!--HEADER-->
                <div class="header">
                    <!--TITLE--><h1>Iniciar Sesi&oacute;n</h1><!--END TITLE-->
            <!--    DESCRIPTION<span>Fill out the form below to login to my super awesome imaginary control panel.</span>END DESCRIPTION-->
                </div>
                <!--END HEADER-->

                <!--CONTENT-->
                <div class="content">
                    <!--USERNAME--><input name="nombre" type="text" class="input username" value="Nombre" id="usuario" onfocus="this.value = ''" /><!--END USERNAME-->
                    <!--PASSWORD--><input name="apellido" type="password" class="input password" value="Apellido" id="password" onfocus="this.value = ''" /><!--END PASSWORD-->
                    <?php
                    echo $sesion->iniciarSesion();
                    ?>
                </div>
                <!--END CONTENT-->
                <!--FOOTER-->
                <div class="footer">
                    
                    <input type="hidden" name="login" value="login"/>
                    <!--LOGIN BUTTON--><input type="submit" name="btn_sesion"  id="acceder" value="Iniciar" class="button2" /><!--END LOGIN BUTTON-->
                    <h4>¿Eres Alumno?</h4>
                    <span id="span_registro"><a style="color:darkblue; font-size:110%;" href="registroAlumnos.php">Registrate aqui!</a></span>
                </div>
                <!--END FOOTER-->

            </form>
            <!--END LOGIN FORM-->
        </div>
        <!--END WRAPPER-->

        <!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

    </body>
</html>