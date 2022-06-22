<?php
    require_once __DIR__.'/../../tools/mailTools.php';
    require_once __DIR__ .'/../../bd/preciosAdapter.php';

    date_default_timezone_set('America/Lima');
error_reporting(0);
if(isset($_POST['enviarFactura'])){
    $correo=$_POST['correo'];
    $nombreCompleto=$_POST['nombreCompleto'];
    $documento=$_POST['documento'];
    $montoOrigen=$_POST['montoOrigen'];
    $montoDestino=$_POST['montoDestino'];
    $precioCompra=$_POST['precioCompra'];
    $precioVenta=$_POST['precioVenta'];
    $fecha = date('d-m-Y');
    $hora = date('h:i:s');

if($_POST['enviarFactura']){
    // echo "registrado xd";
    header('location: finEnvioFactura.php');

}else{
    echo"Factura no enviada";
}





}

$precios=PreciosAdapter::listar();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/enviarFactura.css">
    <title>Document</title>
</head>
<body>
    <center>
    <div class="contenido">
            <div class="contenido-precios">
                <span>MONEDA</span>
                <div class="precios">
                    <?php foreach($precios as $precio): ?>
                    compramos<br> <b><?php echo $precio->precioCompra; ?></b>
                </div>
                <div class="precios">
                    Vendemos<br> <b><?php echo $precio->precioVenta; ?></b>
                </div>
                    <?php endforeach;?>
            </div>

        <form action="" method="POST"> 
        <h1>FACTURA</h1>
            <div class="datos">
                <input type="email" name="correo"  placeholder="correo Electronico" required>
                <input type="text"  name="nombreCompleto"  placeholder="Nombre completo" required>
                <input type="text"  name="documento"  placeholder="Documento" required>
                <input type="text"  name="montoOrigen"  placeholder="Monto Origen" required>
                <input type="text"  name="montoDestino"  placeholder="Monto destino" required>
                <input type="text"  name="precioCompra"placeholder="Precio Compra" required>
                <input type="text"  name="precioVenta"placeholder="Precio Venta" required>
                <input class="enviar-factura" type="submit" name="enviarFactura" value="Enviar Factura">
            </div>
        </form>
    </div>
    </center>

    <div class="button">
		<a class="return-button" href="cuentaAdministrador.php">VOLVER</a>
	</div>
</body>
</html>
 <?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .container{
        width:480px;
        margin:0 auto;
        border: 2px solid;
        padding:30px ;
        border-radius: 5px;
        /* font-family: verdana; */
        height:auto;
      }
      .header{
          display: flex;
          justify-content: space-evenly;
          flex-direction: row;
          align-items: center;
      }
      .imagen-logo {
          width: 200px;
      }
      .header  img{
          width: 60px;
          /* height: 50px; */
          vertical-align: middle;
      }
      .titulo{
        vertical-align: middle;
      }
      .titulo > h1 {
          margin-bottom: 2px;
      }
      .titulo small{
        display: block;
        /* flex-direction: column;
        align-items: center; */
        width: 100%;
        text-align: center;
      }
      .cabecera{
        /* background-color: red; */
        display:    flex;
        justify-content: space-between;
        flex-direction: row;
        text-align: left;
      }
      .fecha-hora{
        width: 300px;
      }
      hr{
        border: 1px dashed #000;
      }
      .envias{
          width: 368px;
      }
      #divisa{
          width: 90px;
          border: 1px solid;
          padding: 10px 10px;
      }
      #footer{
          text-align: center;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="imagen-logo">
                <img src="https://scontent.flim16-1.fna.fbcdn.net/v/t39.30808-6/278759728_406384211491467_3755973152390316432_n.png?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeEnYTBHapLNddBSupeovmVnb_S1uDQVXGNv9LW4NBVcY9d3I_wzwLToZZQgmmEpCnfbmiBNkaqJ5COGUKAomf92&_nc_ohc=tg4TkSeVQnYAX8WG66w&_nc_ht=scontent.flim16-1.fna&oh=00_AT8x4iZz0YHd8ePY759V2IUC7Yg9ArdVh3zpdqYkWP0qPA&oe=629F17B8" alt="">
            </div>
            <div class="titulo">
                <h1>Real Divisas E.I.R.L</h1>
                <small>RUC: 20606267925</small><br>
            </div>
        </div>
        <small>Somos una empresa dedicada a la compra - venta de divisas. Nos enfocamos en crear un ecosistema de transacciones seguras a nivel Nacional, proporcionando experiencias extraordinarias a todos nuestros clientes.</small>
        <hr>
        <div class="cabecera">
            <div class="fecha-hora">
                <p>Fecha emision:<?php echo $fecha?></p>
                <p>Hora:<?php echo $hora?></p>
            </div>
            <div>   
              <p>Boleta de Venta Electronica</p>
              <p>N° 108</p>                
            </div>
        </div>
        <div>
          <p>Señor(a):<?php echo $nombreCompleto?> </p>
          <p>Documento:<?php echo $documento?> </p>
        </div>
        <hr>
        <div class="cabecera">
            <div class="envias">
              <p id="divisa">Enviaste: <?php echo $montoOrigen?></p>
            </div>
            <div>
               <p id="divisa">Recibes: <?php echo $montoDestino?></p> 
            </div>
        </div>
        <hr>
        <p>Precio Compra:  <?php echo $precioCompra?></p>
        <p>Precio Venta:  <?php echo $precioVenta?></p>
        <hr>
        <p id="footer">
            <small>GRACIAS POR CAMBIA CON REAL DIVISAS ESPERAMOS QUE SIGA CONFIANDO EN NOSOTROS<br><br>Conserve este comprobante en caso de reclamo
            </small>
        </p>
    </div>

</body>
</html>
<?php $factura=ob_get_clean();?>
<?php
MailTools::enviar($correo,'Factura',$factura);
?>