<?php 
    require_once __DIR__.'/../../bd/personaAdapter.php';
    require_once __DIR__.'/../../bd/empresaAdapter.php';
    require_once __DIR__.'/../../bd/usuarioAdapter.php';

    $persona=personaAdapter::listar();
    $empresa=empresaAdapter::listar();


    $cantidadUsuarios=usuarioAdapter::contarNumeroDeUsuarios();
    $cantidadPersonas=personaAdapter::contarNumeroDePersonas();
    $cantidadEmpresas=empresaAdapter::contarNumeroDeEmpresas();


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/usuarios.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <a href="../index.php"><img class="logo-header" src="/assets/img/logo.png" alt=""></a>
        <span class="titulo">USUARIOS</span> 
    </div>

    <div class="cantidad-usuarios">
       TOTAL: <?php echo $cantidadUsuarios;?> USUARIOS REGISTRADOS
    </div>

    <div class="button">
		<a class="return-button" href="cuentaAdministrador.php">VOLVER</a>
	</div>


    <center>

    <div class="listar">
        <!-- <div class="search">
            <form action="/pages/search.php" method="GET">
            <p>Filtrar por Nombre</p>
            <input type="search" name="buscar-por-nombre" >
            <input type="submit" name="boton-buscar" value="Buscar">
        </div> -->
        <h1>PERSONAS</h1>
        <p>(<?php echo $cantidadPersonas;?>)</p>
        <table>
            <tr>  
                <th>TIPO DOCUMENTO</th>
                <th>NUMERO DOCUMENTO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>FECHA NACIMIENTO</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
            </tr>
            <?php foreach($persona as $persona): ?>
                <tr>
                    <td><?php  echo $persona->tipoDocumento;?></td>
                    <td><?php  echo $persona->numeroDocumento;?></td>
                    <td><?php  echo $persona->nombre;?></td>
                    <td><?php  echo $persona->apellido;?></td>
                    <td><?php  echo $persona->fechaNacimiento;?></td>
                    <td><?php  echo $persona->numeroTelefono;?></td>
                    <td><?php  echo $persona->correo;?></td>  
                </tr>
                <?php endforeach;?>
        </table>
    </div>

    <div class="listar" id="empresa">
        <h1>EMPRESAS</h1>
        <p>(<?php echo $cantidadEmpresas;?>)</p>
        <table>
            <tr>  
                <th>RAZON SOCIAL</th>
                <th>RUC</th>
                <th>CELULAR</th>
                <th>CORREO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TIPO DOCUMENTO</th>
                <th>DOCUMENTO</th>
                <th>PROFESION</th>
            </tr>
            <?php foreach($empresa as $empresa): ?>
                <tr>
                    <td><?php  echo $empresa->razonSocial;?></td>
                    <td><?php  echo $empresa->ruc;?></td>
                    <td><?php  echo $empresa->celular;?></td>
                    <td><?php  echo $empresa->correo;?></td>
                    <td><?php  echo $empresa->nombre;?></td>
                    <td><?php  echo $empresa->apellido;?></td>
                    <td><?php  echo $empresa->tipoDocumento;?></td>
                    <td><?php  echo $empresa->documento;?></td>
                    <td><?php  echo $empresa->profesion;?></td>
                </tr>
                <?php endforeach;?>
        </table>
    </div>

    </center>     
</body>
</html>