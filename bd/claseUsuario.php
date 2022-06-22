<?php 

    class Usuario{
        public $idUsuario;
        public $idPersona;
        public $idEmpresa;

        function __construct($idUsuario, $idPersona, $idEmpresa){
            $this-> idUsuario =$idUsuario;
            $this-> idPersona =$idPersona;
            $this-> idEmpresa =$idEmpresa;
        }

        static function desdeFila($fila){
        $usuario = new Usuario(
            $fila['idUsuario'],
            $fila['idPersona'],
            $fila['idEmpresa']
        );
        return $usuario;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeUsuario($fila){
            $usuario=Usuario::desdeFila($fila);
            $usuario->idUsuario=$fila['idUsuario'];
            $usuario->idPersona=$fila['idPersona'];
            $usuario->idEmpresa=$fila['idEmpresa'];
            return $usuario;
        }




    }




?>