<?php
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/clasePrecios.php";


    class PreciosAdapter{

        static function listar(){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM `realdivisas`.`administrar_precio`";
            $tabla=$con->consulta($sql);
            $precios=[];
            foreach($tabla as $fila){
            $precios[]=Precios::desdeFila($fila);
            }
            // echo $sql;
            return $precios;
        }

        static function AdministrarPrecio($precio){
            $con=new ConeccionRealDivisas();
            $sql= "UPDATE `realdivisas`.`administrar_precio`
            SET
            `precioCompra` = $precio->precioCompra,
            `precioVenta` =  $precio->precioVenta
            WHERE `id_Divisa` = $precio->id_Divisa;";

            $respuesta = $con -> update($sql);
            // echo $sql;
            return $respuesta;
        
        }

        // // obtener toos los datos dee una fila por una consicional
        // ejemplo: traer todos los datos cuando el apellido sea igual al apellido que requiereas
        static function obtenerUno($id_Divisa){
            $con=new ConeccionRealDivisas();
            $sql="SELECT * FROM
             `realdivisas`.`administrar_precio`
              WHERE `id_Divisa` = $id_Divisa; ";
            $tabla=$con -> consulta($sql);
            if(count($tabla) > 0){
                return Precios::desdeFila($tabla[0]);
            }else{
                return null;
            }
        }

    }




?>