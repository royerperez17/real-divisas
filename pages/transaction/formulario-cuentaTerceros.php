<?php 
    require_once __DIR__."/../../bd/cuentaTercerosAdapter.php";
    require_once __DIR__."/../../bd/usuarioAdapter.php";
    require_once __DIR__. "/../../bd/personaAdapter.php";
    require_once __DIR__. "/../../bd/empresaAdapter.php";
    require_once __DIR__."/../../tools/httpTools.php";

    HttpTools::iniciarSesion();
    $usuario=HttpTools::getClient();
    
    // foreach($usuario as $u){
    //      echo $u."<br>";
    // }    

    if(isset($_POST['agregarcuentaTerceros'])){
         $pertenencia=$_POST['pertenencia'];
         $tipoDocumento=$_POST['tipoDocumento'];
         $numeroDocumento=$_POST['numeroDocumento'];
         $nombreCompleto=$_POST['nombreCompleto'];
         $correo=$_POST['correo'];
         $ocupacion=$_POST['ocupacion'];
         $bancos=$_POST['bancos'];
         $numeroCuenta=$_POST['numeroCuenta'];
         $tipoCuenta=$_POST['tipoCuenta'];
         $moneda=$_POST['moneda'];
         $aliasCuenta=$_POST['aliasCuenta'];
         $idUsuario=UsuarioAdapter::traerDatosPorIdCliente($usuario->id);
         $cuentaTerceros=new CuentaTerceros(0, $idUsuario, $pertenencia, $tipoDocumento, $numeroDocumento, $nombreCompleto, $correo, $ocupacion, $bancos, $numeroCuenta, $tipoCuenta, $moneda, $aliasCuenta);
         $idCuentaTerceros=CuentaTercerosAdapter::registrarCuentaTerceros($cuentaTerceros);  
         if($idCuentaTerceros != 0){
            //  echo"usuario registrado"; 
            header('location: /pages/transaction/add-accounts.php');
         }else{
            echo "no se creo la cuenta Terceros";
         }
        


    }



?>