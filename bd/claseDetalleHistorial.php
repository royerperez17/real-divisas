<?php 
    class Historial{
        public $idDetalleHistorial;
        public $idUsuario;
        public $codigoOperacion;
        public $fecha;
        public $montoOrigen;
        public $montoDestino;
        public $costoCompra;
        public $costoVenta;
        public $idDatosTransaccion;

        function __construct ($idDetalleHistorial,$idUsuario,$codigoOperacion,$fecha,$montoOrigen,$montoDestino,$costoCompra,$costoVenta,$idDatosTransaccion){
            $this->idDetalleHistorial = $idDetalleHistorial;
            $this->idUsuario = $idUsuario;
            $this->codigoOperacion = $codigoOperacion;
            $this->fecha = $fecha;
            $this->montoOrigen = $montoOrigen;
            $this->montoDestino = $montoDestino;
            $this->costoCompra = $costoCompra;
            $this->costoVenta = $costoVenta;
            $this->idDatosTransaccion=$idDatosTransaccion;
        }

        // conectar con los datos/comprarar con la base de datos
        static function desdeFila($fila)
        {
        $historial = new Historial(
            $fila['idDetalleHistorial'],
            $fila['idUsuario'], 
            $fila['codigoOperacion'],
            $fila['fecha'],
            $fila['montoOrigen'],
            $fila['montoDestino'],
            $fila['costoCompra'],
            $fila['costoVenta'],
            $fila['idDatosTransaccion']
        );
        return $historial;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeHistorial($fila){
            $historial=Historial::desdeFila($fila);
            $historial->idDetalleHistorial=$fila['idDetalleHistorial'];
            $historial->idUsuario=$fila['idUsuario'];
            $historial->codigoOperacion=$fila['codigoOperacion'];
            $historial->fecha=$fila['fecha'];
            $historial->montoOrigen=$fila['montoOrigen'];
            $historial->montoDestino=$fila['montoDestino'];
            $historial->costoCompra=$fila['costoCompra'];
            $historial->costoVenta=$fila['costoVenta'];
            $historial->idDatosTransaccion=$fila['idDatosTransaccion'];
            return $historial;
        }
    }
?>