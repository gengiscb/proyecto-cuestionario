<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario {

    private  $idUsuario;
    private  $nombre;
    private  $apellido;
    private  $tipoUsuario;

    public function __construct($idUsuario,$nombre, $apellido, $tipoUsuario) {
        $this->idUsuario=$idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }


    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

}

?>
