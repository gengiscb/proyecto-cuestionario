<?php
include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorAlumno{
    function agregarAlumno(){
        if (isset($_GET["btn_registrar"])) {
            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];
            $servicioAlumno = new ServicioAlumno();            
            if($servicioAlumno->agregarAlumno($nombre, $apellido))
            {
                $msj="TRUE";
            }
            else{
                $msj="FALSE";
            }
            return $msj;
        }
    }
}
$agregarAlumno = new ControladorAlumno();
echo $agregarAlumno->agregarAlumno();

?>
