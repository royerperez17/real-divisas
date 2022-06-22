<?php 
	require_once __DIR__."/../../bd/empresaAdapter.php";
	require_once __DIR__."/../../bd/usuarioAdapter.php";
	
	if(isset($_POST['crearcuenta'])){
		$razonSocial=$_POST['razonSocial'];
   		$ruc=$_POST['ruc'];
   		$celular=$_POST['celular'];
        $correo=$_POST['correo'];
   	   	$contrasena=$_POST['contrasena'];
		$confirmarContrasena=$_POST['confirmarContrasena'];
		$nombre=$_POST['nombre'];
   		$apellido=$_POST['apellido'];
   		$tipoDocumento=$_POST['tipoDocumento'];
        $documento=$_POST['documento'];
   		$profesion=$_POST['profesion'];
   		$genero=$_POST['genero'];     


if($contrasena == $confirmarContrasena){
            $empresa=new Empresa(0,$razonSocial,$ruc,$celular,$correo,$contrasena,$nombre,$apellido,$tipoDocumento,$documento,$profesion,$genero);
           	$id = EmpresaAdapter::registrarEmpresa($empresa);
			$usuario = new Usuario(0,0,$id);
			$idUsuario = UsuarioAdapter::registrarUsuario($usuario);
            if($id != 0){
                header('location: end-record.php ');
            } else{
    	        echo"usuario no registrado";
    }
        }
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/company-registration.css">
	<title>Real Divisas | Justo y transparente</title>
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
			<h1>Registro de <br>Empresa</h1>	
			<table class="content">
				<tr>
					<td><input type="text" name="razonSocial" placeholder="Razon Social"></td>
				</tr>
				<tr>
					<td><input type="text" name="ruc" placeholder="RUC"></td>
				</tr>
				<tr>
					<td><input type="text" name="celular" placeholder="Celular de Contacto"></td>
				</tr>
				<tr>
					<td><input type="email" name="correo" placeholder="Correo Electronico"></td>
				</tr>
				<tr>
					<td><input type="password" name="contrasena"  placeholder="Contraseña"></td>
				</tr>
				<tr>
					<td>
						<input type="password" name="confirmarContrasena"  placeholder="Confirmar contraseña">
						<p>DATOS DEL REPRESENTANTE LEGAL</p>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="nombre"  placeholder="Nombre"></td>
				</tr>
				<tr>
					<td><input type="text" name="apellido"  placeholder="Apellidos"></td>
				</tr>
				<tr>
					<td class="content-nine">
						<select name="tipoDocumento">
							<option value="DNI">DNI</option>
							<option value="RUC">RUC</option>
						</select>
					   <input id="document-number" type="text" name="documento" placeholder="Documento">
					</td>
				</tr>
				<tr>
					<td><input type="text" name="profesion" placeholder="Profesion"></td>
				</tr>
				<tr>
					<td><input type="text" name="genero" placeholder="Genero"></td>
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
