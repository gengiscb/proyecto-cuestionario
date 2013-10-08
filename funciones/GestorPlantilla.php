<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorPlantilla
 *
 * @author Chacon
 */
class GestorPlantilla {

    public function formCerrarSesion() {
        $formCerrarSesion = '<form align="right" class="formCerrar" action="' . $_SERVER["PHP_SELF"] . '" method="post">
                                <input type="submit" class="button button-pill button-primary button-sesion" name="cerrar" value="Cerrar sesion" />        
                            </form>';
        return $formCerrarSesion;
    }
    
    public function regresarPagina(){
        $formRegresar = '<a class="button3" id="regresar" name="btn_regresar"  href="javascript:window.history.back();">&laquo; Volver atr&aacutes</a>';
        
        return $formRegresar;
    }


    public function estilos(){
        $estilos = '<link href="css/Estilos.css" rel="stylesheet" type="text/css" />';
        return $estilos;
    } 
}

?>
