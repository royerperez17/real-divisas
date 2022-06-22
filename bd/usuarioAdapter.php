<?php 
     require_once __DIR__."/coneccion.php";
     require_once __DIR__."/claseUsuario.php";

     class UsuarioAdapter{

         static function registrarUsuario($usuario){
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`usuario`
            (`idPersona`,
            `idEmpresa`)
            VALUES
            ('$usuario->idPersona',
            '$usuario->idEmpresa')";
            
            // echo $sql;
            $id=$con->insert($sql);
            return $id;

         }

        static function traerDatosPorIdCliente($id){
            $con=new ConeccionRealDivisas();
            $sql="SELECT idUsuario FROM 
            realdivisas.usuario
            WHERE idPersona=$id OR idEmpresa=$id;";  
            // echo $sql;
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
                return $tabla[0]['idUsuario'];
            }
            return false;

        }

        static function listarDatosCliente($idPersona){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM 
            `realdivisas`.`usuario`
             WHERE idPersona=$idPersona
              OR
               idEmpresa=$idPersona;";

            $tabla=$con->consulta($sql);
            // echo $sql;
            $usuario=[];
            foreach($tabla as $fila){
                $usuario[]=Usuario::desdeFila($fila);
            }
                return $usuario;

        }



        static function contarNumeroDeUsuarios(){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`usuario`;";
            $cantidadUsuarios=$con->cantidadDeUsuarios($sql);
            return $cantidadUsuarios;
        }




     }



?>