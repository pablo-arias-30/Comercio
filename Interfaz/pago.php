<!DOCTYPE html>
<html>
<?php include_once("analyticstracking.php") ?>
<?php session_start();?>


<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Pago</title>
    <script src="model.js"></script>
    <script src="carrito-presenter.js"></script>
    <script src="agregar-articulo-presenter.js"></script>
    <script src="borrar-cesta-presenter.js"></script>

    <script>
    function inicio() {
        presenterNumeroCarrito = new AgregarArticuloPresenter(new ComprasApp(),
            document
        ); //
        presenterNumeroCarrito.refresh();
        presenterBorrarCarrito = new BorrarCestaPresenter(new ComprasApp(),
            document
        ); //
        presenterVistaCarrito = new CarritoPresenter(new ComprasApp(),
            document
        ); //

    }
    </script>

</head>

<body onload="inicio()">

    <?php if (!isset($_COOKIE["usuario"])) { //Aún no se ha iniciado sesión
    echo '<script type="text/javascript">
    alert("Debes iniciar sesión para poder pedir completar el pago");
    window.location.href="iniciarSesion.html";
    </script>';
}

?>


    <a href="index.html"><img id="imimagen" src="../Recursos/VISUALVISION.png"></a>
    <a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
    <label id="cesta" width=2px height=2px>0</label>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <br>
    <ul class="Menu">
        <li><a href="index.html">PÁGINA PRINCIPAL</a></li>
        <li><a href="">CATÁLOGO</a>
            <ul>
                <li><a href="catalogo-gafasDeSol.php">Gafas de sol</a></li>
                <li><a href="catalogo-gafasDeVista.php">Gafas de vista</a></li>
                <li><a href="catalogo-otros.php">Otros</a></li>
            </ul>
        </li>
        <li><a href="miperfil.php">MI CUENTA</a>
            <ul>
                <li><a href="iniciarSesion.html">Iniciar sesión</a></li>
                <li><a href="registro.html">Nuevo usuario</a></li>
            </ul>
        </li>
        <li> <a href="pedirCita.php">PEDIR CITA</a></li>

    </ul>
    <div id="fondo2">
        <section class="form-registro">

            <h3>Complete la información de pago</h3>
            <form  action="../Servidor/guardarPago.php" method="POST">
                Nombre y apellidos<br><br>
                <input class="controls" type="text" name="nombreC" value='<?php echo $_COOKIE["usuario"] ?>'><br><br>
                Teléfono de contacto:<br><br>
                <input class="controls" type="text" name="telefono"><br><br>
                Dirección de envío:<br><br>
                <input class="controls" type="text" name="direccion"
                    placeholder="C/ ..............., nº 28, 4º J, Albacete"><br><br>
                Código Postal:<br><br>
                <input class="controls" type="text" name="codigoPostal"><br><br>
                Provincia:<br><br>
                <input class="controls" type="text" name="provincia"><br><br>
                Ciudad:<br><br>
                <input class="controls" type="text" name="ciudad"><br><br>
                
                Para completar el pago, será redireccionado a PayPal
                <p> <input class="check" type="checkbox"> Acepto los <a href="#">Terminos y Condiciones</a>
                </p>
                <button id="borrar">
                    <input class="botones" type="submit" value="Continuar">
                    <input type="image"
                        src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
                        alt="PayPal Checkout">

            </form>
        </section>
        <br><br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br>
    </div>
    </div>


    </form>
</body>

</html>