<?php
include_once 'ConexionGeneral.php';

class ProfesorDAO extends ConexionGeneral{
    
    function limpiarTablas(){
        $conexion= $this->abrirConexion();
        $sql ="delete from usuarios where tipoUsuario=2";
        $sql2="truncate table calificaciones";
        $sql3="truncate table resultadosalumno";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible limpiar la sesion.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
        $resultado2 = $this->ejecutarConsulta($sql2, $conexion);
        if (!$resultado2) {
            $cerror = "No fue posible limpiar la sesion.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
        $resultado3 = $this->ejecutarConsulta($sql3, $conexion);
        if (!$resultado3) {
            $cerror = "No fue posible limpiar la sesion.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            echo $cerror;
        }
    }
}
?>
