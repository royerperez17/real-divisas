<?php 
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseAdministrador.php";

    class AdministradorAdapter{

        static function registrarAdministrador($administrador){
            $hash=hash('sha512',$administrador->contrasena);
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`administrador`
            (`dni`,
            `contrasena`)
            VALUES
            ('$administrador->dni',
            '$hash');";

            // echo $sql;
            $id=$con->insert($sql);
            return $id;
        }



        static function verficarDatos($dni, $contrasena){
            $con=new ConeccionRealDivisas();
            $hash=hash('sha512',$contrasena);
            $sql="SELECT idAdministrador
            FROM `realdivisas`.`administrador` 
            WHERE dni='$dni' 
            AND contrasena='$hash';
            ";
            // echo $sql;
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
                return $tabla[0]['idAdministrador'];
            }
            return false;
        }




        static function perfilAdministrador($idAdministrador){
            $con=new ConeccionRealDivisas(); 
            $sql="SELECT idAdministrador,
                    dni 
            FROM `realdivisas`.`administrador` 
            WHERE idAdministrador=$idAdministrador; ";
            $tabla = $con->consulta($sql);
             if (count($tabla) > 0) {
            return Administrador::desdePersona($tabla[0]);
        }
        return null;
        }




    }




?>