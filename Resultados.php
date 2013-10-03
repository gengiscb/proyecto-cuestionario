<?php
include_once 'config.inc.php';
include_once 'sw/ControladorVistaProfesor.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';

$sesion = new Sesion();
$controladorVista = new ControladorVistaProfesor();
$gestorPlantilla = new GestorPlantilla();

$sesion->filtroSesion();
$sesion->filtroPorfesor();
$sesion->cerrarSesion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/unicode">
       
           <link rel="stylesheet" href="css/buttons.css"></link>
        <link rel="stylesheet" href="css/Estilos.css"></link>
        <link rel="stylesheet" href="css/style.css"></link>
        <title>Resultados</title>
    </head>
    <body>
        <div align="center">
            <?php echo $gestorPlantilla->formCerrarSesion() ?>
        </div>
        
        <div align="center" id="stylized" class="myform">

            <?php
            echo "
                <p> Promedio de aprobados: " .  $controladorVista->verPromedioAbrobados()."
                </p><p>Promedio general: ". $controladorVista->verPromedioGeneral() . "</p>";
            ?>
        </div>
        <div>
            <?php
            echo $gestorPlantilla->regresarPagina();
            ?>
        </div>
    </body>
</html>
