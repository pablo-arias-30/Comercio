<!DOCTYPE html>
<html>
<?php include_once("analyticstracking.php") ?>
<?php session_start();?>
<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Página principal</title>
    <script src="model.js"></script>
    <script src="agregar-articulo-presenter.js"></script>
    <script>
        let presenter;
        function inicio() {
            // presenter.init();
            presenter = new AgregarArticuloPresenter(new ComprasApp(), document); //
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

    <div id="fondo">
        <img src="../Recursos/bienvenidos.jpg" width="180%" height="120%" />
        <div class="texto">
            <h2><strong>LA COMPRA NO HA PODIDO SER PROCESADA CORRECTAMENTE</strong></h2>
            <h2>VUELVA A INTENTARLO MÁS TARDE</h2>
        </div>
        <br> <br> <br> <br> <br>
    </div>

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
</body>

</html>