<?php
include_once 'ServicioUsuario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ServicioAlumno{
    public function agregarAlumno($nombre, $apellido){
        $servicioUsuario = new ServicioUsuario();
        if($servicioUsuario->agregarUsuario($nombre, $apellido, 2)){
            return true;
        }
        else{
            return false;
        }
    }
}

?>
