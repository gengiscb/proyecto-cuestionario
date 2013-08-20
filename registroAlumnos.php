<?php
include_once 'config.inc.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'ControladorAlumno.php';

$agregarAlumno= new ControladorAlumno();
$agregarAlumno->agregarAlumno();
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/Unicode">
        <link href="css/Estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/jqtransform.css" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.jqtransform.js"></script> 
    </head>
    <body>

        <div class="contenido">
            <div class="marco_registro">            
                <fieldset class="registro">
                    <h1>Registro Alumno</h1>
                    <!--                    include_php/_gestion_login.php-->
                    <form class="reg_alum" method="get" id="form_reg_alum" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                        <div class="rowElem">
                            <label for="nombre"> Nombre:</label>                          	  
                            <input class="text" type="text" name="nombre" id="nombre" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="apellido"> Apellido:</label>   
                            <input class="text" type="text" name="apellido" id="apellido" value="" />
                        </div>
                        
                        <div class="rowElem">
                            <input type="hidden" name="registrar_alumno" value="registrar"/>
                            <input type="submit"  name="btn_registrar" class="boton"  id="registrar" value="Registrar"/>
                            <input type="button" onclick="document.location = 'index.php';"  name="btn_regresar" class="boton"  id="regresar" value="Regresar"/>
                        </div>
                    </form>
                    <script type="text/javascript">
                            $(function() {
                                //find all form with class jqtransform and apply the plugin
                                $("form.reg_alum").jqTransform();
                            });
                    </script>
                </fieldset>
            </div>
        </div>
    </body>
</html>
