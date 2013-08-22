<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';
;

$sesion = new Sesion();
$controladorPregunta = new ControladorPreguntas();
$gestorPlantilla = new GestorPlantilla();

$sesion->filtroSesion();
$sesion->cerrarSesion();
$preguntas = $controladorPregunta->obtenerIdPreguntasActivas();
$controladorPregunta->cargarSiguiente();
$controladorPregunta->finalizarCuestionario();

//$idPreguntas = $contoladorPregunta->obtenerIdPreguntasActivas();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode" />
           <link rel="stylesheet" href="css/font-awesome.min.css"></link>
           <link rel="stylesheet" href="css/buttons.css"></link>
           <link rel="stylesheet" href="css/Estilos.css"></link>
           <link rel="stylesheet" href="css/style.css"></link>
           <!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
           <script type="text/javascript" src="js/buttons.js"></script>
           
        <title>Cuestionario Alumno</title>
    </head>
    <script>
        function habilitarSiguiente(form){
            form.botonSig.disabled = false;
        }
    </script>
    <body id="alumnos">
        <div align="right">
            <?php
            if (count($preguntas) != 0) {
                if (!(isset($_SESSION['numPregunta']))) {
                    $_SESSION['numPregunta'] = 0;
                }
                if (count($preguntas) <= $_SESSION['numPregunta']) {
                    echo '<div class= "preguntas">No hay mas preguntas</div>';
                    $_SESSION['numPregunta'] = 0;
                    echo '<div><form action="'.$_SERVER["PHP_SELF"].'" method="post">
                <input type="submit"class="button button-pill button-primary button-finalizar" name="finalizar" value="Finalizar" />        
            </form><div>';
                } else {
                    $idPregunta = $preguntas[$_SESSION['numPregunta']];
                }
            } else {
                echo $gestorPlantilla->formCerrarSesion();
                echo '<div class= "preguntas">No hay pregunta activas</div>';
            }
            ?>
        </div>
        <div align="center">
            <?php
            if (isset($idPregunta)) {
                echo $controladorPregunta->mostrarPregunta($idPregunta);
            }
            ?>
        </div>
        
        <div>
      <?php
         echo $gestorPlantilla->regresarPagina();
      ?>
        </div>
    </body>
</html>