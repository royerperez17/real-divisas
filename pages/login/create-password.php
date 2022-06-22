
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/create-password.css">
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
		<div class="content-password">
			<h2>CREA UNA NUEVA CONTRASEÑA</h2>	
			<table class="content">
				<tr>
					<td>
					   <p>Escribir contraseña</p>
						<input type="password" name=""  placeholder="nueva contraseña">
					</td>
				</tr>	
				<tr>
					<td>
					   <p>Confirmar contraseña</p>
						<input type="password" name=""  placeholder="Confirmar nueva contraseña">
					</td>
				</tr>
			</table>
         <div class="buttons">
				<input class="confirm-button" type="submit" name="CONTINUAR" value="CONTINUAR">
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
	