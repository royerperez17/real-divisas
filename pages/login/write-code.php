<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/write-code.css">
	<title>Real Divisas | Justo y transparente</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
    <center>
	<div class="container">
		<?php
      		require_once __DIR__."/../plantilla/header.php"; 
    	?>
		<form action="create-password.php" method="POST">
		<div class="content-check">
			<img src="/assets/img/enviocorreo.png">
            <h2>¡Enviaremos un codigo de verificación al correo <br>@gmail.com!</h2>	
			<p>Codigo  de  verificación</p>
			<table class="content">
				<tr>
					<td><input type="text" name="" maxlength="1"></td>
					<td><input type="text" name="" maxlength="1"></td>
					<td><input type="text" name="" maxlength="1"></td>
					<td><input type="text" name="" maxlength="1"></td>
					<td><input type="text" name="" maxlength="1"></td>
					<td><input type="text" name="" maxlength="1"></td>
				</tr>
			</table>
            <a href="">¿No te llego al correo? Reenviar</a>
			<div class="buttons">
				<input class="check-button" type="submit" name="Confirmar Codigo" value="Confirmar Codigo">
				<a href="enter-email.php">página anterior</a>
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
	