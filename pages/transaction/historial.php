<?php 
error_reporting(0);
 	require_once __DIR__."/../../bd/detalleHistorialAdapter.php";
	require_once __DIR__."/../../bd/usuarioAdapter.php";
    require_once __DIR__.'/../../tools/HttpTools.php';
	require_once __DIR__."/../../bd/personaAdapter.php";
    require_once __DIR__."/../../bd/empresaAdapter.php";


	HttpTools::iniciarSesion();
	
	$persona=HttpTools::getClient();
	$usuario=UsuarioAdapter::listarDatosCliente($persona->id);
	foreach($usuario as $u){
	$historial=HistorialAdapter::listar($u->idUsuario);
		
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/historial.css">
  <title>Historial - Real Divisas</title>
  <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
	<header class="header">
      <a href="/index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
      <span class="titulo">HISTORIAL</span>
   </header>
	<div class="content-body">

    <!-- primero body de transacciones en progreso -->

		<!-- <div class="transaction-progress">
			<p class="transaccion">TRANSACCIÓN EN CURSO</p>
			<div class="line"></div> -->

      <!-- contenido de las transacciones en progreso -->

			<!-- <div class="body-transaction-progress">
				<section class="content-info">
					<div class="info">
						<img id="circulo" src="/assets/img/circulo-rojo.png" alt="">
						<p>Por averiguar</p>
					</div>
					<div class="info">
						<img id="circulo" src="/assets/img/circulo-amarillo.png" alt="">
						<p>Por pagar</p>
					</div>
					<div class="info">
						<img id="circulo" src="/assets/img/circulo-verde.png" alt="">
						<p>Finalizada</p>
					</div>
				</section>
				<section class="info-transaction">
					<div class="codigo-operacion">
						<img id="circulo" src="/assets/img/circulo-amarillo.png" alt="">
						<p>Cod. operacion <br>RD673351</p>
					</div>
					<div class="dinero-operacion">
						<p>s/340.00</p>
						<img src="/assets/img/intercambiar.png" alt="">
						<p>$/340.00</p>
					</div>
					<p>Fecha</p>
					<p id="fecha">30/03/22</p>
					</section>
				</div>
			</div> -->


		<!-- segundo body de transacciones realizadas -->
		<div class="transaction-made">
			
			<p class="transaccion">TRANSACCIONES REALIZADAS</p>
			<div class="line"></div>
			<div class="body-transaction-made">
			<?php foreach ($historial as $h):?>
				<section class="content-transaction-made">
					<div class="codigo-operacion">
						<img id="circulo" src="/assets/img/circulo-verde.png" alt="">
						<p>Cod. operacion <br><?php echo $h->codigoOperacion;?></p>
					</div>
					<div class="dinero-operacion">
						<p>enviaste: <?php echo $h->montoOrigen;?></p>
						<img src="/assets/img/intercambiar.png" alt="">
						<p>recibiste: <?php echo $h->montoDestino;?></p>
					</div>
					<div class="fecha-operacion">
						<p>Fecha</p>
						<p id="fecha"><?php echo $h->fecha;?></p>
					</div>
				</section>
				<?php endforeach;?>
				<section class="content-transaction-made">
						<!-- aun falta agregar aca xd  -->
				</section>
			</div>
		</div>
		<div class="return"><a href="account.php">VOLVER</a></div>
		</div>
  	

  
</body>
</html>