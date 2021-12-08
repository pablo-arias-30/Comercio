<!DOCTYPE html>
<html>
<?php include_once("analyticstracking.php") ?>
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
        presenter = new AgregarArticuloPresenter(new ComprasApp(),
            document
        ); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
        console.log(presenter.model);
        presenter.refresh();

    }
    </script>

</head>

<body onload="inicio()">
    <?php
$IDCompra = $_GET['IDCompra'];
$fechaCompra = $_GET['fechaCompra'];

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
                <li class="flecha"> <a href="mostrarPedidos.php"><img src="../Recursos/atras.png" width="50px"
                            height="50px"></a></li>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="mostrarPedidos.php">Mis
                        pedidos</a>
                </li>

                <br><br><br><br><br><br>
            </ul>


            <div>
                <?php

$conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
}

$consulta1 = "SELECT * FROM lineacompra where IDCompra = '$IDCompra'";
$resultado1 = mysqli_query($conexion, $consulta1);
if ($resultado1) {
    $i = 0;
    $unidades = array();
    $IDArt = array();
    while ($registro = $resultado1->fetch_assoc()) {
        $IDArt[$i] = $registro["IDArt"];
        $unidades[$i] = $registro["unidades"];
        $lineaCompra = $registro["IDLineaCompra"];
        $i++;
    }
    $tamaño = $i;
    $i = 0;
    ?>
    <h2 id="hPedido"><strong> ID de compra: <?php echo $IDCompra?></strong></h2><br><h2 id=hPedido><?php echo 'Fecha de compra:  ' . $fechaCompra;?></h2>
</strong><br><br><br><?php   
    while ($i < $tamaño) {
        $consulta2 = "SELECT * FROM articulo where IDArt = '$IDArt[$i]'";
        $resultado2 = mysqli_query($conexion, $consulta2);
        if ($resultado2) {
            while ($registro = $resultado2->fetch_assoc()) {
                ?>
                <img id="imagenPedido" src="../Recursos/<?php echo $registro["imagen"] ?>">
                <p id="datosPedido"><strong> Nombre de artículo: <?php echo $registro["nombre"] ?></strong> </p>
                <p id="datosPedido">Tipo: <?php echo $registro["tipo"] ?> </p>
                <p id="datosPedido">Precio por unidad: <?php echo $registro["precio"] ?> €</p>
                <p id="datosPedido">Unidades seleccionadas: <?php echo $unidades[$i] ?></p>
                <p id="datosPedido"><strong>Precio total: <?php echo $unidades[$i] * $registro["precio"] ?> €</strong>
                <br><br><br><br><br><br>
                </p>
                <?php
$i++;
            }
        }
    }
    mysqli_close($conexion);
}

?>



            </div>

            <div>

                </ul>
                <br>
                <br>
                <br>

</body>

</html>