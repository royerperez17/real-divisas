<?php 
    require_once __DIR__."/../../bd/administradorAdapter.php";
	require_once __DIR__.'/../../tools/httpTools.php';

    session_start();
	$falloLogeo=false;

    if(isset($_POST['dni']) && isset($_POST['contrasena'])){
		$dni=$_POST['dni'];
		$contrasena=$_POST['contrasena'];

        $idAdministrador=AdministradorAdapter::verficarDatos($dni,$contrasena);


        if($idAdministrador != 0){
            $administrador=AdministradorAdapter::perfilAdministrador($idAdministrador);
            $_SESSION['administrador']=$administrador;
            httptools::redireccionar('/pages/administrador/cuentaAdministrador.php');	
            // echo $idAdministrador;
        }


        else{
            $falloLogeo=true;
            session_destroy();
            // echo "no se pudo iniciar";
        }

    }




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/login-administrador.css">
    <title>Document</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <div class="content-register">
            <h1>Inicia Sesion</h1>
            <table class="content">
                <tr>
                    <td>
                        <p>DNI</p>
                        <input type="text" name="dni" placeholder="Escribe tu DNI" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Contraseña </p>
                        <input type="password" name="contrasena" placeholder="Escribe tu contraseña" required>
                    </td>
                 </tr>
            </table>
            <div class="buttons">
                <input class="login-button" type="submit" name="Iniciar sesion" value="Iniciar sesion ">
                <a id="return-button" href="/../index.php">volver</a>
            </div>
        </div>
    </form>
    </center>

</body>
</html>