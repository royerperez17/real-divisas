<?php 
    require_once __DIR__."/../../bd/cuentaPersonalAdapter.php";
    require_once __DIR__."/../../bd/usuarioAdapter.php";
    require_once __DIR__. "/../../bd/personaAdapter.php";
    require_once __DIR__. "/../../bd/empresaAdapter.php";
    require_once __DIR__."/../../tools/httpTools.php";
    
    HttpTools::iniciarSesion();
    $usuario=HttpTools::getClient();

    // foreach($usuario as $u){
    //   echo $u."<br>";
    // }
  
    if(isset($_POST['agregarCuentaPersonal'])){
        $bancos=$_POST['bancos'];
        $numeroCuenta=$_POST['numeroCuenta'];
        $tipoCuenta=$_POST['tipoCuenta'];
        $moneda=$_POST['moneda'];
        $aliasCuenta=$_POST['aliasCuenta'];
        $idUsuario=UsuarioAdapter::traerDatosPorIdCliente($usuario->id);
        $cuentaPersonal=new CuentaPersonal(0, $idUsuario, $bancos, $numeroCuenta, $tipoCuenta, $moneda, $aliasCuenta);
        $idCuentaPersonal=CuentaPersonalAdapter::registrarCuentaPersonal($cuentaPersonal);
        if($idCuentaPersonal != 0){
            header('location: /pages/transaction/add-accounts.php');
        }else{
          echo "no se creo la cuenta personal";
        }
}


?>