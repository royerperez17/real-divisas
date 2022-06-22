<?php 
  	require_once __DIR__. "/../../bd/empresaAdapter.php";
  	require_once __DIR__. "/../../bd/personaAdapter.php";
  	require_once __DIR__. "/../../bd/datosHistorialAdapter.php";
	require_once __DIR__."/../../bd/cuentaPersonalAdapter.php";
	require_once __DIR__."/../../bd/cuentaTercerosAdapter.php";
	require_once __DIR__."/../../bd/usuarioAdapter.php";
	require_once __DIR__."/../../tools/httpTools.php";

	HttpTools::iniciarSesion();
  	$persona=HttpTools::getClient();
	$idUsuario=UsuarioAdapter::traerDatosPorIdCliente($persona->id);
	$cuentasTerceros=CuentaTercerosAdapter::listar($idUsuario);
	$CuentasPersonales=CuentaPersonalAdapter::listar($idUsuario);
// foreach($usuario as $user){
// 	echo $user;
// }

	if (isset($_POST['datosTransaccion'])){
		$bancoEnvio=$_POST['bancoEnvio'];
		$bancoRecibes=$_POST['bancoRecibes'];
		$origenFondos=$_POST['origenFondos'];

		$datosHistorial = new DatosHistorial(0, $bancoEnvio, $bancoRecibes, $origenFondos);
		$idDatosHistorial=DatosHistorialAdapter::registrarDatosHistorial($datosHistorial);
		if($idDatosHistorial != 0){
			header('location: /pages/transaction/last-transaction.php');
			
		 }else{
		  echo "no se creo la cuenta personal";
		}
	}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/transaction-data.css">
    <title>Real Divisas | cambia de forma segura</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
	<center>
	<form action="" method="POST">
   	<div class="datos-transaccion">
		<h1>COMPLETA LOS DATOS</h1>
		<p>Selecciona tu banco de envio y la cuenta donde recibes.</p>
		<div class="content-data">
			<select name="bancoEnvio" id="" required>
				<option value="" selected disabled>¿Desde que banco nos envía su dinero?</option>
				<?php foreach($cuentasTerceros as $cuentas):?>
					<option value="<?php echo $cuentas->aliasCuenta?>"><?php echo $cuentas->aliasCuenta?></option>
				<?php endforeach;?>
				<?php foreach($CuentasPersonales as $cuentas):?>
						<option value="<?php echo $cuentas->aliasCuenta?>"><?php echo $cuentas->aliasCuenta?></option>
				<?php endforeach;?>
			</select>
			<select name="bancoRecibes" id="" required>
				<option value="" selected disabled>¿En que cuenta recibiras tu dinero?</option>
				<?php foreach($cuentasTerceros as $cuentas):?>
					<option value="<?php echo $cuentas->aliasCuenta?>"><?php echo $cuentas->aliasCuenta?></option>
				<?php endforeach;?>
				<?php foreach($CuentasPersonales as $cuentas):?>
							<option value="<?php echo $cuentas->aliasCuenta?>"><?php echo $cuentas->aliasCuenta?></option>
				<?php endforeach;?>
			</select>
			<select name="origenFondos" required>
				<option value="" selected disabled>¿Declare el origen de fondos?</option>
				<option value="trabajoIndependiente">Trabajo Independiente</option>
				<option value="trabajoDependiente">Trabajo Dependiente</option>
				<option value="ahorros">Ahorros</option>
				<option value="herencia">Herencia</option>
			</select>
			<div class="agregar-cuenta">
				<a href="javascript:agregar()" id="letra-agregar">Agregar Cuenta</a>
				<a href="javascript:agregar()"><img src="/assets/img/mas.png"></a>
			</div>
		</div>

		<?php
        	require_once __DIR__."/../plantilla/agregar-cuentas.php"; 
    	?>

		<script src="/assets/js/agregar-cuentas.js"></script>

		<div class="buttons">
         <input class="continue-button" type="submit" name="datosTransaccion" value="Continuar">
         <a href="start-transaction.php">Cancelar</a>
      </div>
	</div>
	</form>
	</center>
</body>
</html>