<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="/assets/css/log-start.css">
	<title>Real Divisas | Justo y transparente</title>
	<link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
<center>
	<div class="container">
		<?php
      	require_once __DIR__."/../plantilla/header.php"; 
    	?>
		<div class="content">
			<div class="title-content">
				<h1>¿Con qué perfil deseas<br> realizar operaciones?</h1>
			</div>
			<div class="content-register">
				<div class="register">
					<a class="title-register" href="person-registration.php">Persona Natural</a>
					<a href="person-registration.php"><img class="election-register" src="/assets/img/persona.PNG"></a>
				</div>
				<div class="register">
					<a class="title-register" href="company-registration.php">Empresa</a>
					<a href="company-registration.php"><img class="election-register" src="/assets/img/empresa.PNG"></a>
				</div>
			</div>
		</div>
	</div>
</center>
	<?php
      require_once __DIR__."/../plantilla/footer.php"; 
    ?>
</body>
</html>
