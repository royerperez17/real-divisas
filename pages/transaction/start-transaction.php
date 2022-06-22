<?php
   error_reporting(0);
   require_once __DIR__.'/../../bd/preciosAdapter.php';
	require_once __DIR__."/../../bd/detalleHistorialAdapter.php";
   require_once __DIR__. "/../../bd/personaAdapter.php";
   require_once __DIR__. "/../../bd/empresaAdapter.php";
   require_once __DIR__."/../../bd/usuarioAdapter.php";
   require_once __DIR__."/../../tools/httpTools.php";
   
    HttpTools::iniciarSesion();
    $usuario=HttpTools::getClient();
    date_default_timezone_set('America/Lima');

   $precios=PreciosAdapter::listar();
   if (isset($_POST['cambiar'])){
      $idUsuario=$_POST['idUsuario'];
      $prefix="RD";
      $codigoOperacion=$prefix.rand(10000,99999);
      $fecha=$_POST['fecha'];
      $montoOrigen=$_POST['montoOrigen'];
    	$montoDestino=$_POST['montoDestino'];
      $precioCompra=$_POST['precioCompra'];
      $precioVenta=$_POST['precioVenta'];
      $idDatosTransaccion=$_POST['idDatosTransaccion'];
      $fecha=date('Y-m-d h:i:s', time());

      $montoDestino="";
      if(isset($_POST['divisa'])
       && isset($_POST['montoOrigen'])
      ){
         foreach($precios as $precio){
         if($_POST['divisa'] == $precio->precioVenta){
            // $montoDestino=$montoOrigen/$dolar;
            $montoDestino=($_POST['montoOrigen']/$precioVenta);

         }elseif($_POST['divisa'] == $precio->precioCompra){
            // $montoDestino=$montoOrigen*$dolar;
            // echo $_POST['montoOrigen'].$precio->precioCompra;
            $montoDestino= ($_POST['montoOrigen']*$precioCompra);
         }
      }
      }
      
      $idUsuario=UsuarioAdapter::traerDatosPorIdCliente($usuario->id);
      $historial= new Historial(0, $idUsuario, $codigoOperacion, $fecha,  $montoOrigen, $montoDestino, $precioCompra, $precioVenta, $idDatosTransaccion);
      $idHistorial=HistorialAdapter::registrarDetalleHistorial($historial);
      if($idHistorial != 0){
         // header('location: /pages/transaction/add-accounts.php');
         // echo "detalle historial registrado";
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
	 <link rel ="stylesheet" text="text/css" href="/assets/css/start-transaction.css">

    <title>Real Divisas | cambia de forma segura</title>
    <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
	<center>
   <div class="contenido-transaccion">
      <div class="titulo">
         <strong>Ahorra cambiando con<br> la mejor tasa del Perú</strong>
        	<p>Mejores tasas. Mayor ahorro.</p>
      </div>
		<section class="compramos-vendemos">
			<div class="contenido">
				<span>compramos a</span>
            <?php foreach($precios as $precio):?>
				<p><?php echo $precio->precioCompra?></p>
            <?php endforeach;?>
			</div>
			<img src="/assets/img/linea-vertical.png" alt="">
			<div class="contenido">
				<span>Vendemos a</span>
            <?php foreach($precios as $precio):?>
				<p><?php echo $precio->precioVenta?></p>
            <?php endforeach;?>
			</div>
		</section>
		<div class="cronometro">
			<p>Se actualizara el tipo de cambio en: </p>
         <img src="/assets/img/reloj.png" alt="">
			<p id="reloj"></p>
		</div>

      <script src="/assets/js/cronometro.js"></script>



		<div class="wrapper">
      <!-- <header>Conversor de divisas</header> -->
   <form action="" method="POST">
   <input type="hidden" name="precioCompra" value="<?php echo $precio->precioCompra?>">
   <input type="hidden" name="precioVenta" value="<?php echo $precio->precioVenta?>">
   <input type="hidden" name="montoDestino">
   <input type="hidden" value="<?php echo $codigoOperacion?>">
        <div class="amount">
          <p id="titulo-cantidad">Introduzca la cantidad</p>
          <input type="number" name="montoOrigen" required value="<?php echo $montoOrigen?>">
        </div>
      <div class="exchange-rate">selccione el tipo de cambio</div>
      <div class="input-divisas">
         <?php foreach($precios as $precio):?>
        <div>  
            <input type="radio" name="divisa" value="<?php echo $precio->precioVenta?>" id="dolar">
            <label for="dolar"><img src="https://flagcdn.com/28x21/us.png"><p>Dolar</p></label>
         </div>
         <div>
            <input type="radio" name="divisa" value="<?php echo $precio->precioCompra?>" id="soles">
            <label for="soles"><img src="https://flagcdn.com/28x21/pe.png">Soles</label>
         </div>
         <?php endforeach;?>
      </div>  
        <input class="boton" type="submit" name="cambiar" value="Obtener tipo de cambio">
        <div class="change">
           <?php if($_POST['divisa'] == $precio->precioVenta):?>
            Recibes : <?php echo number_format($montoDestino, 2);?> DOLARES
            <?php elseif($_POST['divisa'] == $precio->prescioCompra):?>
               Recibes : <?php echo number_format($montoDestino, 2);?> SOLES
            <?php endif;?>
         </div>
      </form>
    </div>

    



		<div class="foot-tipoCambio">
         <span>¿Montos mayores a <b>$5,000.00</b>?</span>
			<img src="/assets/img/question.png" alt="">
      </div> 
		<div class="buttons">
         <a class="continue-button" href="transaction-data.php">continuar</a>
         <a href="account.php">volver</a>
      </div>
   </div>
	</center>
         
</body>
</html>