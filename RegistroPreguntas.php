<?php
include_once 'config.inc.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'ControladorPreguntas.php';

$agregarPregunta= new ControladorPreguntas();
$agregarPregunta->agregarPregunta();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8/Unicode">
    </head>
    <body>

        <div class="contenido">
            <div class="marco_registro">            
                <fieldset class="registro">
                    <h1>Registro Preguntas</h1>
                    <!--                    include_php/_gestion_login.php-->
                    <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="charger" >
                        <input name="MAX_FILE_SIZE" value="8388608" type="hidden">
                        <input name="image" accept="image/jpeg" type="file" id="image">
                        <div class="rowElem">
                            <label for="materia"> Materia:</label>                          	  
                            <input class="text" type="text" name="materia" id="materia" value="" />
                        </div>
                        <div class="rowElem">
                            <label for="unidad"> Unidad:</label>                          	  
                            <input class="text" type="text" name="unidad" id="unidad" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="descripcion"> Descripci&oacuten :</label>   
                            <input class="text" type="text" name="descripcion" id="descripcion" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="pregunta"> Pregunta :</label>   
                            <input class="text" type="text" name="pregunta" id="pregunta" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="respcor"> Respuesta Correcta :</label>   
                            <input class="text" type="text" name="respuestaCorrecta" id="respuestaCorrecta" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp1"> Respuesta 1 :</label>   
                            <input class="text" type="text" name="respuesta1" id="respuesta1" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp2"> Respuesta 2 :</label>   
                            <input class="text" type="text" name="respuesta2" id="respuesta2" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp3"> Respuesta 3 :</label>   
                            <input class="text" type="text" name="respuesta3" id="respuesta3" value="" />
                        </div>
       
                        <div class="rowElem">
                            <input type="hidden" name="registrar_pregunta" value="registrar"/>
                            <input type="submit"  name="btn_registrar" class="boton"  id="registrar" value="Guardar Pregunta"/>
                        </div>
                        
                    </form>
                </fieldset>
            </div>
        </div>
    </body>
</html>