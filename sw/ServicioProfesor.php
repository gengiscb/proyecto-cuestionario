<?php
include_once 'DB/ProfesorDAO.php';

class ServicioProfesor{
    
    public function limpiarTablas(){
        $limpiarDAO = new ProfesorDAO();
        $limpiarDAO->limpiarTablas();
    }
}
?>
