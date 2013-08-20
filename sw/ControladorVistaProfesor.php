<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorVistaProfesor
 *
 * @author Chacon
 */
class ControladorVistaProfesor {

    //put your code here
    function verPreguntas() {
        if (isset($_POST['activarPreg'])) {
            header('Location: listarPreguntas.php');
        }
    }

    function verPreguntasActivas() {
        if (isset($_POST['preguntasActivas'])) {
            header('Location: listarPreguntasActivas.php');
        }
    }

    function iniciarClase() {
        include_once 'ServicioPreguntas.php';
        if (isset($_POST['iniciarClase'])) {
            $servicioPreguntas = new ServicioPreguntas();
            $servicioPreguntas->eliminarRespuestas();
            header('Location: Pregunta.php');
        }
    }

}

?>
