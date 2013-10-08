<?php
include_once 'funciones/servicios/ServicioProfesor.php';

class ControladorProfesor{
    
    public function limpiarSesion(){
        $servicioLimpiar = new ServicioProfesor();
        return $servicioLimpiar->limpiarTablas();
    }
}
?>
