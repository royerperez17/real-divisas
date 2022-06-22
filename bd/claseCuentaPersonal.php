<?php  
    class CuentaPersonal{
        public $idCuentaPersonal;
        public $idUsuario;
        public $bancos;
        public $numeroCuenta;
        public $tipoCuenta;
        public $moneda;
        public $aliasCuenta;

        function __construct ($idCuentaPersonal, $idUsuario, $bancos, $numeroCuenta, $tipoCuenta, $moneda, $aliasCuenta){
            $this->idCuentaPersonal = $idCuentaPersonal;
            $this->idUsuario = $idUsuario;
            $this->bancos = $bancos;
            $this->numeroCuenta = $numeroCuenta;
            $this->tipoCuenta = $tipoCuenta;
            $this->moneda = $moneda;
            $this->aliasCuenta = $aliasCuenta;
        }

        static function desdeFila($fila)
        {
        $cuentaPersonal = new CuentaPersonal(
            $fila['idCuentaPersonal'],
            $fila['idUsuario'],
            $fila['bancos'],
            $fila['numeroCuenta'],
            $fila['tipoCuenta'],
            $fila['moneda'],
            $fila['aliasCuenta']
        );
        return $cuentaPersonal;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeCuentaPersonal($fila){
            $cuentaPersonal=CuentaPersonal::desdeFila($fila);
            $cuentaPersonal->idCuentaPersonal=$fila['idCuentaPersonal'];
            $cuentaPersonal->idUsuario=$fila['idUsuario'];
            $cuentaPersonal->bancos=$fila['bancos'];
            $cuentaPersonal->numeroCuenta=$fila['numeroCuenta'];
            $cuentaPersonal->tipoCuenta=$fila['tipoCuenta'];
            $cuentaPersonal->moneda=$fila['moneda'];
            $cuentaPersonal->aliasCuenta=$fila['aliasCuenta'];
            return $cuentaPersonal;
        }

        
    }






?>