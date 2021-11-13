
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
    <title>Catalogo Gafas de Vista</title> <script src="model.js"></script>
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

    <a href="index.html"><img id="imimagen" src="../Recursos/VISUALVISION.png"></a>
    <a href="carrito.php"><img id="compra" src="../Recursos/carrito.png"></a>
    <label id="cesta" width=2px height=2px>0</label>
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

    <a href="vistaDetallada.php?id=<?php echo $registro['IDArt'] . '&imagen=' . $registro['imagen'] . '&logo=' . $registro['logo'] .
    '&nombre=' . $registro['nombre'] . '&precio=' . $registro['precio'] . '&color=' . $registro['color'] ?>">
    <div id="gafas">
        <img id="imagen" src="../Recursos/<?php echo $registro['imagen'] ?>">
        <img id='marca' src="../Recursos/<?php echo $registro['logo'] ?>">
        <p id="p1"><?php echo $registro['nombre'] ?></p>
        <p id="p1"><?php echo $registro['precio'] ?> €</p>
        </div>
 </a>

    <?php
}
?>

</body>

</html>