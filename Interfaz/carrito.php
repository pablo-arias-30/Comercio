<!DOCTYPE html>
<html>
<?php session_start();?>
<?php include_once("analyticstracking.php") ?>


<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Catalogo Gafas de Sol</title>
    <script src="model.js"></script>
    <script src="carrito-presenter.js"></script>
    <script src="agregar-articulo-presenter.js"></script>
    <script src="borrar-cesta-presenter.js"></script>

    <script>
    function inicio() {
        presenterVistaCarrito = new CarritoPresenter(new ComprasApp(),
            document
        ); //
        presenterVistaCarrito.refresh();
        presenterBorrarCarrito = new BorrarCestaPresenter(new ComprasApp(),
            document
        ); //
        presenterNumeroCarrito = new AgregarArticuloPresenter(new ComprasApp(),
            document
        ); //
        presenterNumeroCarrito.refresh();

        modelo = new ComprasApp();
        console.log(modelo);

        for (let i = 0; i < modelo.compras.length; i++) {
            document.cookie = "compras" + i + "=" + modelo._compras[i]._id + ";max-age=3600*60; path=/";
            document.cookie = "precios" + i + "=" + modelo._compras[i]._precio + ";max-age=3600*60; path=/";
            document.cookie = "cantidades" + i + "=" + modelo._compras[i]._cantidad + ";max-age=3600*60; path=/";
        }
        let total = presenterVistaCarrito.precioTotal();
        console.log(total);
        document.cookie = 'total=' + total + ' ;max-age=3600*60; path=/';
        document.cookie = 'items=' + presenterVistaCarrito.numeroItems() + ' ;max-age=3600*60; path=/';
    }
    </script>

</head>

<body onload="inicio()">
<?php include_once "analyticstracking.php"?>

    <?php

setcookie("total", '', time() - 60);
setcookie("PVP", '', time() - 60, '/');
$i = 0;

while (isset($_COOKIE["compras$i"])) {
    setcookie("compras$i", '', time() - 60, '/');
    setcookie("cantidades$i", '', time() - 60, '/');
    setcookie("precios$i", '', time() - 60, '/');
    $i++;

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
    <div id="vaciar">
        <div id="borrarCarrito">
            <nav>
                <form>
                    <input id="borrar" type="submit" value="Vaciar carrito"
                        onclick="presenterBorrarCarrito.borrarCesta(); ">
                </form>
            </nav>
        </div>
        <div id="realizarCompra">
            <nav>
                <form action="../Interfaz/pago.php">
                    <input id="comprar" type="submit" value="Realizar pago">

                </form>
            </nav>
        </div>

        <div id="bloqueGrande">
        </div>
    </div>
</body>

</html>