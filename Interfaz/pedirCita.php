
<?php session_start();?>
<?php if (!isset($_COOKIE["usuario"])) { //Aún no se ha iniciado sesión
    echo '<script type="text/javascript">
    alert("Debes iniciar sesión para poder pedir cita");
    window.location.href="iniciarSesion.html";
    </script>';
    
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="stile.css" type="text/css">
    <title>Pedir cita</title> <script src="model.js"></script>
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

    <div id="fondo3">
        <section class="form-registro">
            <h3>Nueva cita en VISUALVISION</h3>
            <form action="../Servidor/cita.php" method="POST">
                Introduzca su DNI:<br><br>
                <input class="controls" type="text" name="dniCliente" placeholder="DNI"><br><br> Introduzca la
                fecha:<br><br>
                <input class="controls" type="date" name="fechaCita" placeholder="Fecha de la cita"><br><br>
                Introduzca la
                hora: (Horario de 9:00 a 21:00)<br><br>
                <input type="time" class="controls" name="hora" min="09:00" max="21:00"
                    placeholder="Hora de la cita"><br><br>
                <input class="botones" type="submit" value="Tramitar Cita">
            </form>
        </section>
    </div>

</body>

</html>