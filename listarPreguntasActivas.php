<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
include_once 'sw/ControladorVistaProfesor.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';

$listarPreguntas = new ControladorPreguntas();
$controladorVista = new ControladorVistaProfesor();
$gestorPlantilla = new GestorPlantilla();
$gestorPlantilla->regresarPagina();
$sesion = new Sesion();
$sesion->filtroSesion();
$sesion->filtroPorfesor();
$sesion->cerrarSesion();
$controladorVista->iniciarClase();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/unicode">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/buttons.css">
        <link rel="stylesheet" href="css/Estilos.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Preguntas Activas</title>
    </head>
    <body id="profesores">
        <div class="contenedorEncabezado" >
            <?php echo $gestorPlantilla->formCerrarSesion(); ?>
            <h1>Preguntas Activas</h1>
        </div>
        <div class="contenedorCentral">
            <div id="activos">
                <?php
                echo $listarPreguntas->listarPreguntasActivadas();
                ?>
            </div>
        </div>
        <div class="contenedorPie">
            <?php
            echo $gestorPlantilla->regresarPagina();
            ?>
        </div>
    </body>
</html>
