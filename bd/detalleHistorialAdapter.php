<?php 
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseDetalleHistorial.php";

    class HistorialAdapter{

        static function registrarDetalleHistorial($historial){
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`detalle_historial`
            (`idUsuario`,
            `codigoOperacion`,
            `fecha`,
            `montoOrigen`,
            `montoDestino`,
            `costoCompra`,
            `costoVenta`,
            `idDatosTransaccion`)
            VALUES
            ('$historial->idUsuario',
            '$historial->codigoOperacion',
            '$historial->fecha',
            '$historial->montoOrigen',
            '$historial->montoDestino',
            '$historial->costoCompra',
            '$historial->costoVenta',
            '$historial->idDatosTransaccion'
            );";

            // echo $sql;
            $id=$con->insert($sql);
            return $id;
        }


        static function listar($idUsuario){
            $con = new ConeccionRealDivisas();
            $sql="SELECT * FROM realdivisas.detalle_historial 
            WHERE idUsuario=$idUsuario
            ;";
        
            // echo $sql;
            $tabla=$con->consulta($sql);
            $detalles=[];
            foreach($tabla as $fila){
                $detalles[]=Historial::desdeHistorial($fila);
            }
            return $detalles;


        }





    }


?>