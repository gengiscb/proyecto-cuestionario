<?php
include_once 'config.inc.php';

class ConexionGeneral{
    public function abrirConexion(){
        $conexion = @mysql_connect($GLOBALS["servidor"], $GLOBALS["usuarioDB"], $GLOBALS["contrasenaDB"]) or 
            die('<div class="error" style = "font-family:Arial,Helvetica, sans-serif; font-size: 20px;">Intente acceder luego ERROR : "'.mysql_error()).'"</div>';
        $this->seleccionarBD($conexion);
        return $conexion;
    }
    
    private function seleccionarBD($conexion){
        return @mysql_select_db($GLOBALS["base_datos"],$conexion);
    }
    
    public function ejecutarConsulta($query,$conexion){
        return mysql_query($query,$conexion);
    }
    
    public function cerrarConexion($conexion){
        return @mysql_close($conexion);
    }
}
?>
