<?php include_once("analyticstracking.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Mis Pedidos</title>
    <script src="model.js"></script>
    <script src="agregar-articulo-presenter.js"></script>
    <script>
    let presenter;

    function inicio() {
        // presenter.init();
        presenter = new AgregarArticuloPresenter(new ComprasApp(),
            document
        ); //
        console.log(presenter.model);
        presenter.refresh();
    }
    </script>
</head>

<body onload="inicio()">
    <?php

if (!isset($_COOKIE["usuario"])) { //Aún no se ha iniciado sesión
    header("Location: iniciarSesion.html");
}
//Conexion a BBDD

$conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
}

$email = $_COOKIE["email"];
$contrasena = $_COOKIE["contraseña"];
$consultaCliente = "SELECT * FROM cliente WHERE correo='$email' AND contrasena='$contrasena'";
$resultado1 = mysqli_query($conexion, $consultaCliente);

if ($resultado1) {
    while ($registro = $resultado1->fetch_assoc()) {
        if (isset($registro["dni"])) {
            $dni = $registro["dni"];
        }
    }

    $consulta = "SELECT * FROM compra WHERE dniCliente='$dni' ORDER BY fechaCompra DESC"; 

    $resultado = mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
} else {
    echo '<script>alert("Ha ocurrido algún error")</script>';
    header("Location: miperfil.php");
}

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

            <div class="datos">
                <ul id="atras">
                    <li class="flecha"> <a href="miperfil.php"><img src="../Recursos/atras.png" width="50px"
                                height="50px"></a></li>

                    <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="mostrarPedidos.php"> Mis
                            Pedidos</a></li>

                    <br>
                </ul>
                <?php

while ($registro = $resultado->fetch_assoc()) {

    ?>
                <div><a id="aPedido" href="vistaDetalladaPedido.php?IDCompra=<?php echo $registro['IDCompra'].'&fechaCompra='.$registro['fechaCompra']?>">
                        <h3 id="pedido">
                            <strong><?php echo ' ID Compra: ' . $registro['IDCompra'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ' Precio total ' . $registro["precio"] . ' €' ?></strong>
                            <br>Fecha de compra: <?php echo $registro['fechaCompra'] ?>
                        </h3>
                    </a>



                </div>

                <?php
}
?>
            </div>
        </div>
    </div>
    <br>
    </ul>
</body>

</html>