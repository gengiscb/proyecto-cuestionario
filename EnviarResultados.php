<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
$enviarRespuesta= new ControladorPreguntas();
if(isset($_POST['respuesta'])){
    //echo "el valor del radio es: ".$_POST['respuesta'];
    $enviarRespuesta->enviarRespuesta("1", "5", $_POST['respuesta']);
}
?>
