<?php

class HttpTools {

    static function redireccionar($ruta) {
      header("Location: $ruta");
      die();
    }

    /**
     * Valida si hay un cliente logeado 
     */
    static function validarClienteLogeado() {
        HttpTools::iniciarSesion();
        if (isset($_SESSION["cliente"])) {
        return true;
        } else {
        return false;
        }
    }


    static function ValidarAdministrador(){
      HttpTools::iniciarSesion();
      if (isset($_SESSION["administrador"])) {
        return true;
        } else {
        return false;
        }
    }


    /**
   * Esta funcion valida si hay un cliente logeado
   * Si no esta logeado lo lleva a una pagina 403
   */
  static function soloCliente() {
    $estaLogeado = HttpTools::validarClienteLogeado();
    if ($estaLogeado) {
      return;
    } else {
      // HttpTools::redireccionar("/p/errores/p403.php");
    }
  }

  static function iniciarSesion() {
    $status = session_status();
    if ($status != PHP_SESSION_ACTIVE) {
      session_start();
    }
  }


  // cuando inicie sesion que me liste los datos 
  static function getClient(){
    return $_SESSION['cliente'];
  }

  static function cerrarSesion() {
    HttpTools::iniciarSesion();
    $status = session_status();
    if ($status == PHP_SESSION_ACTIVE ) {
      session_destroy();
    }
  }
}

?>