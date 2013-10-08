<?php

include_once 'ConexionGeneral.php';

class PreguntasDAO extends ConexionGeneral {

    function obtenerPreguntas() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM preguntas";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $indice = 0;
        $lista = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $lista[$indice] = $fila;
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    function cambiarEstado($id, $estado) {
        $conexion = $this->abrirConexion();
        $sql = "UPDATE preguntas SET estado = '" . $estado . "' WHERE id ='" . $id . "'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }

    function obtenerPreguntasActivas() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM preguntas WHERE estado='activa'";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $indice = 0;
        $lista = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $lista[$indice] = $fila;
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    function desactivaPreguntas() {
        $conexion = $this->abrirConexion();
        $sql = "UPDATE preguntas SET estado = 'desactivada'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "Error, no se desactivo las preguntas.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }

    function eliminarRespuestas() {
        $conexion = $this->abrirConexion();
        $sql = "DELETE FROM resultadosalumno";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "Error.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }
    
    function eliminarRespuestasUsuario($idAlumno) {
        $conexion = $this->abrirConexion();
        $sql = "DELETE FROM resultadosalumno WHERE idAlumno = $idAlumno";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "Error.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }

    function eliminarCalificacionUsuario($idAlumno) {
        $conexion = $this->abrirConexion();
        $sql = "DELETE FROM calificaciones WHERE idAlumno = $idAlumno";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "Error.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }
    
    function obtenerImagen($idPregunta){
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM preguntas WHERE id=" . $idPregunta . " and estado='activa'";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $contenido = mysql_fetch_array($resultado_peticion);
        $this->cerrarConexion($conexion);
        return $contenido;
    }

    function obtenerPregunta($idPregunta) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM preguntas WHERE id=" . $idPregunta . " and estado='activa'";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $fila = mysql_fetch_array($resultado_peticion);
        $this->cerrarConexion($conexion);
        return $fila;
    }

    function obtenerRespuestas($idPregunta) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT respuesta1, respuesta2, respuesta3, respuestaCorrecta FROM respuestas WHERE idPregunta=" . $idPregunta;
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $fila = mysql_fetch_array($resultado_peticion);
        $respuestas = array($fila['respuesta1'], $fila['respuesta2'], $fila['respuesta3'], $fila['respuestaCorrecta']);
        shuffle($respuestas);
        return $respuestas;
    }

    function preguntaResuelta($idAlumno, $idPregunta) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM resultadosalumno WHERE idAlumno=" . $idAlumno . " and idPregunta=" . $idPregunta;
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        if (mysql_num_rows($resultado_peticion) >= 1) {
            $resuelto = true;
        } else {
            $resuelto = false;
        }
        $this->cerrarConexion($conexion);
        return $resuelto;
    }

    function actualizarRespuesta($idAlumno, $idPregunta, $respuestaAlumno) {
        $conexion = $this->abrirConexion();
        $sql = "UPDATE resultadosalumno SET respuestaAlumno='$respuestaAlumno' WHERE idAlumno = '$idAlumno' AND idPregunta = '$idPregunta'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible actualizar su respuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }

    function enviarRespuesta($idAlumno, $idPregunta, $respuestaAlumno) {
        $conexion = $this->abrirConexion();
        $sql = "INSERT INTO resultadosalumno VALUES ($idAlumno,$idPregunta,'$respuestaAlumno')";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }

    function obtenerPreguntasCorrectas($usuarioId) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM resultadosalumno ra JOIN respuestas r ON ra.respuestaAlumno = r.respuestaCorrecta JOIN preguntas p ON r.idPregunta = p.id WHERE ra.idAlumno='$usuarioId' and p.estado='activa'";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $indice = 0;
        $lista = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $lista[$indice] = $fila;
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    
    
    function agregarPregunta($materia, $unidad,$descripcion,$estado, $pregunta, $imagen,$respuestaCorrecta,$respuesta1,$respuesta2,$respuesta3){
        $conexion = $this->abrirConexion();
        $sql = "INSERT INTO preguntas(materia,unidad,descripcion,estado,pregunta,imagen) VALUES ('$materia','$unidad','$descripcion','$estado','$pregunta','$imagen')";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No se guardo la pregunta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        } else {
            $ultimo_id = mysql_insert_id($conexion);
            $respuestasSQL = "INSERT INTO respuestas(idPregunta,respuesta1,respuesta2,respuesta3,respuestaCorrecta) VALUES ($ultimo_id,'$respuesta1','$respuesta2','$respuesta3','$respuestaCorrecta')";
            $resultadoRespuestas = $this->ejecutarConsulta($respuestasSQL, $conexion);
            return $resultadoRespuestas;
        }
    }

}

?>