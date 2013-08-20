<?php
include_once 'DB/UsuarioDAO.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ServicioUsuario{
    public function agregarUsuario($nombre, $apellido, $tipoUsuario){
     $usuarioDAO = new UsuarioDAO();
     if(!$usuarioDAO->existeUsuario($nombre, $apellido)){
         $usuarioDAO->insertarUsuario($nombre, $apellido, $tipoUsuario);
         return true;
     }else{
         return false;
     }
    }
}
?>
