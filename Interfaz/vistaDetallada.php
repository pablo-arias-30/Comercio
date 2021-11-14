<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Catalogo Gafas de Sol</title>
    <script src="model.js"></script>
        <script src="agregar-articulo-presenter.js"></script>
        <script src="carrito-presenter.js"></script>
        <script>
             let presenter;
            function inicio() {
           // presenter.init();
           presenterCarrito = new CarritoPresenter(new ComprasApp(), document); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
           presenter = new AgregarArticuloPresenter(new ComprasApp(), document); //document porque el id esta dentro y solo nos interesa el id de la tarea para mostrar el mensaje de que se ha borrado
                console.log(presenter.model);
                presenter.refresh();

            }
        </script>

</head>

<body onload="inicio()">
<?php
$id = $_GET['idA'];
$nombre = $_GET['nombre'];
$precio = $_GET['precio'];
$imagen = $_GET['imagen'];
$logo = $_GET['logo'];
$color = $_GET['color'];

?>
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
    <?php setcookie("imagen", "$imagen", time() + 3600, "/");
setcookie("logo", "$logo", time() + 3600, "/");
setcookie("nombre", "$nombre", time() + 3600, "/");
setcookie("color", "$color", time() + 3600, "/");
setcookie("logo", "$logo", time() + 3600, "/");
setcookie("idA", "$id", time() + 3600, "/");
setcookie("precio", "$precio", time() + 3600, "/");?>

    <div id="gafasphp">
    <h2 id="nombre"><?php echo $nombre ?></h2>
        <img id="imagenphp" src="../Recursos/<?php echo $imagen ?>">
        <img id='marcaphp' src="../Recursos/<?php echo $logo ?>">
        <p id="colorphp">Color: <?php echo $color ?></p>
        <p id="preciophp"><?php echo $precio ?> €</p>
        <p id ="idphp">ID de referencia: <?php echo $id ?></p>
        <div id="enlace">
    <nav>
    <form method="POST">
    <p id ="pCantidad">Seleccione cantidad:</p>
    <input id="cantidad" type="number" name="cantidad" value=1 max=20 min=1>
            <input id="añadir" type="submit" value="Añadir al carrito" onclick="presenter.guardarClick(event); setTimeout(function(){ alert('¡Artículo añadido al carrito!'); }, 200);">
        </form>
    </nav>

    </div>


</body>

</html>