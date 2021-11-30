<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="../Interfaz/stile.css" type="text/css">
    <title>Procesar</title>
    <script src="../Interfaz/model.js"></script>
    <script src="../Interfaz/carrito-presenter.js"></script>


    <script>
    function inicio() {
    }
    </script>
</head>

<body onload="inicio()">
</body>

<?php

function procesarCantidad($resultado, $conexion, $i, $parar)
{
    while ($registro = $resultado->fetch_assoc()) {
        if ($registro["IDArt"] >= 0) { //Hay stock
            //Podemos pagar
            if ($i == $parar - 1) {
                //Borramos cookies ids compra y cantidades por seguridad y las pasamos a la sesión
                setcookie("compras", '', time() - 60, '/');
                setcookie("cantidades", '', time() - 60, '/');
                setcookie("total", '', time() - 60, '/');
                setcookie("precios", '', time() - 60, '/');
                mysqli_close($conexion);
                echo '<script>document.location.href = "../Interfaz/paypal.php";
        </script>';
            }
        } else {
            mysqli_close($conexion);
            echo '<script>alert("Lo sentimos, no hay el stock necesario para su compra");
        document.location.href = "../Interfaz/carrito.php";
        </script>';
        }
    }
}

if (!empty($_POST["direccion"]) && !empty($_POST["nombreC"])
    && !empty($_POST["telefono"]) && !empty($_POST["ciudad"])
    && !empty($_POST["codigoPostal"]) && !empty($_POST["provincia"])) {

//Comprobamos que haya stock

//Guardamos direccion, nombre y telefono
    $_SESSION["direccion"] = $_POST["direccion"];
    $_SESSION["nombreC"] = $_POST["nombreC"];
    $_SESSION["telefono"] = $_POST["telefono"];
    $_SESSION["codigoPostal"] = $_POST["codigoPostal"];
    $_SESSION["ciudad"] = $_POST["ciudad"];
    $_SESSION["provincia"] = $_POST["provincia"];
    $_SESSION["total"] = $_COOKIE["total"];

    $ids = array();
    $cantidades = array();
    $precios = array();
    $i = 0;
    $vueltas= $_COOKIE["items"];

    while ($i<$vueltas){
        $_SESSION["ids"][$i] = $_COOKIE["compras$i"];
        $_SESSION["cantidades"][$i] = $_COOKIE["cantidades$i"];
        $_SESSION["precios"][$i] = $_COOKIE["precios$i"];
        $i++;
    }
    //Copiando arrays
    for ($i = 0; $i < $vueltas; $i++) {
        $ids[$i] = $_SESSION["ids"][$i];
        $cantidades[$i] = $_SESSION["cantidades"][$i];
        $precios[$i] = $_SESSION["precios"][$i];
    }

//Conexion a BBDD
    for ($i = 0; $i < sizeof($ids); $i++) {
        $consulta = "SELECT IDArt FROM articulo WHERE IDArt='$ids[$i]' AND cantidad >= '$cantidades[$i]'";
        $conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
        $conexion->set_charset('utf8');

        //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
        if ($conexion->connect_error) {
            die('Error en la conexion' . $connect_error);
        } else {
            $resultado = mysqli_query($conexion, $consulta);
            procesarCantidad($resultado, $conexion, $i, sizeof($ids));
        }
    }

} else {
    echo '<script>alert("Porfavor, rellene todos los campos");
    document.location.href = "../Interfaz/pago.php";
    </script>';
}

?>

</html>