<link rel ="stylesheet" text="text/css" href="/assets/css/header-index.css">
<?php
   // error_reporting(0);
   require_once __DIR__.'/../../tools/httpTools.php';
   require_once __DIR__.'/../../bd/clasepersona.php';
   require_once __DIR__ .'/../../bd/preciosAdapter.php';
   HttpTools::iniciarSesion();
   $clientelogeado=httpTools::validarClienteLogeado();
      $logeado=false;
      $id_Divisa=1;
      if(isset($_SESSION['cliente'])){
      $cliente=$_SESSION['cliente'];
      $logeado=true;
      }
   // $precios=PreciosAdapter::listar();
   // if(isset($_POST['inputCantidad'])){
   //    $inputCantidad=$_POST['inputCantidad'];
   //    $first=$_POST['first'];
   //    $second=$_POST['second'];

   //    echo $inputCantidad.$first.$second;
   // }
?>


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