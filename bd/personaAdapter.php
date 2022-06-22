<?php
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/clasepersona.php";

    class PersonaAdapter{


       static function registrarPersona($persona){
            $hash=hash('sha512',$persona->contrasena);
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`persona`
            (`tipoDocumento`,
            `numeroDocumento`,
            `nombre`,
            `apellido`,
            `fechaNacimiento`,
            `numeroTelefono`,
            `correo`,
            `contrasena`)
            VALUES
            ('$persona->tipoDocumento',
            '$persona->numeroDocumento',
            '$persona->nombre',
            '$persona->apellido',
            '$persona->fechaNacimiento',
            '$persona->numeroTelefono',
            '$persona->correo',
            '$hash'
            );";

            // echo $sql;
            $id=$con->insert($sql);
            return $id;
       }






       static function verficarDatos($correo, $contrasena){
            $con=new ConeccionRealDivisas();
            $hash=hash('sha512',$contrasena);
            $sql="SELECT id
            FROM `realdivisas`.`persona` 
            WHERE correo='$correo' 
            AND contrasena='$hash';
            ";
            // echo $sql;
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
                return $tabla[0]['id'];
            }
            return false;
        }




        static function perfilCliente($id){
            $con=new ConeccionRealDivisas(); 
            $sql="SELECT id,
                    tipoDocumento,
                    numeroDocumento,
                    nombre,
                    apellido,
                    fechaNacimiento,
                    numeroTelefono,
                    correo 
            FROM `realdivisas`.`persona` 
            WHERE id=$id; ";
            $tabla = $con->consulta($sql);
             if (count($tabla) > 0) {
            return Persona::desdePersona($tabla[0]);
        }
        return null;
        }



        static function listar(){
            $con = new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`persona`;";
            $tabla=$con->consulta($sql);
            $persona=[];
            foreach($tabla as $fila){
                $persona[]=Persona::desdeFila($fila);
            }
            return $persona;


        }



        static function contarNumeroDePersonas(){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`persona`;";
            $cantidadPersonas=$con->cantidadDeUsuarios($sql);
            return $cantidadPersonas;
        }




    }
?>