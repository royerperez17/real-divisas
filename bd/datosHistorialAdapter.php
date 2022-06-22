<?php 
    require_once __DIR__."/coneccion.php";
    require_once __DIR__."/claseDatosHistorial.php";

    class DatosHistorialAdapter{

        static function registrarDatosHistorial($datoshistorial){
            $con=new ConeccionRealDivisas();
            $sql="INSERT INTO `realdivisas`.`datos_historial`
            (`bancoEnvio`,
            `bancoRecibes`,
            `origenFondos`)
            VALUES
            ('$datoshistorial->bancoEnvio',
            '$datoshistorial->bancoRecibes',
            '$datoshistorial->origenFondos'
            );";

            // echo $sql;
            $id=$con->insert($sql);
            return $id;
        }






    }


?>