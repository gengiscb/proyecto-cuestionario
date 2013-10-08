<?php

include_once 'funciones/DB/ConexionGeneral.php';
include_once 'funciones/domain/Usuario.php';

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
        return mysql_fetch_array($calificacion);
    }


    public function obtenerCalificacionesAlumnosA() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM calificaciones c JOIN usuarios u ON c.idAlumno = u.usuarioId WHERE c.calificacion>=60 and u.tipoUsuario=2";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $alumnosAprobados = Array();
        $i = 0;
        while ($alumno = mysql_fetch_array($resultado)) {
            $alumnosAprobados[$i] = $alumno;
            $i++;
        }
        return $alumnosAprobados;
    }
    
    public function obtenerCalificacionesAlumnos() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM calificaciones c JOIN usuarios u ON c.idAlumno = u.usuarioId WHERE u.tipoUsuario=2";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $alumnosAprobados = Array();
        $i = 0;
        while ($alumno = mysql_fetch_array($resultado)) {
            $alumnosAprobados[$i] = $alumno;
            $i++;
        }
        return $alumnosAprobados;
    }
    
    public function obtenerAlumnosProfesor(){
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM usuarios WHERE tipoUsuario=2";
        $alumno = $this->ejecutarConsulta($sql, $conexion);
        if (!$alumno) {
            $cerror = "No se envio su repuesta.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
        return $alumno;
    }

}

?>
