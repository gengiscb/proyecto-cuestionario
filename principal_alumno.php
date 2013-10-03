<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
include_once 'GestorPlantilla.php';
include_once 'ControladorPreguntas.php';
include_once 'sw/ControladorVistaProfesor.php';

$gestorPlantilla = new GestorPlantilla();
$sesion = new Sesion();
$sesion->filtroSesion();
$sesion->cerrarSesion();

$controladorVista = new ControladorVistaProfesor();
$controladorVista->iniciarClase();

if(isset($_SESSION['encurso'])){
    if($_SESSION['encurso']==true){
        header('Location: Pregunta.php');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/Estilos.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css"></link>
        <link rel="stylesheet" href="css/buttons.css"></link>
        <link rel="stylesheet" href="css/style.css"></link>
        <title>Cuestionario Alumno</title>
    </head>

    <body id="alumnos">
        <div align="right">
            <?php echo $gestorPlantilla->formCerrarSesion() ?>
        </div>
        <div align="center">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                <input class="button button-pill button-primary button-iniciar" type="submit" name="iniciarClase" value="Iniciar"></input>
            </form>
            <?php
//            echo $controladorPregunta->obtenerAciertos();
            ?>
        </div> 
        <div>
            <?php
            if ($_SESSION['tipo'] == 1) {
                echo "<a href='principal_profesor.php' class='button3' name='btn_regresar'> Menu Profesores </a>";
            }
            ?>
        </div>

    </body>
</html>