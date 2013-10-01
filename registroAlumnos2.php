<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
include_once 'ControladorAlumno.php';

$agregarAlumno = new ControladorAlumno();
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
        <link href="css/buttons.css" rel="stylesheet" type="text/css" />
        <link href="css/Validacion.css" rel="stylesheet" type="text/css" />
        <!--SCRIPTS-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
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
        <script type="text/javascript" language="javascript" src="js/scriptaculous/lib/prototype.js"></script>
        <script type="text/javascript" language="javascript" src="js/scriptaculous/src/scriptaculous.js"></script>
        <script type="text/javascript" language="javascript" src="js/jsvalidate.js"></script>
        <!--Slider-in icons-->
        

    </head>
    <body id="bodylogin">

        <!--WRAPPER-->
        <div id="wrapper">

            <!--SLIDE-IN ICONS-->
            <div class="user-icon"></div>
            <div class="pass-icon"></div>
            <!--END SLIDE-IN ICONS-->
            <?php
            $sesion = new Sesion();
            echo $sesion->iniciarSesion();
            echo $agregarAlumno->agregarAlumno();
            ?>
            <!--LOGIN FORM-->
            <form name="login-form" class="login-form"  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">

                <!--HEADER-->
                <div class="header">
                    <!--TITLE--><h1>Registro Alumnos</h1><!--END TITLE-->
            <!--    DESCRIPTION<span>Fill out the form below to login to my super awesome imaginary control panel.</span>END DESCRIPTION-->
                </div>
                <!--END HEADER-->

                <!--CONTENT-->
                <div class="content">
                    <!--USERNAME--><input name="nombre" type="text" class="input username jsrequired" value="Nombre" id="nombre" onfocus="this.value = ''" /><!--END USERNAME-->
                    <!--PASSWORD--><input name="apellido" type="text" class="input password jsrequired" value="Apellido" id="apellidoP" onfocus="this.value = ''" /><!--END PASSWORD-->
                </div>
                <!--END CONTENT-->

                <!--FOOTER-->
                <div class="footer">
                    <input type="hidden" name="registrar_alumno" value="registrar"/>
                    <!--LOGIN BUTTON--><input type="submit" name="btn_registrar"  id="acceder" value="Registrar" class="button2 registrar" /><!--END LOGIN BUTTON-->
                    <input type="button" class="button2 regresar" onclick="document.location = 'index.php';"  name="btn_regresar" class="boton" value="Regresar"/>
                </div>
                <!--END FOOTER-->

            </form>
            <!--END LOGIN FORM-->

        </div>
        <!--END WRAPPER-->

        <!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

    </body>
</html>