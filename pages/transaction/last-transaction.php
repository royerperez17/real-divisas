<?php 
	require_once __DIR__."/../../bd/personaAdapter.php";
	require_once __DIR__."/../../bd/empresaAdapter.php";
  	require_once __DIR__."/../../bd/usuarioAdapter.php";
	require_once __DIR__."/../../bd/detalleHistorialAdapter.php";
	require_once __DIR__."/../../bd/voucherAdapter.php";
	require_once __DIR__."/../../tools/httpTools.php";
	require_once __DIR__."/../../tools/fileTools.php";
	
	HttpTools::iniciarSesion();
	$cliente=HttpTools::getClient();
	$idUsuario=UsuarioAdapter::traerDatosPorIdCliente($cliente->id);

		$imagentransaccion="";
		$voucher=new Voucher(0,$imagentransaccion,$idUsuario);
		$id=VoucherAdapter::crear($voucher);
		if($id != null){
			if(isset($_FILES['imagen'])){
				$path=FileTools::subirImagenes($_FILES['imagen'],"vouchers",$id);
				$voucher=voucherAdapter::obtenerUno($id);
				$voucher->imagentransaccion= $path;
				voucherAdapter::actualizarVoucher($voucher);

				if($_FILES['imagen']){
					header('location: account.php');
				} else{
					echo"transaccion no realizada";
				}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel ="stylesheet" text="text/css" href="/assets/css/last-transaction.css">
    <title>Real Divisas | cambia de forma segura</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
	<center>
   <div class="last-transaction">
      <h1>¡Último paso!</h1>
      <div class="imagenes-transaccion">
         <img id="telefono" src="/assets/img/telefono.png" alt="">
         <img src="/assets/img/soles.png" alt="">
         <img src="/assets/img/intercambiar.png" alt="">
         <img src="/assets/img/dolares.png" alt="">
      </div>
		<!-- <p id="transfiere-monto">Ahora transfiere el monto de</p>
		<p id="dinero-monto">S/. 3729.00</p> -->
		<p id="texto-cuenta">Desde tu banca por internet a la siguiente cuenta:</p>
		<div class="banco-empresa">
			<img src="/assets/img/bcp.png" alt="">
			<div class="cuenta-empresa">
				<p>Cuenta corriente en sóles <br>1922575802000</p>
				<img src="/assets/img/cuenta.png" alt="">	
			</div>
		</div>
		<p id="nombre-empresa">Real Divisas E.I.R.L - RUC 20606267925</p>
		<!-- <div class="detalle-transaccion">
			<div class="contenido-transaccion">
				<p>Recibiras:</p>
				<p id="monto">$ 1000.00</p>
			</div>
		</div> -->
		<p id="texto-transaccion">Adjunte la captura de su operacion y dar click en “Completar Cambio”</p>
		<form  action="" method="POST"  enctype="multipart/form-data">
		<div class="subir-imagen">
			<input  type="file" name="imagen" accept="image/png, image/jpeg" required>
			<!-- <img src="/assets/img/flecha-hacia-abajo.png" alt=""> -->
		</div>
		<input class="continue-button" type="submit" name="completarCambio" value="COMPLETAR CAMBIO">
	</div>
</form>
</center>


</body>
</html>