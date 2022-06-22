<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" text="text/css" href="/assets/css/enter-email.css">
	<title>Real Divisas | Justo y transparente</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
    <center>
	<div class="container">
		<?php
      	require_once __DIR__."/../plantilla/header.php"; 
    	?>
		<form action="write-code.php" method="POST">
		<div class="content-mail">
			<h1>INGRESE SU CORREO ELECTRÓNICO</h1>	
			<table class="content">
				<td>
					<p>Correo electrónico</p>
					<input type="text" name=""  placeholder="Correo electrónico">
				</td>
			</table>
			<div class="buttons">
				<input class="search-button" type="submit" name="BUSCAR CUENTA" value="BUSCAR CUENTA">
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
	