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
        include_once 'funciones/servicios/ServicioPreguntas.php';
        if (isset($_POST['iniciarClase'])) {
            $_SESSION['encurso']=true;
            $servicioPreguntas = new ServicioPreguntas();
            $servicioPreguntas->eliminarRespuestas();
            header('Location: Pregunta.php');
        }
    }
    
    function registrarPreguntas(){
        if(isset($_POST['registroPreguntas'])){
            header('Location: RegistroPreguntas.php');
        }
    }
    
    function verResultados(){
        if(isset($_POST['resultados'])){
            header('Location: Resultados.php');
        }
    }
    
    function verPromedioAbrobados(){
        include_once 'funciones/servicios/ServicioAlumno.php';
        include_once 'funciones/DB/AlumnoDAO.php';
        $servicioAlumno = new ServicioAlumno();
        return $servicioAlumno->obtenerPromedioAprobados();
    }
    
    function verPromedioGeneral(){
        include_once 'funciones/servicios/ServicioAlumno.php';
        include_once 'funciones/DB/AlumnoDAO.php';
        $servicioAlumno = new ServicioAlumno();
        return $servicioAlumno->obtenerPromedioGeneral();
    }

}

?>
