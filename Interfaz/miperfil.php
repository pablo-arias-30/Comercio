<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="./stile.css" type="text/css">
    <title>Mi perfil</title>
</head>

<body>
    <?php
if (!isset($_COOKIE["usuario"])) { //Aún no se ha iniciado sesión
    header("Location: iniciarSesion.html");
}

?>

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="compra.html"><img id="compra" src="../Recursos/carrito.png"></a>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <a href="cerrarSesion.php"><img id="cerrarSesion" src= "../Recursos/cerrarSesion.png"></a>

    <h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>

    <div class="perfil">

        <div class="dentro">
            <ul>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="">Mis pedidos</a>
                </li>
                <li><img src="../Recursos/reloj.png" width="50px" height="50px"><a href="mostrarCitas.php">Mis citas</a></li>
            </ul>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
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
</body>

</html>