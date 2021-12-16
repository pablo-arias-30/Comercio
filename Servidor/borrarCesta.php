<!DOCTYPE html>
<html>
    <script src="../Interfaz/model.js"></script>
    <script src="../Interfaz/borrar-cesta-presenter.js"></script>
    <script>
    function inicio() {
        presenterBorrarCarrito = new BorrarCestaPresenter(new ComprasApp(),
            document);
        presenterBorrarCarrito.borrarCompras();
        console.log(presenterBorrarCarrito.compras);
        document.location.href="../Interfaz/mostrarPedidos.php";
    }
    </script>
    <body onload="inicio()"></body>
</html>
