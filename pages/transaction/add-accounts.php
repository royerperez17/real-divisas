<?php 
    require_once __DIR__."/../../bd/cuentaPersonalAdapter.php";
    require_once __DIR__."/../../bd/personaAdapter.php";
    require_once __DIR__."/../../bd/empresaAdapter.php";
    require_once __DIR__."/../../bd/usuarioAdapter.php";
    require_once __DIR__.'/../../tools/HttpTools.php';
    require_once __DIR__."/../../bd/cuentaTercerosAdapter.php";

HttpTools::iniciarSesion();
/**
 * Listar Cuenta Personal
 */
$persona=HttpTools::getClient();
$usuario=UsuarioAdapter::listarDatosCliente($persona->id);
foreach($usuario as $u){
$cuentaPersonales=CuentaPersonalAdapter::listar($u->idUsuario);
$cuentaTerceros=CuentaTercerosAdapter::listar($u->idUsuario);
}
/**
 * Listar Cuenta Terceros
 */

$interbank="/assets/img/interbank.png";
$bbva="/assets/img/bbva.png";
$bcp="/assets/img/bcp.png";
$scotiabank="/assets/img/scotiabank.png";
$cajaHuancayo="/assets/img/cajaHuancayo.png";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="/assets/css/add-accounts.css">
    <title>Agregar Cuentas - Real Divisas</title>
    <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>

<body>
    <header class="header">
        <a href="/index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
        <span class="titulo">AGREGAR CUENTAS</span>
    </header>
    <div class="add-accounts">
        <img src="/assets/img/tarjeta-credito.png" alt="">
        <a href="javascript:agregar()">Agregar cuenta</a>
        <p>Las cuentas que agregues deberan ser tuyas o de tu empresa. Puedes tener hasta 10 cuentas agregadas, 5
        cuentas en soles y 5 en dolares</p>
    </div>

    <?php
        require_once __DIR__."/../plantilla/agregar-cuentas.php"; 
    ?>

    <script src="/assets/js/agregar-cuentas.js"></script>

    <div class="cuentas-registradas">

        <p id="cuenta-titulos">CUENTAS PERSONAL</p>

            <div class="cuentas">
            <?php foreach ($cuentaPersonales as $cuentaPersonal):?>
                <div class="cuenta-agregada">
                    <section class="contenedor-img">
                        <img class="banco-img"
                        <?php if($cuentaPersonal->bancos == "interbank" ):?>              
                        src="<?php echo $interbank?>"
                        <?php elseif($cuentaPersonal->bancos == "bbva"): ?>
                         src="<?php echo $bbva?>"
                        <?php elseif($cuentaPersonal->bancos == "bcp"): ?>
                         src="<?php echo $bcp?>"
                         <?php elseif($cuentaPersonal->bancos == "scotiabank"): ?>
                         src="<?php echo $scotiabank?>"
                         <?php elseif($cuentaPersonal->bancos == "cajaHuancayo"): ?>
                         src="<?php echo $cajaHuancayo?>"
                         >
                        <?php endif;?>
                    </section>
                    <section class="alias-numeroCuenta">
                        <p class="alias-cuenta"><?php echo $cuentaPersonal->aliasCuenta;?></p>
                        <p><?php echo "****".substr($cuentaPersonal->numeroCuenta,-4);?></p>
                    </section>
                    <div class="moneda-tipoCuenta">
                        <p><strong><?php echo ucwords($cuentaPersonal->moneda);?></strong></p>
                        <p><?php echo $cuentaPersonal->tipoCuenta;?></p>
                    </div>
                </div>
            <?php endforeach;?>
            </div>



        <p id="cuenta-titulos">CUENTAS TERCEROS</p>


            <div class="cuentas">
                        <?php foreach ($cuentaTerceros as $cuentaTercero):?>
                <div class="cuenta-agregada">
                    <section class="contenedor-img">
                        <img class="banco-img"
                        <?php if($cuentaTercero->bancos == "interbank" ):?>              
                        src="<?php echo $interbank?>"
                        <?php elseif($cuentaTercero->bancos == "bbva"): ?>
                         src="<?php echo $bbva?>"
                        <?php elseif($cuentaTercero->bancos == "bcp"): ?>
                         src="<?php echo $bcp?>"
                         <?php elseif($cuentaTercero->bancos == "scotiabank"): ?>
                         src="<?php echo $scotiabank?>"
                         <?php elseif($cuentaTercero->bancos == "cajaHuancayo"): ?>
                         src="<?php echo $cajaHuancayo?>"
                         >
                        <?php endif;?>
                    </section>
                    <section class="alias-numeroCuenta">
                        <p class="alias-cuenta"><?php echo $cuentaTercero->aliasCuenta;?></p>
                        <p><?php echo "****".substr($cuentaTercero->numeroCuenta,-4);?></p>
                    </section>
                    <div class="moneda-tipoCuenta">
                        <p><strong><?php echo ucwords($cuentaTercero->moneda);?></strong></p>
                        <p><?php echo $cuentaTercero->tipoCuenta;?></p>
                    </div>
                </div>
                        <?php endforeach;?>
            </div>





    </div>

    <a class="return-button" href="account.php">VOLVER</a>


</body>

</html>