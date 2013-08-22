<?php
include_once 'config.inc.php';
include_once 'ControladorPreguntas.php';
$controladorPregunta = new ControladorPreguntas();
//header('Content-type: image/jpg');
$image = $controladorPregunta->mostrarImagen($_GET['id']);
//$picsize =123;
$img = imagecreatefromstring($image);
if($img!==FALSE){
    header('Content-type: image/jpg');
    $picsize =300;
    $new_w = imagesx($img);
    $new_h = imagesx($img);
    $aspect_ratio = $new_h/$new_w;
    $new_w = $picsize;
    $new_h = abs($new_w * $aspect_ratio);
    $dst_img = imagecreatetruecolor($new_w, $new_h);
    imagecopyresized($dst_img, $img, 0,0, 0, 0, $new_w, $new_h, imagesx($img), imagesy($img));
    imagejpeg($dst_img,NULL,100);
    imagedestroy($image);
}else{
    echo 'error';
}

//$new_w = imagesx($image);
//$new_h = imagesy($image);
//$aspect_ratio = $new_h/$new_w;
//$new_w = $picsize;
//$new_h = abs($new_w * $aspect_ratio);
//$dst_img = imagecreate($new_w, $new_h);
//imagecopyresized($dst_img, $image, 0,0, 0, 0, $new_w, $new_h, imagesx($image), imagesy($image));
//echo imagejpeg($dst_img,'',100);
//echo $image;
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8/unicode" />
        <link rel="stylesheet" href="css/Estilos.css"></link>    
    </head>
    <body><div style=""></div></body>
</html>
