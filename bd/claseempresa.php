<?php 
    class Empresa{
        public $id;
        public $razonSocial;
        public $ruc;
        public $celular;
        public $correo;
        public $contrasena;
        public $nombre;
        public $apellido;
        public $tipoDocumento;
        public $documento;
        public $profesion;
        public $genero;

        function __construct ($id,$razonSocial,$ruc,$celular,$correo,$contrasena,$nombre,$apellido,$tipoDocumento,$documento,$profesion,$genero){
            $this->id = $id;
            $this->razonSocial = $razonSocial;
            $this->ruc = $ruc;  
            $this->celular = $celular;
            $this->correo = $correo;
            $this->contrasena = $contrasena;  
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->tipoDocumento = $tipoDocumento;
            $this->documento = $documento;
            $this->profesion = $profesion;
            $this->genero = $genero;
        }

        static function desdeFila($fila)
        {
        $persona = new Empresa(
            $fila['id'],
            $fila['razonSocial'],
            $fila['ruc'],
            $fila['celular'],
            $fila['correo'],
            $fila['contrasena'],
            $fila['nombre'],
            $fila['apellido'],
            $fila['tipoDocumento'],
            $fila['documento'],
            $fila['profesion'],
            $fila['genero']
        );
        return $persona;
        }
        
        static function desdePersona($fila){
            $empresa=Empresa::desdeFila($fila);
            $empresa->id=$fila['id'];
            $empresa->razonSocial=$fila['razonSocial'];
            $empresa->ruc=$fila['ruc'];
            $empresa->celular=$fila['celular'];
            $empresa->correo=$fila['correo'];
            $empresa->contrasena=$fila['contrasena'];
            $empresa->nombre=$fila['nombre'];
            $empresa->apellido=$fila['apellido'];
            $empresa->tipoDocumento=$fila['tipoDocumento'];
            $empresa->documento=$fila['documento'];
            $empresa->profesion=$fila['profesion'];
            $empresa->genero=$fila['genero'];
            return $empresa;
        }
    }
?>