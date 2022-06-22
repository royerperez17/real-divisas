<?php

class FileTools{
/**
 * Creamos el path donde se guardaran los archivos
 */
static function directorioUpload(){
  return $_SERVER['DOCUMENT_ROOT']
  .DIRECTORY_SEPARATOR.'assets'
  .DIRECTORY_SEPARATOR.'uploads'
  .DIRECTORY_SEPARATOR;
}

/**
 * Funcion para devolver el path del archivo subido
 */
static function pathUpload(){
  return '/assets/uploads/';
}
/**
 * Funcion para obtener el mimetype del archivo (.jpeg/.png etc)
 */

static function extensionDeArchivo($nombre){
  $lista=explode('.',$nombre);
  $extension=$lista[count($lista)-1];
  return $extension;
}
/**
 * Funcion para subir imagenes
 */
static function subirImagenes($imagen,$tipo,$id)
  {
    $destino = FileTools::directorioUpload();
    $destino = $destino . $tipo . DIRECTORY_SEPARATOR;
    $ext = FileTools::extensionDeArchivo($imagen['name']);
    $uuid = uniqid('', true);
    $nombre = "$tipo-$id-$uuid.$ext";
    $destino = $destino . $nombre;
    $res = move_uploaded_file($imagen['tmp_name'], $destino);
    // path
    $path = FileTools::pathUpload() . "$tipo/" . $nombre;
    return $path; 
  }
}