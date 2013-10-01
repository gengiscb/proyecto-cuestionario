<?php

include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorAlumno {

    function agregarAlumno() {
        if (isset($_GET["btn_registrar"])) {
            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];
            
//            if (isset($nombre) && isset($apellido)) {
                $servicioAlumno = new ServicioAlumno();
                if ($servicioAlumno->agregarAlumno($nombre, $apellido)) {
                    $msj = "Usuario registrado";
                    header("Location: index.php");
                } else {
                    $msj = "Usuario existente o datos inorrectos";
                }
                return $msj;
            }
//        }
    }

}
?>
