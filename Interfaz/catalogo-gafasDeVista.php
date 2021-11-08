
<?php 
//Conexion a BBDD
    $consulta = "SELECT * FROM articulo WHERE tipo ='Gafas de cerca' || tipo = 'Gafas progresivas'";
    $conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
    $conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
    if ($conexion->connect_error) {
        die('Error en la conexion' . $connect_error);
    } else {
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
    }

?><!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Catalogo Gafas de Vista</title>
</head>

<body>

    <a href="index.html"><img id="img1" src="../Recursos/VISUALVISION.png"></a>
    <a href="compra.html"><img id="compra" src="../Recursos/carrito.png"></a>
    <a href="miperfil.php"><img id="usuario" src="../Recursos/usuario.png"></a>
    <br>

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
    <?php 
 while ($registro = $resultado->fetch_assoc()) {
    ?>
    <div id="gafas">
    <a href="#">
        <img id="g1" src="../Recursos/<?php echo $registro['imagen']?>">
        <img id='marca' src="../Recursos/<?php echo $registro['logo']?>">
        <p id="p1"><?php echo $registro['nombre']?></p>
        <p id="p1"><?php echo $registro['precio']?> €</p>
 </a>
    </div>
    <?php 
 }
 ?>

</body>

</html>