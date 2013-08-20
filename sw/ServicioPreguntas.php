<?php

include_once 'DB/PreguntasDAO.php';

class ServicioPreguntas {

    public function listarPreguntas() {
        $preguntasDAO = new PreguntasDAO();
        $resultado = $preguntasDAO->obtenerPreguntas();
        $resultadoHTML = "";
//        $resultadoHTML.="<form action='" . $_SERVER["PHP_SELF"] . "' method='post'>";
        for ($i = 0; $i < count($resultado); $i++) {
            $resultadoHTML.="<div class='pregunta'><input id='check" . $resultado[$i]['id'] . "' class='css-checkbox' type='checkbox' name='idPreguntas[]' value=" . $resultado[$i]['id'] . "/>";
            $resultadoHTML.="<label for='check" . $resultado[$i]['id'] . "' name='demo_lbl_1' class='css-label' >" . $resultado[$i]['descripcion'] . " -- ";
            $resultadoHTML.=$resultado[$i]['pregunta'];
            $resultadoHTML.="</label></div>";
        }
//        $resultadoHTML.="</form>";
        if (count($resultado) == 0) {
            $resultadoHTML.="<div class='preguntas'>No hay resultados</div>";
        } else {
            $resultadoHTML.="<input type='submit'class='button button-pill button-primary' name='activar' value='Activar'>";
        }
        return $resultadoHTML;
    }

    public function listarPreguntasActivadas() {
        $preguntasDAO = new PreguntasDAO();
        $resultado = $preguntasDAO->obtenerPreguntasActivas();
        $resultadoHTML = "";
        $resultadoHTML.="<form action='" . $_SERVER["PHP_SELF"] . "' method='post'>";
        if (count($resultado) != 0) {
            for ($i = 0; $i < count($resultado); $i++) {
                $resultadoHTML.="<input id='check" . $resultado[$i]['id'] . "' type='hidden' name='idPregunta' value=" . $resultado[$i]['id'] . ">";
                $resultadoHTML.="<label for='check" . $resultado[$i]['id'] . "' name='demo_lbl_1' class='css-label2' >" . $resultado[$i]['descripcion'] . " -- ";
                $resultadoHTML.=$resultado[$i]['pregunta'];
                $resultadoHTML.="</label><br/>";
            }
            $resultadoHTML.='<input class="botonMenu botonMenu-menu" class="button button-pill button-primary button-finalizar" type="submit" name="iniciarClase" value="Iniciar clase"></input>';
        } else {
            $resultadoHTML.="<div class='preguntas'>No hay resultados</div>";
        }
        return $resultadoHTML;
    }

    function obtenerIdPregActivas() {
        $preguntasDAO = new PreguntasDAO();
        $resultado = $preguntasDAO->obtenerPreguntasActivas();
        $ids = Array();
        for ($i = 0; $i < count($resultado); $i++) {
            $ids[$i] = $resultado[$i]['id'];
        }
        return $ids;
    }

    function activarPregunta($id) {
        $preguntasDAO = new PreguntasDAO();
        $preguntasDAO->cambiarEstado($id, "activa");
    }

    function desactivarPreguntas() {
        $preguntasDAO = new PreguntasDAO();
        $preguntasDAO->desactivaPreguntas();
        $preguntasDAO->eliminarRespuestas();
    }

    public function mostrarPregunta($idPregunta) {
        $preguntasDAO = new PreguntasDAO();
        $resultado = $preguntasDAO->obtenerPregunta($idPregunta);
        $resultadoHTML = "" + $idPregunta;
        if ($resultado != 0) {
            $respuestas = $preguntasDAO->obtenerRespuestas($idPregunta);
            $resultadoHTML.="<form action='" . $_SERVER["PHP_SELF"] . "' method='post'><table width='40%'><tr><td colspan='4' align='center'>" . $resultado['materia'] . " Unidad " . $resultado['unidad'] . "</td></tr><tr><td colspan='4' align='center'><img src='#' width='400px' height='300'/></td></tr>";
            $resultadoHTML.="<input type='hidden' name='idPregunta' value='" . $idPregunta . "' />";
            $resultadoHTML.="<tr><td colspan='4' align='justify'> " . $resultado['descripcion'] . "</td></tr>";
            $resultadoHTML.="<tr><td colspan='4' align='center'>" . $resultado['pregunta'] . "</td></tr>";
            $i=0;
            foreach ($respuestas as $respuesta) {
                $resultadoHTML.="
                   <tr>
                     <td colspan='4' align='left' >
                           <input id='resp$i'type='radio' name='respuesta' value='$respuesta' onchange='habilitarSiguiente(this.form)'> 
                          <label for='resp$i' > $respuesta </label>
                     </td>
                  </tr>";
                $i++;
            }
            $resultadoHTML.="<tr><td colspan='4' align='right'><input id='botonSig' type='submit' onclick='' name ='botonSig' value='Siguiente' disabled></input></td></tr>";
            $resultadoHTML.="</table></form>";
        } else {
            $resultadoHTML.="<div class='preguntas'>No hay resultados</div>";
        }
        return $resultadoHTML;
    }

    function enviarRespuesta($idAlumno, $idPregunta, $respuestaAlumno) {
        $respuestaDAO = new PreguntasDAO();
        if ($respuestaDAO->preguntaResuelta($idAlumno, $idPregunta)) {
            $respuestaDAO->actualizarRespuesta($idAlumno, $idPregunta, $respuestaAlumno);
        } else {
            $respuestaDAO->enviarRespuesta($idAlumno, $idPregunta, $respuestaAlumno);
        }
    }

    function calificarCuestionario() {
        $resultado = new PreguntasDAO();
        $aciertos = count($resultado->obtenerPreguntasCorrectas($_SESSION['usuarioId']));
        $resultado->calificarAlumno($_SESSION['usuarioId'], $aciertos);
        return "Aciertos: " . $aciertos;
    }

    function eliminarRespuestas() {
        $resultado = new PreguntasDAO();
        return $resultado->eliminarRespuestasUsuario($_SESSION['usuarioId']);
    }

    function agregarPregunta($materia, $unidad, $descripcion, $estado, $pregunta, $imagen, $respuestaCorrecta, $respuesta1, $respuesta2, $respuesta3) {
        $resultado = new PreguntasDAO();
        if ($resultado->agregarPregunta($materia, $unidad, $descripcion, $estado, $pregunta, $imagen, $respuestaCorrecta, $respuesta1, $respuesta2, $respuesta3)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>