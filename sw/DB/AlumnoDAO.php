<?php

include_once 'sw/DB/ConexionGeneral.php';
include_once 'sw/domain/Usuario.php';

/**
 * Description of AlumnoDAO
 *
 * @author Chacon
 */
class AlumnoDAO extends ConexionGeneral{

    function calificarAlumno($idAlumno, $aciertos, $calificacion) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM calificaciones WHERE idAlumno= $idAlumno";
        $existe = $this->ejecutarConsulta($sql, $conexion);
        if (!$existe) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
        if (mysql_num_rows($existe) > 0) {
            $sql = "UPDATE calificaciones SET aciertos=$aciertos, calificacion=$calificacion WHERE idAlumno = $idAlumno";
        } else {
            $sql = "INSERT INTO calificaciones VALUES ($idAlumno,$aciertos,$calificacion)";
        }
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }
    
    function obtenerCalificacion($idAlumno){
        $conexion = $this->abrirConexion();
        $sql = "SELECT calificacion FROM calificaciones WHERE idAlumno = $idAlumno";
        $calificacion = $this->ejecutarConsulta($sql, $conexion);
        if (!$calificacion) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
        echo $calificacion;
        return $calificacion;
    }


    public function obtenerAlumnosAprobados($idProfesor) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT ";
    }

}

?>
