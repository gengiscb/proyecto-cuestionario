<?php

include_once 'funciones/servicios/ServicioPreguntas.php';
include_once 'funciones/servicios/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorPreguntas {

    public function listarPreguntas() {
        $servicioPreguntas = new ServicioPreguntas();
        $resultado = $servicioPreguntas->listarPreguntas();
        $servicioPreguntas->desactivarPreguntas();
        return $resultado;
    }
    
    public function listarPreguntasActivadas() {
        $servicioPreguntas = new ServicioPreguntas();
        $resultado = $servicioPreguntas->listarPreguntasActivadas();
        return $resultado;
    }

    public function redireccionarProfesor() {
        if (isset($_POST['activar']) && ($_POST['activar'] == 'Activar')) {
            $this->activarSeleccionados();
            header('Location: principal_profesor.php');
        }
    }

    private function activarSeleccionados() {
        $servicioPreguntas = new ServicioPreguntas();
        if (isset($_POST['idPreguntas'])) {
            foreach ($_POST['idPreguntas'] as $checkbox) {
                $servicioPreguntas->activarPregunta($checkbox);
            }
        }
    }
    public function mostrarImagen($idPregunta){
        $servicioPreguntas = new ServicioPreguntas();
        $resultado = $servicioPreguntas->mostrarImagen($idPregunta);
        return $resultado;
    }

    public function mostrarPregunta($idPregunta) {
        $servicioPreguntas = new ServicioPreguntas();
        $resultado = $servicioPreguntas->mostrarPregunta($idPregunta);
        return $resultado;
    }
    
    public function enviarRespuesta($idAlumno, $idPregunta, $respuestaAlumno){
        $servicioPreguntas = new ServicioPreguntas();
        $resultado = $servicioPreguntas->enviarRespuesta($idAlumno, $idPregunta, $respuestaAlumno);
        return $resultado;
    }
    
    public function obtenerIdPreguntasActivas(){
        $servicioPreguntas = new ServicioPreguntas();
        return $servicioPreguntas->obtenerIdPregActivas();
    }
    
    public function cargarSiguiente(){
        if(isset($_POST['botonSig'])){
            if(isset($_POST['respuesta'])){
                $this->enviarRespuesta($_SESSION['usuarioId'], $_POST['idPregunta'], $_POST['respuesta']);
            }
            $_SESSION['numPregunta']++;
        }
    }
    
    public function calificacion(){
        $servicioPregunta = new ServicioPreguntas();
        return $servicioPregunta->calificarCuestionario();
    }
    
//    public function finalizarCuestionario(){
//        if(isset($_POST['finalizar'])){
//            header('Location: principal_alumno.php');
//        }
//    }
    
    function obtenerAciertos(){
        $servicioPreguntas = new ServicioPreguntas();
        return $servicioPreguntas->calificarCuestionario();
    }
    
    function eliminarRespuestas(){
        $servicioPreguntas = new ServicioPreguntas();
        return $servicioPreguntas->eliminarRespuestas();
    }
    
    function agregarPregunta(){
        if (isset($_POST["btn_registrar"]) && isset($_FILES["image"]) && $_FILES["image"]["size"] > 0) {
            $materia = $_POST["materia"];
            $unidad = $_POST["unidad"];
            $descripcion = $_POST["descripcion"];
            $estado="desactivada";
            $pregunta = $_POST["pregunta"];
            $tmpName = $_FILES["image"]["tmp_name"];
            $fp = fopen($tmpName, "r");
            $imagen = fread($fp, filesize($tmpName));
            $imagen = addslashes($imagen);
            fclose($fp);
            $respuestaCorrecta = $_POST["respuestaCorrecta"];
            $respuesta1 = $_POST["respuesta1"];
            $respuesta2 = $_POST["respuesta2"];
            $respuesta3 = $_POST["respuesta3"];
            //,$respuestaCorrecta,$respuesta1,$respuesta2,$respuesta3
           
            $servicioPreguntas = new ServicioPreguntas();         
            if($servicioPreguntas->agregarPregunta($materia, $unidad, $descripcion,$estado, $pregunta, $imagen,$respuestaCorrecta,$respuesta1,$respuesta2,$respuesta3 ))
            {
                $msj="TRUE";
            }
            else{
                $msj="FALSE";
            }
            return $msj;
        }
    }

}

?>
