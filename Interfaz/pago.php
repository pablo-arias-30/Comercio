<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Resumen compra</title>
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
                <li><a href="catalogo-otros.html">Otros</a></li>
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
    <div id="vaciar">
        <div class="perfil">
            <div class="dentro">
                <br><br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div id="fondo2">
        <section class="form-registro">
            <h3>Complete el pago</h3>
            <form method="POST" action="../Servidor/registrarse.php">
                Introduzca su DNI:<br><br>
                <input class="controls" type="text" name="dni" placeholder="DNI"><br><br> Introduzca su nombre y
                apellidos:<br><br>
                <input class="controls" type="text" name="nombre" placeholder="Nombre y apellidos"><br><br> Introduzca
                su fecha de nacimiento:<br><br>
                <input class="controls" type="date" name="nacimiento" placeholder="año/mes/dia"><br><br> Introduzca su
                teléfono:<br><br>
                <input class="controls" type="text" name="telefono" placeholder="Teléfono"><br><br> Introduzca su
                dirección:<br><br>
                <input class="controls" type="text" name="direccion" placeholder="Dirección"><br><br> Introduzca su
                e-mail:<br><br>
                <input class="controls" type="email" name="email" placeholder="Correo electrónico"><br><br> Introduzca
                su contraseña:<br><br>
                <input class="controls" type="password" name="contraseña" placeholder="Contraseña">
                <p> <input class="check" type="checkbox"> Acepto los <a href="#">Terminos y Condiciones</a></p>
                <input class="botones" type="submit" value="Registrarme">
                <p><a href="iniciarSesion.html">Ya estoy registrado</a></p>
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
        <div id="borrarCarrito">
            <nav>
                <form action="cesta.php">
                    <input id="borrar" type="submit" value="Vaciar carrito">
                </form>
            </nav>
        </div>
        <form action="https://www.sandbox.paypal.com/es/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value='sb-5t3dd8614688@business.example.com'>
    <input type="hidden" name="item_name" value="Compra con prueba mínima">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="amount" value="81.18">
    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png"
        alt="PayPal Checkout" name="submit">
</form>
</body>

</html>