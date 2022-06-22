<?php
require_once __DIR__.'/coneccion.php';
require_once __DIR__.'/claseVoucher.php';

class VoucherAdapter{
  static function crear($voucher){
    $con=new ConeccionRealDivisas();
    $sql="INSERT INTO `realdivisas`.`vauchers`
    (
    `imagentransaccion`,
    `idUsuario`)
    VALUES
    ('$voucher->imagentransaccion',
    $voucher->idUsuario
    );";
    $id=$con->insert($sql);
    // echo $sql;
    return $id;
  }

 static function actualizarVoucher($voucher){
   $con = new ConeccionRealDivisas();
   $sql = "UPDATE `realdivisas`.`vauchers`
   SET 
  `imagentransaccion` = '$voucher->imagentransaccion'
  WHERE (`idVoucher` = $voucher->idVoucher);";
            
  $esCorrecto = $con->update($sql);
  // echo $sql;
  $con->cerrar();
  return $esCorrecto;
}




  static function obtenerUno($idVoucher){
    $con = new ConeccionRealDivisas();
     $sql = "SELECT * FROM `realdivisas`.`vauchers`
             WHERE idVoucher=$idVoucher";
                      // echo $sql;
    $tabla = $con->consulta($sql);
    if (count($tabla) > 0) {
      return Voucher::desdeFila($tabla[0]);
    } else {
      return NULL;
    }
  }



  
}