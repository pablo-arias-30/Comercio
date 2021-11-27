<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="./stile.css" type="text/css">
    <title>Mi perfil</title>
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
    $consulta = "SELECT * FROM cliente";
    $datos = mysqli_query($conexion, $consulta);
    $fila=mysqli_fetch_row($datos) or die( mysqli_error($db));
    mysqli_close($conexion);
    ?>

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
    <label id="cesta" width=2px height=2px>0</label>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>

    <div class="perfil">

        <div class="dentro">
            <ul>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="">Mis pedidos</a>
                </li>
                <li><img src="../Recursos/reloj.png" width="50px" height="50px"><a href="mostrarCitas.php">Mis citas</a></li>
            </ul>
            <div>
                <img id="perfilUsuario" src="https://images.vexels.com/media/users/3/137047/isolated/preview/5831a17a290077c646a48c4db78a81bb-icono-de-perfil-de-usuario-azul.png" />
                <div id=datos1 class="perfil-usuario-datos1">
                    <div id="datos1" class="perfil-usuario-bio">

                        <img id="icono-dni" float:left src="data:image/png;base64,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" />
                        <p>DNI:
                            <?php echo $fila[0] ?>
                        </p>
                        <img id="icono-nombre" float:left src="https://thumbs.dreamstime.com/b/icono-de-la-persona-en-l%C3%ADnea-estilo-s%C3%ADmbolo-del-hombre-aislado-el-fondo-blanco-simple-extracto-avatar-negro-usuario-firma-143908179.jpg" />
                        <p>Nombre:
                            <?php echo $fila[1] ?>
                        </p>
                        <img id="icono-nacimiento" float:left src="https://cdn.pixabay.com/photo/2019/12/31/12/22/dob-4731797_960_720.png" />
                        <p>Fecha de Nacimiento:
                            <?php echo $fila[6] ?>
                        </p>

                    </div>
                    <li id="datos2" class="perfil-usuario-bio">
                        <img id="icono-telefono" float:left src="https://static.vecteezy.com/system/resources/previews/002/261/151/non_2x/phone-icon-symbol-sign-isolate-on-white-background-illustration-free-vector.jpg" />
                        <p>Telefono:
                            <?php echo $fila[2] ?>
                        </p>
                        <img id="icono-direccion" float:left src="https://images.vexels.com/media/users/3/157341/isolated/preview/7fe3ac0e3e17582af32282dc82303a2b-icono-de-casa-plana-bungalow-negro.png" />
                        <p>Direccion:
                            <?php echo $fila[3] ?>
                        </p>
                        <img id="icono-email" float:left src="https://w7.pngwing.com/pngs/14/238/png-transparent-email-computer-icons-maxcuttm-inc-email-miscellaneous-cdr-angle.png" />
                        <p>E-mail:
                            <?php echo $fila[4] ?>
                        </p>
                    </li>

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