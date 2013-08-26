<?php
include_once 'ServicioUsuario.php';
include_once 'DB/UsuarioDAO.php';
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
    
    public function obtenerPromedioAprobados($idProfesor){
        $alumnoDAO = new AlumnoDAO();
        $alumnosAprobados = $alumnoDAO->obtenerAlumnosAprobados($idProfesor);
        $numeroAprobados = count($alumnosAprobados);
    }
}

?>
