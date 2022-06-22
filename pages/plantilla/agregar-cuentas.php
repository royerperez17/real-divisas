
<link rel ="stylesheet" text="text/css" href="/assets/css/agregar-cuentas.css">

<!--ventana para la cuenta personal-->
<form action="formulario-cuentaPersonal.php" method="post">
    <div class="cuenta-personal" id="cuenta-personal">
        <div class="cerrar" id="cerrar">
            <a href="javascript:cerrar()"> <img src="/assets/img/cerrar.png" alt=""> </a>
            <hr>
        </div>
        <div class="account-box-personal">
            <a href="javascript:cuentaPersonal()" id="first-register">CUENTA PERSONAL</a>
            <a href="javascript:cuentaTerceros()">CUENTA TERCEROS</a>
        </div>
        <div class="content">
            <select name="bancos">
                <option value="" selected disabled>Banco</option>
                <option value="interbank">Interbank</option>
                <option value="bcp">BCP</option>
                <option value="bbva">BBVA</option>
                <option value="scotiabank">Scotiabank</option>
            </select>
            <input type="text" name="numeroCuenta" placeholder="Número de cuenta">
            <span>debe ser entre 13 y 14 caracteres</span>
            <input type="text" name="tipoCuenta" placeholder="Tipo de cuenta">
            <select name="moneda">
                <option value="" selected disabled>Moneda</option>
                <option value="dolares">Dolares</option>
                <option value="soles">soles</option>
            </select>
            <input type="text" name="aliasCuenta" placeholder="Alias de la cuenta">
            <span><img src="/assets/img/tarjeta-credito.png" alt=""> Tu nombre + banco + moneda</span>
        </div>
        <div class="buttons">
            <div class="verificar">
                <input type="checkbox" name="aceptar">
                <span>Declaro que toda la información colocada es correcta y que esta cuenta es mía</span>
            </div>
            <center>
                <input class="add-button" type="submit" name="agregarCuentaPersonal" value="AGREGAR CUENTA">
            </center>
        </div>
    </div>
</form>

    
    <!--ventana para la cuenta terceros-->
<form action="formulario-cuentaTerceros.php" method="POST" >
    <div class="cuenta-terceros" id="cuenta-terceros">
        <div class="cerrar">
            <a href=""> <img src="/assets/img/cerrar.png" alt=""> </a>
            <hr>
        </div>
        <div class="account-box-terceros">
            <a href="javascript:cuentaPersonal()">CUENTA PERSONAL</a>
            <a href="javascript:cuentaTerceros()" id="second-register">CUENTA TERCEROS</a>
        </div>
        <div class="content">

            <span>¿A quien pertenece esta cuenta?</span> 
            <div class="elegir">
                <input type="radio" name="pertenencia" value="persona"checked>
                <label for="persona">A una persona</label>
                <input type="radio" name="pertenencia" value="empresa">
                <label for="empresa">A una empresa</label>
            </div>

            <div class="content-document">
                <select name="tipoDocumento">
                    <option value=""selected disabled>Tipo documento</option>
                    <option value="DNI">DNI</option>
                    <option value="RUC">RUC</option>
                </select>
                <input type="text" name="numeroDocumento" placeholder="Nro. de documento">
            </div>
            <input type="text" name="nombreCompleto" placeholder="Nombre completo">
            <input type="text" name="correo" placeholder="Correo  electronico">
            <input type="text" name="ocupacion" placeholder="Ocupación">
            <select name="bancos">
                <option value=""selected disabled>Banco</option>
                <option value="interbank">Interbank</option>
                <option value="bcp">BCP</option>
                <option value="bbva">BBVA</option>
                <option value="scotiabank">Scotiabank</option>
            </select>
            <input type="text" name="numeroCuenta" placeholder="Número de cuenta">
            <span>debe ser entre 13 y 14 caracteres</span>
            <input type="text" name="tipoCuenta" placeholder="Tipo de cuenta">
            <select name="moneda">
                <option value="" selected disabled>Moneda</option>
                <option value="dolares">Dolares</option>
                <option value="soles">soles</option>
            </select>
            <input type="text" name="aliasCuenta" placeholder="Alias de la cuenta">
            <span><img src="/assets/img/tarjeta-credito.png" alt=""> Tu nombre + banco + moneda</span>
        </div>
        <div class="buttons">
            <div class="verificar-one">
                <input type="checkbox" name="aceptar">
                <span>Declaro que toda la información colocada es correcta, actual y asumo total responsabilidad de
                    su
                    veracidad</span>
            </div>
            <div class="verificar-two">
                <input type="checkbox" name="aceptar">
                <span>Declaro que cuento con el consentimiento para el uso de datos de la persona y/o empresa acá
                    expuesta, en conformidad con el tratamiento de los mismos en relación a sus politicas de
                    privacidad</span>
            </div>
            <center>
                <input class="add-button" type="submit" name="agregarcuentaTerceros" value="AGREGAR CUENTA">
            </center>
        </div>
    </div>
</form>