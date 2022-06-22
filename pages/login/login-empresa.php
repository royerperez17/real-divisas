<?php 
    require_once __DIR__."/../../bd/empresaAdapter.php";
    require_once __DIR__.'/../../tools/httpTools.php';

    session_start();
	$falloLogeo=false;


    if(isset($_POST['correo']) && isset($_POST['contrasena'])){
            $correo=$_POST['correo'];
        	$contrasena=$_POST['contrasena'];
    
                $id=EmpresaAdapter::verficarDatos($correo,$contrasena);
                if($id != 0){
                $empresa=EmpresaAdapter::perfilCliente($id);
                $_SESSION['cliente']=$empresa;
                httptools::redireccionar('/pages/transaction/account.php');	
            }
        }

    
    else{
        $falloLogeo=true;
        session_destroy();
        // echo "no se pudo iniciar";
    }

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="/assets/css/login-empresa.css">
    <title>Inicio Sesion - Real Divisas </title>
    <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>

<body>
    <center>
        <div class="container">
            <?php
      		    require_once __DIR__."/../plantilla/header.php"; 
    	    ?>
            <form action="" method="POST">
                <div class="content-register">
                    <h1>Inicia Sesion</h1>
                    <h2>como empresa</h2>
                    <table class="content">
                        <tr>
                            <td>
                                <p>Correo</p>
                                <input type="email" name="correo" placeholder="Escribe tu correo ">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Contraseña </p>
                                <input type="password" name="contrasena" placeholder="Escribe tu contraseña ">
                            </td>
                        </tr>
                    </table>
                    <a class="forgot-passwod" href="enter-email.php">Olvide mi contraseña</a>
                    <div class="buttons">
                        <input class="login-button" type="submit" name="Iniciar sesion" value="Iniciar sesion ">
                        <a href="/pages/register/log-start.php">¿No tienes cuenta? Registrate aqui</a>
                        <a id="return-button" href="/../index.php">volver</a>
                    </div>
                </div>
            </form>
        </div>
    </center>
    <?php
      require_once __DIR__."/../plantilla/footer.php"; 
    ?>

</body>

</html>