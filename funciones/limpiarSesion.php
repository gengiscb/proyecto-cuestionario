<?php
include_once 'config.inc.php';
include_once 'controladores/ControladorProfesor.php';
$limpiarSesion= new ControladorProfesor();
$limpiarSesion->limpiarSesion();

?>
