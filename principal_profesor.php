<?php
include_once 'sw/ControladorVistaProfesor.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';

$sesion = new Sesion();
$gestorPlantilla = new GestorPlantilla();
$controladorVista = new ControladorVistaProfesor();

$controladorVista->verPreguntas();
$controladorVista->verPreguntasActivas();
$controladorVista->iniciarClase();
$sesion->cerrarSesion();    
$sesion->filtroSesion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode" />
        <link rel="stylesheet" href="css/font-awesome.min.css"></link>
        <link rel="stylesheet" href="css/buttons.css"></link>
        <?php echo $gestorPlantilla->estilos() ?>
        <title>Principal Profesor</title>
    </head>

    <body id="profesores">
        <div align="right">
            <?php echo $gestorPlantilla->formCerrarSesion(); ?>
        </div>
        <div id="contenedorMenu" >
            <form method="post" id="menuProfesor" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                <div class="contenedorBoton">
                    <input class="botonMenu" type="submit" name="activarPreg" value="Activar preguntas"></input>
                </div>
                <div class="contenedorBoton">
                    <input class="botonMenu" type="submit" name="preguntasActivas" value="Ver preguntas activas"></input>
                </div>
                <div class="contenedorBoton">
                    <input class="botonMenu" type="submit" name="iniciarClase" value="Iniciar clase"></input>
                </div>
            </form>
        </div> 
    </body>
</html>