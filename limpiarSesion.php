<?php
include_once 'config.inc.php';
include_once 'ControladorProfesor.php';
$limpiarSesion= new ControladorProfesor();
$limpiarSesion->limpiarSesion();

?>
