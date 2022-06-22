<?php
require_once __DIR__.'/../../tools/httpTools.php';
require_once __DIR__.'/../../bd/clasepersona.php';
session_start();
$logeado=false;
$perfilCliente;

if(isset($_SESSION['cliente'])){
	$perfilCliente=$_SESSION['cliente'];
	$logeado=true;
}else{
	httpTools::redireccionar('/');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/account.css">
    <title>Mi cuenta - Real Divisas</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
	<header class="header">
		<a href="/index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
		<span class="titulo">MI CUENTA</span>
	</header>
	<div class="content">
		<div class="button-content">
			<div class="buttons">
				<a href="start-transaction.php">CAMBIAR DOLARES</a>
				<a href="historial.php">HISTORIAL</a>
			</div>
			<img src="/assets/img/xd.png" width="500" height="450" alt="">
			<div class="buttons">
				<a href="add-accounts.php">MIS CUENTAS</a>
				<!-- <a href="">EDITAR PERFIL</a> -->
			</div>
		</div>
	</div>

	<section class="content-steps">
      <p>¿Cómo Funciona?</p>
      <div class="steps">
         <div class="pasos">
            <img src="/assets/img/paso1.png" alt="">
            <p class="title-pasos">Cotiza tu Operación</p>
            <p>Cotiza el monto a cambiar y selecciona en que cuenta deseas recibirlo.</p>
         </div>
         <div class="pasos">
            <img src="/assets/img/paso2.png" alt="">
            <p class="title-pasos">Transfiere a Real Divisas </p>
            <p>Transfiere el monto de tu banca online a la cuenta Real Divisas  indicada y conservada el comprobante.</p>
         </div>
         <div class="pasos">
            <img src="/assets/img/paso3.png" alt="">
            <p class="title-pasos">Recibe tu Cambio</p>
            <p>Verifica tu operación ingresado el número de comprobante y recive el dinero a tu cuenta. </p>
         </div>
      </div>
   	</section>




































   <!-- <div class="contenido-prevencion">
	   <h1>LO QUE EVITAS SI CAMBIAS EN REAL DIVISAS</h1>
	   <div class="prevencion">

	   		<div clasS="evitar">
				<div class="titulo-prevencion">ESTAFAS O ROBO</div>
				<div class="texto-prevencion">
					<p>Evitas ser víctima de cambistas informales, de recibir billetes falsos, de robos mientras te cambian.</p>
					<p>Real Divisas trabaja bajo el respaldo de la SBS y también cuenta con una oficina presencial amplia y segura.</p>
					<img src="/assets/img/candado.png" alt="">
				</div>
			</div>

			<div clasS="evitar">
				<div class="titulo-prevencion">TIPO DE CAMBIO<br> DESFAVORABLE</div>
				<div class="texto-prevencion" id="estafas">
					<p>Evita que te paguen muy poco o  que te muy alto.</p>
					<p>Real divisas trabajo con un sistema actualizado al momento y mejorando las tasas para beneficiarte.</p>
					<img id="img-hucha-reloj"src="/assets/img/alcancia.png" alt="">
				</div>
			</div>

			<div clasS="evitar" id="tiempo-prevencion">
				<div class="titulo-prevencion">PERDER TIEMPO</div>
				<div class="texto-prevencion" id="estafas">
					<p>Evitas largas colas en los bancos, trasladarte y claro el tráfico.</p>
					<p>Real Dicvisas trabaja a nivel nacional con transferencias bancarias inmediatas.</p>
					<img id="img-hucha-reloj"src="/assets/img/despertador.png" alt="">
				</div>
			</div>

	   </div>
   </div> -->



   <div class="second-content">
      <!-- <img src="/assets/img/cuenta-img.png" alt="cambiar esta imagenxd"> -->
		<?php if($logeado):?>
			<div>
				<a href="/pages/transaction/cerrarSesion.php">Cerrar sesión</a>
			</div>
			<?php else:?>
				error
		<?php endif;?>
   </div>


   <?php    
      	require_once __DIR__."/../plantilla/footer.php"; 
   ?>
</body>
</html>