<?php
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseempresa.php";

    class EmpresaAdapter{
       static function registrarEmpresa($empresa){
           $con=new ConeccionRealDivisas();
           $hash=hash('sha512',$empresa->contrasena);
            $sql="INSERT INTO `realdivisas`.`empresa`
            (`razonSocial`,
            `ruc`,
            `celular`,
            `correo`,
            `contrasena`,
            `nombre`,
            `apellido`,
            `tipoDocumento`,
            `documento`,
            `profesion`,
            `genero`) 
            VALUES (
            '$empresa->razonSocial',
            '$empresa->ruc',           
            '$empresa->celular',
            '$empresa->correo',
            '$hash',
            '$empresa->nombre',
            '$empresa->apellido',
            '$empresa->tipoDocumento',
            '$empresa->documento',
            '$empresa->profesion', 
            '$empresa->genero');";            

            echo $sql;
            $id=$con->insert($sql);
            return $id;
       }


        static function verficarDatos($correo, $contrasena){
            $con=new ConeccionRealDivisas();
            $hash=hash('sha512',$contrasena);
            $sql="SELECT id
            FROM `realdivisas`.`empresa` 
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
                    razonSocial,
                    ruc,
                    celular,
                    correo,
                    nombre,
                    apellido,
                    tipoDocumento,
                    documento,
                    profesion,
                    genero
            FROM `realdivisas`.`empresa` 
            WHERE id=$id; ";
            $tabla = $con->consulta($sql);
            if (count($tabla) > 0) {
            return Empresa::desdePersona($tabla[0]);
            }
            return null;

        }


        static function listar(){
            $con = new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`empresa`;";
            $tabla=$con->consulta($sql);
            $empresa=[];
            foreach($tabla as $fila){
                $empresa[]=Empresa::desdeFila($fila);
            }
            return $empresa;


        }



        static function contarNumeroDeEmpresas(){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`empresa`;";
            $cantidadEmpresas=$con->cantidadDeUsuarios($sql);
            return $cantidadEmpresas;
        }




    }
?>