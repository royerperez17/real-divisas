<?php 
    class DatosHistorial{
        public $idDatosHistorial;
        public $bancoEnvio;
        public $bancoRecibes;
        public $origenFondos;

        function __construct ($idDatosHistorial,$bancoEnvio,$bancoRecibes,$origenFondos){
            $this->idDatosHistorial = $idDatosHistorial;
            $this->bancoEnvio = $bancoEnvio;
            $this->bancoRecibes = $bancoRecibes;
            $this->origenFondos = $origenFondos;
        }

        // conectar con los datos/comprarar con la base de datos
        static function desdeFila($fila)
        {
        $datoshistorial = new DatosHistorial(
            $fila['idDatosHistorial'],
            $fila['bancoEnvio'],
            $fila['bancoRecibes'],
            $fila['origenFondos']
        );
        return $datoshistorial;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeHistorial($fila){
            $datoshistorial=DatosHistorial::desdeFila($fila);
            $datoshistorial->idDatosHistorial=$fila['idDatosHistorial'];
            $datoshistorial->bancoEnvio=$fila['bancoEnvio'];
            $datoshistorial->bancoRecibes=$fila['bancoRecibes'];
            $datoshistorial->origenFondos=$fila['origenFondos'];
            return $datoshistorial;
        }
    }
?>