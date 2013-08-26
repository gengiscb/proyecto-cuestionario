<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';

$sesion = new Sesion();
$controladorPregunta = new ControladorPreguntas();
$gestorPlantilla = new GestorPlantilla();

$sesion->filtroSesion();
$sesion->cerrarSesion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/unicode">
        <link rel="stylesheet" href="css/font-awesome.min.css"></link>
        <link rel="stylesheet" href="css/buttons.css"></link>
        <link rel="stylesheet" href="css/Estilos.css"></link>
        <link rel="stylesheet" href="css/style.css"></link>
        <title>Resultados</title>
    </head>
    <body>
        <div align="right">
            <?php echo $gestorPlantilla->formCerrarSesion() ?>
        </div>
        <div>
            <?php
            echo "Promedio de aprobados: ";
            echo "Promedio general: "
            ?>
        </div>
        <div>
            <?php
            echo $gestorPlantilla->regresarPagina();
            ?>
        </div>
    </body>
</html>
