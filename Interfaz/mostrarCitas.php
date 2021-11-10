<?php session_start();
function guardarCita($conexion, $email, $contrasena)
{
    $consultaCliente = "SELECT dni FROM cliente WHERE correo = '$email'  &&  contrasena = '$contrasena'";
    $resultado1 = mysqli_query($conexion, $consultaCliente);
    if ($resultado1) {
        while ($registro = $resultado1->fetch_assoc()) {
            if (!empty($registro["dni"])) { //Se ha encontrado a esa persona
                $dni = $registro["dni"];
            }
        }
        $cita = "SELECT fecha, hora FROM cita WHERE dniCliente='$dni'";
        $resultado2 = mysqli_query($conexion, $cita);
        if ($resultado2) {
            $registro = array();
            $fecha = array();
            $hora = array();
            $i = 0;
            while ($registro = $resultado2->fetch_assoc()) {
                if (!empty($registro["fecha"]) && !empty($registro["hora"])) { //Vamos guardando las citas
                    $fecha[$i] = $registro["fecha"] . "\n";
                    $hora[$i] = $registro["hora"] . "\n";
                    $i++;
                }
            }
            $_SESSION["fechaCita"] = array();
            $_SESSION["horaCita"] = array();
            //Guardamos las citas en la sesion
            $_SESSION["fechaCita"] = $fecha;
            $_SESSION["horaCita"] = $hora;

        }
    }
}
//Conexion a BBDD
$conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
} else {
    $email = $_COOKIE["email"];
    $contrasena = $_COOKIE["contraseña"];
    guardarCita($conexion, $email, $contrasena);
    mysqli_close($conexion);
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Mis Citas</title> <script src="model.js"></script>
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

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
    <label id="cesta" width=2px height=2px>0</label>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <a href="../Servidor/cerrarSesion.php"><img id="cerrarSesion" src= "../Recursos/cerrarSesion.png"></a>


    <h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>

    <div class="perfil">

        <div class="dentro">
            <ul>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="">Mis pedidos</a>
                </li>
                <li><img src="../Recursos/reloj.png" width="50px" height="50px"><a href="mostrarCitas.php">Mis citas</a><br><br>
                </li>
                <?php
$citas = array();
$horas = array();
$citas = $_SESSION['fechaCita'];
$horas = $_SESSION['horaCita'];

for ($i = 0; $i < sizeof($citas); $i++) {
    echo "<h3>Día: $citas[$i]" . ' a las ' . "$horas[$i]</h3>" . '<br>';
}
?><br>
        </div>
    <br>

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