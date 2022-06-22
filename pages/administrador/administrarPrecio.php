<?php
    require_once __DIR__."/../../bd/preciosAdapter.php";

$id_Divisa=$_GET['id_Divisa'];
$precio;
if(isset($id_Divisa)){
$precio=PreciosAdapter::obtenerUno($id_Divisa);
if($precio != null){
if(isset($_POST['compra']) && isset($_POST['venta'])){
    $precio->precioCompra=$_POST['compra'];
    $precio->precioVenta=$_POST['venta'];

    $respuesta = PreciosAdapter::AdministrarPrecio($precio);
    if($respuesta === false){
        echo "No se pudo actualizar el contacto";
    }else{
       header('location: administrarPrecio.php?id_Divisa=1');
    }
}
}



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/administrarPrecio.css">
    <title>Document</title>

</head>
<body>
    <div class="header">
        <a href="../index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
        <span class="titulo">REAL DIVISAS</span> 
    </div>

    <center>
    <form action="" method="POST">
        <div class="content">
            <div class="precio">
                <p id="titulo-compramos">Compramos</p>
                <input type="number" step="any" name="compra" value="<?php echo $precio->precioCompra;?>">
            </div>
            <div class="precio">
                <p>Vendemos</p>
                <input type="number" step="any" name="venta" value="<?php echo $precio->precioVenta;?>">
            </div>
            <input class="actualizar-boton" type="submit" name="agregar" value="Actualizar" >
            <a href="cuentaAdministrador.php">volver</a>
        </div>
    </form>
    <!-- <a href="cuentaAdministrador.php">volver</a> -->
    </center>

</body>
</html>