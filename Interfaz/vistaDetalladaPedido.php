<!DOCTYPE html>
<html>
<?php session_start();?>
<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Mis pedidos</title>
    <script src="model.js"></script>
        <script src="agregar-articulo-presenter.js"></script>
        
        <script>
             let presenter;
            function inicio() {
           // presenter.init();
           presenter = new AgregarArticuloPresenter(new ComprasApp(), document); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
                console.log(presenter.model);
                presenter.refresh();

            }
        </script>

</head>

<body onload="inicio()">
<?php
$IDCompra = $_GET['IDCompra'];
// $unidades = $_GET['unidades'];
$fechaCompra = $_GET['fechaCompra'];
$precio = $_GET['precio'];
$direccionEnvio = $_GET['direccionEnvio'];
$unidades = $_GET['unidades'];
$imagen = $_GET['imagen'];
$nombre = $_GET['nombre'];
$tipo = $_GET['tipo'];


?>
    
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

<a href="index.html"><img id="imimagen" src="../Recursos/VISUALVISION.png"></a>
<a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
<label id="cesta" width=2px height=2px>0</label>
<a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
<a href="../Servidor/cerrarSesion.php"><img id="cerrarSesion" src="../Recursos/cerrarSesion.png"></a>


<h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>

<div class="informacion">

    <div class="dentro">
        <ul>
            <li class="flecha" > <a href="miperfil.php"><img src="../Recursos/atras.png" width="50px" height="50px"></a></li>
            <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="mostrarPedidos.php">Mis pedidos</a>
            </li>

            <br><br><br><br><br><br>
        </ul>   
    <?php setcookie("IDLineaCompra", "$IDCompra", time() + 86400, "/");
//setcookie("unidades", "$unidades", time() + 86400, "/");
setcookie("fechaCompra", "$fechaCompra", time() + 86400, "/");
setcookie("precio", "$precio", time() + 86400, "/");
setcookie("direccionEnvio", "$direccionEnvio", time() + 86400, "/");
setcookie("unidades", "$unidades", time() + 86400, "/");
setcookie("imagen", "$imagen", time() + 86400, "/");
setcookie("nombre", "$nombre", time() + 86400, "/");
setcookie("tipo", "$tipo", time() + 86400, "/");?>

    <div>
    
        <h2 id="hPedido"> ID Compra: <?php echo $IDCompra. '  Fecha de Compra:  '  .$fechaCompra ?> </h2>
        
        <img id="imagenPedido" src="../Recursos/<?php echo $imagen ?>">
        <p id="datosPedido"> Nombre: <?php echo $nombre ?> </p>
        <p id="datosPedido">Tipo: <?php echo $tipo ?> </p>
        <p id="datosPedido">Precio: <?php echo $precio ?> €</p>
        <p id="datosPedido">Unidades: <?php echo $unidades ?></p>

     </div>

    <div>

</ul>
<br>
<br>
<br>

</body>

</html>