<?php session_start();
function guardarCita($conexion, $email, $contrasena){
    $consultaCliente="SELECT dni FROM cliente WHERE correo = '$email'  &&  contrasena = '$contrasena'";
    $resultado1 = mysqli_query($conexion, $consultaCliente);
    if($resultado1){
    while ($registro = $resultado1->fetch_assoc()) {
        if (!empty($registro["dni"])) { //Se ha encontrado a esa persona
            $dni = $registro["dni"];
        }
    }
    $cita= "SELECT fecha, hora FROM cita WHERE dniCliente='$dni'";
    $resultado2 = mysqli_query($conexion, $cita); 
    if ($resultado2){
        $registro=array();
        $fecha=array();
        $hora=array();
       $i=0;
        while ($registro = $resultado2->fetch_assoc()) {
            if (!empty($registro["fecha"])&&!empty($registro["hora"])) { //Se ha encontrado a esa persona
              //for($i=0; $i<sizeof($registro);$i++){
                $fecha[$i] = $registro["fecha"]."\n";
                $hora[$i]  = $registro["hora"]."\n";
            $i++;
        }
        }
        $_SESSION ["fechaCita"]=array();
        $_SESSION ["horaCita"]=array();

        $_SESSION ["fechaCita"]=$fecha;
        $_SESSION ["horaCita"]=$hora;

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
    $email=$_COOKIE["email"] ;
    $contrasena=$_COOKIE["contraseña"] ;
    guardarCita($conexion,$email,$contrasena);
    mysqli_close($conexion);
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Mis Citas</title>
</head>

<body>

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="compra.html"><img id="compra" src="../Recursos/carrito.png"></a>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>

    <h2 id="nombrePerfil">Hola, <?php echo $_COOKIE["usuario"] ?></h2>
    
    <div class="perfil">

        <div class="dentro">
            <ul>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="">Mis pedidos</a>
                </li>
                <li><img src="../Recursos/pedidos.png" width="50px" height="50px"><a href="mostrarCitas.php">Mis citas</a><br><br>
                <?php 
    echo implode($_SESSION["fechaCita"]); //Implode pasa array a String
    echo "\n";
    ?>
    <br>
    <?php echo implode($_SESSION["horaCita"])?></li>
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
                <li><a href="catalogo-gafasDeSol.html">Gafas de sol</a></li>
                <li><a href="catalogo-gafasDeVista.html">Gafas de vista</a></li>
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