<?php  
    class CuentaTerceros{
        public $idCuentaTerceros;
        public $idUsuario;
        public $pertenencia;
        public $tipoDocumento;
        public $numeroDocumento;
        public $nombreCompleto;
        public $correo;
        public $ocupacion;
        public $bancos;
        public $numeroCuenta;
        public $tipoCuenta;
        public $moneda;
        public $aliasCuenta;

        function __construct ($idCuentaTerceros, $idUsuario, $pertenencia, $tipoDocumento, $numeroDocumento, $nombreCompleto, $correo, $ocupacion, $bancos, $numeroCuenta, $tipoCuenta, $moneda, $aliasCuenta){
            $this->idCuentaTerceros = $idCuentaTerceros;
            $this->idUsuario = $idUsuario;
            $this->pertenencia = $pertenencia;
            $this->tipoDocumento = $tipoDocumento;
            $this->numeroDocumento = $numeroDocumento;
            $this->nombreCompleto = $nombreCompleto;
            $this->correo = $correo;
            $this->ocupacion = $ocupacion;
            $this->bancos = $bancos;
            $this->numeroCuenta = $numeroCuenta;
            $this->tipoCuenta = $tipoCuenta;
            $this->moneda = $moneda;
            $this->aliasCuenta = $aliasCuenta;
        }

        static function desdeFila($fila)
        {
        $cuentaTerceros = new CuentaTerceros(
            $fila['idCuentaTerceros'],
            $fila['idUsuario'],
            $fila['pertenencia'],
            $fila['tipoDocumento'],
            $fila['numeroDocumento'],
            $fila['nombreCompleto'],
            $fila['correo'],
            $fila['ocupacion'],
            $fila['bancos'],
            $fila['numeroCuenta'],
            $fila['tipoCuenta'],
            $fila['moneda'],
            $fila['aliasCuenta']
        );
        return $cuentaTerceros;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeCuentaPersonal($fila){
            $cuentaTerceros=Persona::desdeFila($fila);
            $cuentaTerceros->idCuentaTerceros=$fila['idCuentaTerceros'];
            $cuentaTerceros->idUsuario=$fila['idUsuario'];
            $cuentaTerceros->pertenencia=$fila['pertenencia'];
            $cuentaTerceros->tipoDocumento=$fila['tipoDocumento'];
            $cuentaTerceros->numeroDocumento=$fila['numeroDocumento'];
            $cuentaTerceros->nombreCompleto=$fila['nombreCompleto'];
            $cuentaTerceros->correo=$fila['correo'];
            $cuentaTerceros->ocupacion=$fila['ocupacion'];
            $cuentaTerceros->bancos=$fila['bancos'];
            $cuentaTerceros->numeroCuenta=$fila['numeroCuenta'];
            $cuentaTerceros->tipoCuenta=$fila['tipoCuenta'];
            $cuentaTerceros->moneda=$fila['moneda'];
            $cuentaTerceros->aliasCuenta=$fila['aliasCuenta'];
            return $cuentaTerceros;
        }


    }



?>