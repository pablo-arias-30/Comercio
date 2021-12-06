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
        ); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
        console.log(presenter.model);
        

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
            if (!empty($registro["dni"])) { //Se ha encontrado a esa persona
                $dni = $registro["dni"];
            }
        }
   
    }
    $consulta = "SELECT * FROM compra c INNER JOIN lineaCompra lc
                ON c.IDCompra = lc.IDCompra
                INNER JOIN articulo a
                where (a.IDCompra = c.IDCompra) AND (c.dniCliente = '$dni')";
                
            
    $resultado = mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    
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

    <div class="perfil">

        <div class="dentro">
            <ul id="atras">
            <li class="flecha" > <a href="miperfil.php"><img src="../Recursos/atras.png" width="50px" height="50px"></a></li>

                <li  ><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="mostrarPedidos.php"> Mis Pedidos</a></li>

<br><br><br><br><br><br>
</ul>
<?php
    while ($registro = $resultado->fetch_assoc()) {
        ?>
        
        <a id="aPedido" href="vistaDetalladaPedido.php?IDCompra=<?php echo $registro['IDCompra'] . '&fechaCompra=' . $registro['fechaCompra'] . '&precio=' . $registro['precio'].
        '&direccionEnvio=' . $registro['direccionEnvio']. '&IDLineaCompra=' .$registro['IDLineaCompra']. 
        '&unidades=' .$registro['unidades']. '&imagen=' .$registro['imagen']. '&nombre=' .$registro['nombre']. '&tipo=' .$registro['tipo']?>">
        
        <div>
            <h3 id="pedido"><?php echo ' ID Compra: ' .$registro['IDCompra'].
            ' - Fecha de Compra: ' .$registro['fechaCompra']. 
            '$ - Direccion de Envio: ' .$registro['direccionEnvio']?></h3>
            

        </div>

        </a>
    
    <?php
    }
?>
<br>
</ul>
</body>

</html>


