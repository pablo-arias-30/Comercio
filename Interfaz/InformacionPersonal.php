<?php include_once("analyticstracking.php") ?>

<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Mi perfil</title>
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
    $consulta2 = "SELECT * FROM cliente WHERE correo='$email' AND contrasena='$contrasena'";
    $datos = mysqli_query($conexion, $consulta2);
    $fila=mysqli_fetch_row($datos) or die( mysqli_error($db));
    mysqli_close($conexion);
    ?>

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
    <label id="cesta" width=2px height=2px>0</label>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <a href="../Servidor/cerrarSesion.php"><img id="cerrarSesion" src= "../Recursos/cerrarSesion.png"></a>
    <h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>

    <div class="informacion">

        <div class="dentro">
            <ul>
            <li class="flecha" > <a href="miperfil.php"><img src="../Recursos/atras.png" width="50px" height="50px"></a></li>

                <li><img src="../Recursos/usuario.png" width="50px" height="50px"  ><a href="InformacionPersonal.php"> Información Personal</a></li> 
<br><br><br><br><br><br>
</ul>
            
                <div id="datos" >
                    <div >

                        <img id="icono-dni" width="70px" height="50px" float="left" src="../Recursos/dni.png" />
                        <p>DNI:
                            <?php echo $fila[0] ?>
                        </p>
                        <img id="icono-nombre" width="50px" height="50px" float:left src="../Recursos/nombre.png" />
                        <p>Nombre:
                            <?php echo $fila[1] ?>
                        </p>
                        <img id="icono-nacimiento" width="50px" height="50px" float:left src="../Recursos/calendario.png" />
                        <p>Fecha de Nacimiento:
                            <?php echo $fila[6] ?>
                        </p>

                    </div>
                    <div >
                        <img id="icono-telefono" width="50px" height="50px" float=left src="../Recursos/telefono.png" />
                        <p>Telefono:
                            <?php echo $fila[2] ?>
                        </p>
                        <img id="icono-direccion" width="50px" height="50px" float=left src="../Recursos/home.png" />
                        <p>Direccion:
                            <?php echo $fila[3] ?>
                        </p>
                        <img id="icono-email" width="50px" height="50px" float=left src="../Recursos/email.png" />
                        <p>E-mail:
                            <?php echo $fila[4] ?>
                        </p>
</div>

                </div>
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