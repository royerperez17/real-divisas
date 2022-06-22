<?php 
    require_once __DIR__."/../../bd/administradorAdapter.php";

    if(isset($_POST['crearcuenta'])){
        $dni=$_POST['dni'];
        $contrasena=$_POST['contrasena'];

        $administrador=new Administrador(0,$dni,$contrasena);
        $id = AdministradorAdapter::registrarAdministrador($administrador);
        if($id != 0){
            // echo"si se creo xd";
            header('location: final-registro.php ');
        } else{
            echo"usuario no registrado";

        }
    }



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/agregar-administrador.css">
    <title>Document</title>
</head>
<body>

    <div class="header">
        <a href="../index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
        <span class="titulo">AGREGAR ADMINISTRADOR</span> 
    </div>

    <center>
    <form action="agregar-administrador.php" method="POST">
        <div class="content-register">
            <h1>REGISTRAR</h1>
            <table class="content">
                <tr>
                    <td><input type="text" name="dni" placeholder="Ingrese DNI"></td>
                    </tr>
                <tr>
                    <td><input type="password" name="contrasena" placeholder="Ingrese su Contraseña">
                    </td>
                </tr>
            </table>
            <div class="buttons">
                <input class="create-button" type="submit" name="crearcuenta" value="CREAR CUENTA">
                <a href="cuentaAdministrador.php">pagina anterior</a>
            </div>
         </div>
    </form>
    </center>

</body>
</html>