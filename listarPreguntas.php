<? ob_start(); ?>
<?php
include_once 'config.inc.php';
include_once 'funciones/controladores/ControladorPreguntas.php';
include_once 'funciones/GestorPlantilla.php';
include_once 'funciones/Sesion.php';

$gestorPlantilla = new GestorPlantilla();
$gestorPlantilla->regresarPagina();
$listarPreguntas = new ControladorPreguntas();
$sesion = new Sesion();
$sesion->filtroSesion();
$sesion->filtroPorfesor();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/buttons.css">
        <!--<link rel="stylesheet" href="css/Estilos.css">-->
        <link rel="stylesheet" href="css/style.css">

        <?php echo $gestorPlantilla->estilos() ?>
        <title></title>
    </head>
    <body >
        <div class="contenedorEncabezado">
            <h1>Preguntas</h1>
            <h1>Habilitar Preguntas</h1>
        </div>
        <div>
            <div class="contenedorCentral">
                <div class="contenido" >
                    <div class="marco" >
                        <div class="preguntas">
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                                <?php
                                echo $listarPreguntas->listarPreguntas();
                                $listarPreguntas->redireccionarProfesor();
                                ?>
                            </form> 

                        </div>
                    </div>
                </div>
            </div>
            <div class="contenedorPie">
                <?php
                echo $gestorPlantilla->regresarPagina();
                ?>
            </div> 
        </div>
    </div>
</body>
</html>
<? ob_flush(); ?>