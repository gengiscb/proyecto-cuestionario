<? ob_start(); ?>
<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
include_once 'GestorPlantilla.php';

$gestorPlantilla = new GestorPlantilla();
$gestorPlantilla->regresarPagina();
$listarPreguntas = new ControladorPreguntas();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode">
           <link rel="stylesheet" href="css/font-awesome.min.css">
           <link rel="stylesheet" href="css/buttons.css">
           <link rel="stylesheet" href="css/Estilos.css">
           <link rel="stylesheet" href="css/style.css">

        <?php echo $gestorPlantilla->estilos() ?>
        <title></title>
    </head>
    <body id="profesores">
        <div class="contenido" >
            <h1>Preguntas</h1>
            <div class="marco" >
                <h1>Habilitar Preguntas</h1>
                <div>
                    <div class="preguntas">
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                            <?php
                            echo $listarPreguntas->listarPreguntas();
                            $listarPreguntas->redireccionarProfesor();
                            ?>
                        </form> 

                    </div>

        </div>
                                   <div>
                        <?php
                        echo $gestorPlantilla->regresarPagina();
                        ?>
                    </div>                         
    </body>
</html>
<? ob_flush(); ?>