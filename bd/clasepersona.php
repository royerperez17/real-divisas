<?php 
    class Persona{
        public $id;
        public $tipoDocumento;
        public $numeroDocumento;
        public $nombre;
        public $apellido;
        public $fechaNacimiento;
        public $numeroTelefono;
        public $correo;
        public $contrasena;
        // public $confirmarContrasena;

        function __construct ($id,$tipoDocumento,$numeroDocumento,$nombre,$apellido,$fechaNacimiento,$numeroTelefono,$correo,$contrasena){
            $this->id = $id;
            $this->tipoDocumento = $tipoDocumento;
            $this->numeroDocumento = $numeroDocumento;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->numeroTelefono = $numeroTelefono;
            $this->correo = $correo;
            $this->contrasena=$contrasena;
            // $this->confirmarContrasena = $confirmarContrasena;
        }

        // conectar con los datos/comprarar con la base de datos
        static function desdeFila($fila)
        {
        $persona = new Persona(
            $fila['id'],
            $fila['tipoDocumento'],
            $fila['numeroDocumento'],
            $fila['nombre'],
            $fila['apellido'],
            $fila['fechaNacimiento'],
            $fila['numeroTelefono'],
            $fila['correo'],
            $fila['contrasena']
        );
        return $persona;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdePersona($fila){
            $persona=Persona::desdeFila($fila);
            $persona->id=$fila['id'];
            $persona->tipoDocumento=$fila['tipoDocumento'];
            $persona->numeroDocumento=$fila['numeroDocumento'];
            $persona->nombre=$fila['nombre'];
            $persona->apellido=$fila['apellido'];
            $persona->fechaNacimiento=$fila['fechaNacimiento'];
            $persona->numeroTelefono=$fila['numeroTelefono'];
            $persona->correo=$fila['correo'];
            $persona->contrasena=$fila['contrasena'];
            return $persona;
        }
    }
?>