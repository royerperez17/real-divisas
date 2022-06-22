<?php
   error_reporting(0);
   require_once __DIR__.'/tools/httpTools.php';
   require_once __DIR__.'/bd/clasepersona.php';
   require_once __DIR__ .'/bd/preciosAdapter.php';
   
   HttpTools::iniciarSesion();
   $clientelogeado=httpTools::validarClienteLogeado();
      $logeado=false;
      $id_Divisa=1;
      if(isset($_SESSION['cliente'])){
      $cliente=$_SESSION['cliente'];
      $logeado=true;
      }

      
   $precios=PreciosAdapter::listar();

   $montoDestino="";
      if(isset($_POST['divisa'])
       && isset($_POST['montoOrigen'])
      )
      $precioCompra=$_POST['precioCompra'];
      $precioVenta=$_POST['precioVenta'];
      $montoOrigen=$_POST['montoOrigen'];
      
      {
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

   // $cambio="";
   // if(isset($_POST['inputCantidad'])
   // && isset($_POST['divisa'])
   // ){
   //    $inputCantidad=$_POST['inputCantidad'];
   //    $divisa=$_POST['divisa'];
   //    $cambio=$inputCantidad*$divisa;

   // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" text="text/css" href="/assets/css/estilo-index.css">
  <link rel ="stylesheet" text="text/css" href="/assets/css/header-index.css">
  <title>Real Divisas | La mejor casa de cambio</title>
  <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
      
<header>
      <div class="contenedor">
         <nav class="menu-superior">
            <div class="logo">
               <a href="/index.php"><img src="/assets/img/logo.png" alt=""> </a> 
               <span class="logo-text"> <a href="">Real Divisas</a> </span> 
            </div>
            <div class="menu">
               <ul>
                  <li> <a href="/pages/nosotros.php">Nosotros</a> </li>
                  <li> <a href="/pages/ayuda.php">Ayuda</a> </li>
                  <?php if($clientelogeado):?>
                     <li> 
                        <a href="/pages/transaction/account.php">
                           <img src="/assets/img/usuario.png">
                           <?php echo ucwords($cliente->nombre);?>
                        </a>
                  </li>
                  <?php else:?>
                     <li class="dropdown">
                     <img src="/assets/img/usuario.png">
                        <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Iniciar Sesión</a>
                        <div class="dropdown-content" id="myDropdown">
                           <a href="pages/login/login-persona.php">Persona</a>
                           <a href="pages/login/login-empresa.php">Empresa</a>
                        </div>
                     </li>
                  <?php endif;?>

                  <script src="/assets/js/select.js"></script>

                  <li> <a href="/pages/register/log-start.php">Regístrate</a> </li>
               </ul> 
            </div>
         </nav>
      </div>
   </header>


   <div clas="container">
   <div class="content">
      <div class="content-info"> 
         <div class="info">
            <p>El mejor <b>tipo de cambio</b> para cambiar <b>dólares</b> y <b>soles online</b> en Huancayo, Perú</p>
         </div>
         <img id="sbs" src="/assets/img/sbs.png" alt="">
         <img id="gift" src="/assets/img/regalo.png" alt="">
      </div>
      <div class="content-pig">
         <img src="/assets/img/hucha.png" alt="">
      </div>
      <div class="content-tipoCambio">
         <div class="info-tipoCambio">
            <p>
               <b>Tipo de Cambio</b> del dólar hoy en Perú<br>
               <br>
               <?php foreach($precios as $precio): ?>
               Compra: <b><?php echo $precio->precioCompra; ?></b>
               Venta: <b><?php echo $precio->precioVenta; ?></b>
               <?php endforeach;?>
            </p>
         </div>

        
         




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
            <?php elseif($_POST['divisa'] == $precio->precioCompra):?>
               Recibes : <?php echo number_format($montoDestino, 2);?> SOLES
            <?php endif;?>
         </div>
      </form>
    </div>


   <!-- <div class="wrapper">
       <header>Conversor de divisas</header>
      <form action="" method="POST">
        <div class="amount">
          <p id="titulo-cantidad">Introduzca la cantidad</p>
          <input type="number" name="inputCantidad" required>
        </div>
      <div class="exchange-rate">seleccione el tipo de cambio</div>
      <div class="input-divisas">
        <div>
            <input type="radio" name="divisa" value="" id="dolar">
            <label for="dolar"><img src="https://flagcdn.com/28x21/us.png"><p>Dolar</p></label>
         </div>
         <div>
            <input type="radio" name="divisa" value="" id="soles">
            <label for="soles"><img src="https://flagcdn.com/28x21/pe.png">  Soles</label>
         </div>
      </div>  
        <input class="boton" type="submit" name="cambiar" value="Obtener tipo de cambio">
        <div class="change">
           Recibes :
         </div>
      </form>
    </div> -->
         



         <?php if($clientelogeado):?>
         <input class="button" type="submit" name="comenzar cambio" value="comenzar cambio">
         <?php else:?>
            <input class="button" type="submit" name="comenzar cambio" value="Registrate">
         <?php endif ?>
        

         <div class="foot-tipoCambio">
            <img src="/assets/img/question.png" alt="">
            <span>¿Monto mayor a <b>$5.000</b> o <b>S/ 10.000?</b></span>
         </div>
      </div>
   </div>
   <section class="banks">
      <div class="img-banks">
         <img src="/assets/img/bbva.png" alt="">
         <img src="/assets/img/bcp.png" alt="">
         <img src="/assets/img/interbank.png" alt="">
         <img src="/assets/img/plin-yape.png" alt="">
         <img src="/assets/img/bitcoin.png" alt="">
         <img src="/assets/img/scotiabank.png" alt="">
      </div>
      <div class="text-img">
         <p>Solo Huancayo</p>
         <p>A Nivel Nacional</p>
         <p>Solo Huancayo</p>
         <p>A Nivel Nacional</p>
         <p>A Nivel Nacional</p>
         <p>Solo Huancayo</p>
      </div>
      <p><b>Transferencias</b> inmediatas<br> (15min)</p>
   </section>
   <section class="networks">
      <div>
         <img src="/assets/img/whatsapp-color.png" alt="">
         <span>+51 941428662</span>
      </div>
      <div>
         <img src="/assets/img/facebook-color.png" alt="">
         <img src="/assets/img/instagram-color.png" alt="">
         <span>@realdivisas</span>
      </div>
      <div>
         <img src="/assets/img/ubicacion.png" alt="">
         <span>Jr. Lima N°235</span>
      </div>
   </section>
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
   <section class="choose">
      <h3>¿POR QUE ELEGIR REAL DIVISAS E.I.R.L?</h3>
      <p>Cambia de manera facil y segura, sin salir de casa desde la comonidad de tu hogar.</p>
      <div class="chooseRD-one">
         <img src="/assets/img/hombre.png" alt="">
         <div class="first">
            <div class="timetable">
               <img src="/assets/img/horario.png" alt="">
               <span>
                  <p class="caption">Horario extendido</p>
                  <p>Lun. - Sab. :9 am - 9 pm <br>Dom. : 10 am - 1:30 pm</p>
               </span>
            </div>
            <div class="security">
               <img src="/assets/img/seguridad.png" alt="">
               <span>
                  <p class="caption">Seguridad</p>
                  <p>Regulados por la superintendencia de banca y seguros.</p>
               </span>
            </div>
         </div>
      </div>
      <div class="chooseRD-two">
         <div class="second">
            <div class="save">
               <img src="/assets/img/ahorra.png" alt="">
               <span>
                  <p class="caption">Ahorra</p>
                  <p>Actualizamos el tipo de cambio real Para ofrecerte el mejor precio, sin comisiones</p>
               </span>
            </div>
            <div class="speed">
               <img src="/assets/img/rapidez.png" alt="">
               <span>
                  <p class="caption">Rapidez</p>
                  <p>Evita largas colas y cambia en minutos.</p>
               </span>
            </div>
         </div>
         <img src="/assets/img/mujer.png" alt="">
      </div>
   </section>
   <section class="confidence">
      <h3>NUMEROS QUE INSPIRAN CONFIANZA  Y HABLAN POR NOSOTROS</h3>
      <div class="numbers-confidence">
         <img src="/assets/img/señor.png" alt="">        
         <div>
            <p>
               <b>+ Mil</b>
               <br>Clientes Registrados
            </p>
            <p>
               <b>+ 18 mil</b> 
               <br> Transacciones
            </p>
            <p>
               <b>+ 10 millones</b> 
               <br>De dólares cambiados
            </p>
            <p>EN TAN SOLO UN AÑO</p>
         </div>
      </div>
   </section>

   <?php    
      	require_once __DIR__."/pages/plantilla/footer.php"; 
   ?>


</body>
</html>
