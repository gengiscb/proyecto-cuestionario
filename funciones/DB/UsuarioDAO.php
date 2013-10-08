<?php
include_once 'ConexionGeneral.php';
include_once 'funciones/domain/Usuario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuarioDAO extends ConexionGeneral{
    public function insertarUsuario($nombre,$apellido,$tipoUsuario){
        $exito = false;
        $conexionDB = $this->abrirConexion();
        $sql = "INSERT INTO usuarios(nombre, apellido, tipoUsuario) VALUES (\"".$nombre.
                "\",\"".$apellido."\",".$tipoUsuario.");";
        if($this->ejecutarConsulta($sql, $conexionDB)){
            $exito = true;
        }
        $this->cerrarConexion($conexionDB);
        return $exito;
    }
    
    public function existeUsuario($nombre, $apellido) {
        $conexion = $this->abrirConexion();
        $existeUsuario = true;
        $query = "SELECT * FROM usuarios WHERE nombre = '" . mysql_real_escape_string($nombre) . "' AND apellido = '" . mysql_real_escape_string($apellido) . "'  ";
        $lresult = $this->ejecutarConsulta($query, $conexion);
        if (!$lresult) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_num_rows($lresult) === 0)
                $existeUsuario = false;
        }        
        return $existeUsuario;
    }
    
    public function seleccionarUsuarioPorNombre($usuarioNombre) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM usuarios WHERE nombre ='" . mysql_real_escape_string($usuarioNombre) . "'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $usuario=null;
        while ($fila = mysql_fetch_array($resultado)) {
            $usuario = new Usuario($fila["usuarioId"], $fila["nombre"], $fila["apellido"], $fila["tipoUsuario"]);
            return $usuario;
        }
        $this->cerrarConexion($conexion);        
        return $usuario;
    }
}
?>
