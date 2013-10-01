<? ob_start(); ?>
<?php

include_once 'sw/DB/UsuarioDAO.php';
include_once 'domain/Usuario.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Sesion {

    function iniciarSesion() {
        if (isset($_POST['login'])) {
            if (isset($_POST["nombre"]) && $_POST["nombre"] != "Nombre") {
                $nombre = $_POST["nombre"];
                if (isset($_POST["apellido"]) && $_POST["apellido"] != "Apellido") {
                    $apellido = $_POST["apellido"];
                    $usuarioDAO = new UsuarioDAO();
                    $usuario = $usuarioDAO->seleccionarUsuarioPorNombre($nombre);
                    if ($usuario != NULL) {
                        if ($nombre == trim($usuario->getNombre()) && $apellido == trim($usuario->getApellido())) {
                            if (session_id() == '') {
                                session_start();
                            }
                            $_SESSION['login'] = true;
                            $_SESSION['usuarioId'] = $usuario->getIdUsuario();
                            $_SESSION['nombre'] = $usuario->getNombre();
                            $_SESSION['apellido'] = $usuario->getApellido();
                            $_SESSION['tipo'] = $usuario->getTipoUsuario();
                            if ($usuario->getTipoUsuario() == 1) {
                                header("Location: principal_profesor.php");
                            } else if ($usuario->getTipoUsuario() == 2) {
                                header("Location: principal_alumno.php");
                            }
                        } else {
                            return "<div class='error'>Apellido incorrecto</div>";
                        }
                    } else {
                        $_SESSION['login'] = FALSE;
                        return "<div class='error'>Datos introducidos incorrectos</div>";
                    }
                } else {
                    return "<div class='error'>Escriba su apellido</div>";
                }
            } else {
                return "<div class='error'>Escriba su nombre</div>";
            }
        }
    }

    public function sesionActiva() {

        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if ($logueado) {
                if ($_SESSION['tipo'] == 2) {
                    header("Location: principal_alumno.php");
                } else if ($_SESSION['tipo'] == 1) {
                    header("Location: principal_profesor.php");
                }
            }
        }
    }

    function filtroSesion() {
        session_start();
        if (isset($_SESSION['login']) && isset($_SESSION['tipo'])) {
            if (!$_SESSION['login']) {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    }

    public function filtroPorfesor() {
        if ($_SESSION['tipo'] != 1) {
            header("Location: principal_alumno.php");
        }
    }

    public function cerrarSesion() {
        if (isset($_POST["cerrar"])) {
            session_start();
            $_SESSION = array();
            header("Location: index.php");
            session_destroy();
        }
    }

}

?>
<? ob_flush(); ?>
