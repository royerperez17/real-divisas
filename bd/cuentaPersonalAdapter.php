<?php
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseCuentaPersonal.php";

    class CuentaPersonalAdapter{
        static function registrarCuentaPersonal($cuentaPersonal){
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`cuenta_personal`
            (`idUsuario`,
            `bancos`,
            `numeroCuenta`,
            `tipoCuenta`,
            `moneda`,
            `aliasCuenta`)
            VALUES
            ('$cuentaPersonal->idUsuario',
            '$cuentaPersonal->bancos',
            '$cuentaPersonal->numeroCuenta',
            '$cuentaPersonal->tipoCuenta',
            '$cuentaPersonal->moneda',
            '$cuentaPersonal->aliasCuenta');";
            
            $id=$con->insert($sql);
            echo $sql;
            return $id;
        }

        static function verficarDatos($idcuentapersonal){
            $con=new ConeccionRealDivisas();
            $sql="SELECT id
            FROM `realdivisas`.`cuenta_personal` 
            WHERE idCuentaPersonal='$idCuentaPersonal';";
            // echo $sql;
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
                return $tabla[0]['id'];
            }
            return false;
        }


        static function listar($idUsuario){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`cuenta_personal`
            WHERE idUsuario=$idUsuario;";
            // echo $sql;
            $tabla=$con->consulta($sql);
            $cuentasPersonales=[];
            foreach($tabla as $fila){
                $cuentasPersonales[]=CuentaPersonal::desdeFila($fila);
            }
                return $cuentasPersonales;
        }


    }
?>