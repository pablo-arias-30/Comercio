<!DOCTYPE html>
<html>
<?php session_start();?>


<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Pago PayPal</title>
    <script src="model.js"></script>
    <script src="carrito-presenter.js"></script>
    <script src="agregar-articulo-presenter.js"></script>
    <script src="borrar-cesta-presenter.js"></script>

    <script>
    function inicio() {
        presenterNumeroCarrito = new AgregarArticuloPresenter(new ComprasApp(),
            document
        ); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
        presenterNumeroCarrito.refresh();
        presenterBorrarCarrito = new BorrarCestaPresenter(new ComprasApp(),
            document
        ); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
        presenterVistaCarrito = new CarritoPresenter(new ComprasApp(),
            document
        ); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado

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
            <h3>Precio a pagar: <?php echo $_SESSION["total"] ?> €</h3>
            <form method="POST" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="cancel_return" value="http://localhost/Servidor/procesarPago.php">
                <input type="hidden" name="business" value='sb-5t3dd8614688@business.example.com'>
                <input type="hidden" name="item_name" value="Compra en VISUALVISION">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="business_name" value="VISUALVISION">
                <input type="hidden" name="return" value="http://localhost/Servidor/procesarPago.php">
                <input type="hidden" name="paymentaction" value="sale">
                <input type="hidden" name="first_name" value='<?php echo $_SESSION['nombreC'] ?>'>
                <input type="hidden" name="amount" value='<?php echo $_SESSION["total"] ?>'>
                <button id="borrar">
                    <input class="botones" type="submit" value="Realizar pago">
                    <input type="image"
                        src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
                        alt="PayPal Checkout" name="submit">

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