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
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/buttons.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <div class="contenido">
            <div class="marco_registro"> 
                
                   
                    
                    <div id="wrapper">
                    <form class="registro-form"enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="charger"  >
                        
                         <div class="header">
                        <h1>Registro Preguntas</h1>
                    <!--                    include_php/_gestion_login.php-->
                        </div>
                        
                        <div class="content">
                            <div class="rowElem">
                            <div class="titulo">
                            <h4 class="subtitulo">Por favor suba una imagen de m&aacute;ximo 1MB</h4>
                        </div>
                            <label for="unidad" style="font-weight: bold"> Imagen:</label>
                        <input name="MAX_FILE_SIZE" value="8388608" type="hidden">
                        <input name="image" class="input materia" accept="image/jpeg" type="file" id="image">
                        </div>
                        <div class="rowElem">
                            <label for="materia" style="font-weight: bold"> Materia:</label>                          	  
                            <input name="materia" type="text" class="input materia" id="materia" value="" size="50" maxlength="50"/>
                        </div>
                        
                        <div class="rowElem">
                            <label for="unidad" style="font-weight: bold"> Unidad:</label>                          	  
                            <input class="input unidad" type="text" name="unidad" id="unidad" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="descripcion" style="font-weight: bold"> Descripci&oacuten :</label>   
                            <input class="input descipcion" type="text" name="descripcion" id="descripcion" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="pregunta" style="font-weight: bold"> Pregunta :</label>   
                            <input class="input pregunta" type="text" name="pregunta" id="pregunta" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="respcor" style="font-weight: bold"> Respuesta Correcta :</label>   
                            <input class="input correcta" type="text" name="respuestaCorrecta" id="respuestaCorrecta" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp1" style="font-weight: bold"> Respuesta Incorrecta :</label>   
                            <input class="input incorrecta" type="text" name="respuesta1" id="respuesta1" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp2" style="font-weight: bold"> Respuesta Incorrecta :</label>   
                            <input class="input incorrecta" type="text" name="respuesta2" id="respuesta2" value="" />
                        </div>
                        <div class="rowElem">
                            <label  for="resp3" style="font-weight: bold"> Respuesta Incorrecta :</label>   
                            <input class="input incorrecta" type="text" name="respuesta3" id="respuesta3" value="" />
                        </div>
                        
                      </div>
       
                        <div class="footer">
                            <input type="hidden" name="login" value="login"/>
                            <input type="submit"  name="btn-sesion" class="button2"  id="acceder" value="Guardar Pregunta"/>
                        </div>
                        
                    </form>
                    </div>
            </div>
        </div>
    </body>
</html>