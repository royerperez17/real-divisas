<?php 

class Voucher{
    public $idVoucher;
    public $imagentransaccion;
    public $idUsuario;

    function __construct($idVoucher, $imagentransaccion, $idUsuario){
        $this->idVoucher = $idVoucher;
        $this->imagentransaccion = $imagentransaccion;
        $this->idUsuario = $idUsuario;

    }

    static function desdeFila($fila)
        {
        $voucher = new Voucher(
            $fila['idVoucher'],
            $fila['imagentransaccion'],
            $fila['idUsuario']
        );
        return $voucher;
        }
        

        // para traer los datos y convertirlos en array asosiativo
        static function desdeVoucher($fila){
            $voucher=Voucher::desdeFila($fila);
            $voucher->idVoucher=$fila['idVoucher'];
            $voucher->imagentransaccion=$fila['imagentransaccion'];
            $voucher->idUsuario=$fila['idUsuario'];
            return $voucher;
        }

}





?>