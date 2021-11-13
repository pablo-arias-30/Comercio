<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Catalogo Gafas de Sol</title>
    <script src="model.js"></script>
        <script src="carrito-presenter.js"></script>
        <script>
             let presenter;
            function inicio() {
           presenter = new CarritoPresenter(new ComprasApp(), document); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
           console.log(presenter.model);
                presenter.refresh();
            }
        </script>

</head>

<body onload="inicio()">

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

    <div id="gafas">
    <div id="imagenCarrito">
    <img id='marca'>
    <p id="p1"></p>
    <p id="p2"></p>
    <p id="p3"></p>



</body>

</html>
