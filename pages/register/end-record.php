<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" text="text/css" href="/assets/css/end-record.css">
   <title>Real Divisas | Justo y transparente</title>
   <link rel="shortcut icon" href="/assets/img/logo.PNG" type="image/png">
</head>
<body>
   <center>
   <div class="container">
      <?php
         require_once __DIR__."/..//plantilla/header.php"; 
    	?>
      <div class="content">
         <img src="/assets/img/final.PNG">
         <h1>¡Felicitaciones!<br>Cliente, tu cuenta ha sido creada</h1>
         <div class="buttons">
            <a href="/transaction/account.php">IR A MI CUENTA</a>
            <a href="/index.php">INICIO</a>
         </div>
      </div>
   </div>
   </center>
   <?php
      require_once __DIR__."/../plantilla/footer.php"; 
   ?>
</body>
</html>
