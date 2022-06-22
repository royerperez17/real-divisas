<?php
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseCuentaTerceros.php";

    class CuentaTercerosAdapter{
        static function registrarCuentaTerceros($cuentaTerceros){
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`cuenta_terceros`
            (`idUsuario`,
            `pertenencia`,
            `tipoDocumento`,
            `numeroDocumento`,
            `nombreCompleto`,
            `correo`,
            `ocupacion`,
            `bancos`,
            `numeroCuenta`,
            `tipoCuenta`,
            `moneda`,
            `aliasCuenta`)
            VALUES
            ('$cuentaTerceros->idUsuario',
            '$cuentaTerceros->pertenencia',
            '$cuentaTerceros->tipoDocumento',
            '$cuentaTerceros->numeroDocumento',
            '$cuentaTerceros->nombreCompleto',
            '$cuentaTerceros->correo',
            '$cuentaTerceros->ocupacion',
            '$cuentaTerceros->bancos',
            '$cuentaTerceros->numeroCuenta',
            '$cuentaTerceros->tipoCuenta',
            '$cuentaTerceros->moneda',
            '$cuentaTerceros->aliasCuenta'
            );";
            
            $id=$con->insert($sql);
            echo $sql;
            return $id;
        }

        static function verficarDatos($idcuentaTerceros){
            $con=new ConeccionRealDivisas();
            $sql="SELECT id
            FROM `realdivisas`.`cuenta_terceros` 
            WHERE idCuentaTerceros='$idCuentaTerceros';";
            // echo $sql;
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
                return $tabla[0]['id'];
            }
            return false;
        }

         static function listar($idUsuario){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`cuenta_terceros`
             WHERE idUsuario=$idUsuario;";
            // echo $sql;
            $tabla=$con->consulta($sql);
            $cuentasTerceros=[];
            foreach($tabla as $fila){
                $cuentasTerceros[]=CuentaTerceros::desdeFila($fila);
            }
                return $cuentasTerceros;
        }



    }
?>