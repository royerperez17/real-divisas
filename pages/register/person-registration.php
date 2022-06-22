<?php 
	require_once __DIR__."/../../bd/personaAdapter.php";
    require_once __DIR__."/../../bd/usuarioAdapter.php";

	if(isset($_POST['crearcuenta'])){
		$tipoDocumento=$_POST['tipoDocumento'];
        $numeroDocumento=$_POST['numeroDocumento'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
    	$fechaNacimiento=$_POST['fechaNacimiento'];
        $numeroTelefono=$_POST['numeroTelefono'];
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];
        $confirmarContrasena=$_POST['confirmarContrasena'];

        if($contrasena == $confirmarContrasena){
            $persona=new Persona(0,$tipoDocumento,$numeroDocumento,$nombre,$apellido,$fechaNacimiento,$numeroTelefono,$correo,$contrasena);
            $id = PersonaAdapter::registrarPersona($persona);
            $usuario = new Usuario(0,$id,0);
            $idUsuario = UsuarioAdapter::registrarUsuario($usuario);
            if($id != 0){
                // echo"si se creo xd";
                header('location: end-record.php ');
            } else{
    	        echo"usuario no registrado";
    }
        }

        // else{
        //     header('location: error405.php ');
        // }
		

	}
    ?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="/assets/css/person-registration.css">
    <title>Real Divisas | Justo y transparente</title>
    <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>

<body>
    <center>
        <div class="container">
            <?php        
      		require_once __DIR__."/../plantilla/header.php"; 
            ?>
            <form action="person-registration.php" method="POST">
                <div class="content-register">
                    <h1>REGISTRARSE</h1>
                    <table class="content">
                        <tr>
                            <td class="content-one">
                                <select name="tipoDocumento">
                                    <option value="DNI">DNI</option>
                                    <option value="CE">CE</option>
                                </select>
                                <input id="document-number" type="text" name="numeroDocumento"
                                    placeholder="Ingrese su Documento">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="nombre" placeholder="Nombre"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="apellido" placeholder="Apellidos">
                                <p>SELECCIONE SU FECHA DE NACIMIENTO</p>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="numeroTelefono" placeholder="Ingrese Nº de Telefono"></td>
                        </tr>
                        <tr>
                            <td><input type="email" name="correo" placeholder="Correo"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="contrasena" placeholder="Contraseña"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="confirmarContrasena" placeholder="Confirme su Contraseña">
                            </td>
                        </tr>
                    </table>
                    <div class="buttons">
                        <input class="create-button" type="submit" name="crearcuenta" value="CREAR CUENTA">
                        <a href="log-start.php">pagina anterior</a>
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