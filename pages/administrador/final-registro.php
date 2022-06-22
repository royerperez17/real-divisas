<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <div class="final-registro">
            <h1>ADMINISTRADOR REGISTRADO</h1>
            <p>espero que disfrute esta experiencia</p>
            <img src="/assets/img/usuario-registrado.png" alt="">
        </div>
    
        <div class="button">
            <a class="return-button" href="cuentaAdministrador.php">VOLVER</a>
        </div>

    </center>


    <style>
        body{
            /* background-color: blue; */
            text-align: center;
            margin: 0;
        }
        .final-registro{
            width: 400px;
            background-color: #c4c4c4;
            margin-top: 100px; 
            padding: 30px 0;
            border-radius: 5px;
            box-shadow:6px 6px 15px rgb(135, 132, 132);
        }
        .final-registro >h1{
            /* margin-top: 100px; */
            /* padding: 30px 0; */
            font-family: helvetica;
        }
        .final-registro > p{
            font-family: helvetica;
        }
        .final-registro > img{
            width: 250px;
        }

        .button{
            /* display: flex;
            flex-direction: row-reverse;
            flex-wrap: wrap;
            padding-right: 100px; */
            padding-top: 60px;
        }
        .button > .return-button{
            background-color: #f01111;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            padding: 8px 20px;
            cursor: pointer;
            font-family: helvetica;
        }


    </style>

</body>
</html>