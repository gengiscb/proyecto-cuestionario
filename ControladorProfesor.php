<?php
include_once 'sw/ServicioProfesor.php';

class ControladorProfesor{
    
    public function limpiarSesion(){
        $servicioLimpiar = new ServicioProfesor();
        return $servicioLimpiar->limpiarTablas();
    }
}
?>
