<?php

include_once 'sw/DB/ConexionGeneral.php';
include_once 'sw/domain/Usuario.php';

/**
 * Description of AlumnoDAO
 *
 * @author Chacon
 */
class AlumnoDAO extends ConexionGeneral{

    function calificarAlumno($idAlumno, $aciertos) {
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
            $sql = "UPDATE calificaciones SET aciertos=$aciertos WHERE idAlumno = $idAlumno";
        } else {
            $sql = "INSERT INTO calificaciones VALUES ($idAlumno,$aciertos)";
        }
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }


    public function obtenerAlumnosAprobados($idProfesor) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT ";
    }

}

?>
