<?php

    require_once __DIR__.'/../../bd/preciosAdapter.php';
    $id_Divisa=1;
    $precio=PreciosAdapter::obtenerUno($id_Divisa);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/cuentaAdministrador.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <a href="/../index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
        <span class="titulo">CUENTA ADMINISTRADOR</span> 
    </div>


    <div class="contenido-administrador">
        <div class="content-botones">
            <div class="botones">
                <a href="usuarios.php">Usuarios</a>
                <a href="/pages/administrador/administrarPrecio.php?id_Divisa=<?php echo $precio->id_Divisa?>">Cambiar Precio</a>
            </div>
            <img src="/assets/img/administrador.PNG" alt="">
            <div class="botones">
                <a href="/pages/administrador/enviarFactura.php">Enviar Comprobante de pago</a>
                <a href="/pages/administrador/agregar-administrador.php">Agregar Administrador</a>
            </div>
        </div>
    </div>

    <div class="button">
		<a class="return-button" href="/../index.php">Cerrar sesión</a>
	</div>



</body>
</html>