<?php 
    class Administrador{
        public $idAdministrador;
        public $dni;
        public $contrasena;

        function __construct ($idAdministrador,$dni,$contrasena){
            $this->idAdministrador = $idAdministrador;
            $this->dni = $dni;
            $this->contrasena = $contrasena;

        }



        static function desdeFila($fila)
        {
        $administrador = new Administrador(
            $fila['idAdministrador'],
            $fila['dni'],
            $fila['contrasena']
        );
        return $administrador;
        }


        static function desdePersona($fila){
            $administrador=Administrador::desdeFila($fila);
            $administrador->idAdministrador=$fila['idAdministrador'];
            $administrador->dni=$fila['dni'];
            $administrador->contrasena=$fila['contrasena'];
            return $administrador;
        }


    }


?>