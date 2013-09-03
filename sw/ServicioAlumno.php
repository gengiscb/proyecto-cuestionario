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
    
    public function obtenerPromedioAprobados(){
        $alumnoDAO = new AlumnoDAO();
        $alumnosAprobados = $alumnoDAO->obtenerCalificacionesAlumnosA();
        return $this->caclularPromedio($alumnosAprobados);
    }
    
    public function obtenerPromedioGeneral(){
        $alumnoDAO = new AlumnoDAO();
        $alumnosAprobados = $alumnoDAO->obtenerCalificacionesAlumnos();
        return $this->caclularPromedio($alumnosAprobados);
    }
    
    private function caclularPromedio($alumnos){
        $totalAlumnos = count($alumnos);
        $sumaCalificaciones =0;
        foreach ($alumnos as $alumno){
            $sumaCalificaciones += $alumno['calificacion'];
        }
        if($totalAlumnos>0){
            $promedio = $sumaCalificaciones/$totalAlumnos;
        }else{
            $promedio = 0;
        }
        return $promedio;
    }
    
}

?>
