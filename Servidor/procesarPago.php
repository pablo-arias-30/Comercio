<?php
session_start();

function procesarCliente($resultado, $conexion)
{
    if ($resultado) {
        while ($registro = $resultado->fetch_assoc()) {
            $dni = $registro["dni"];
            procesarCompra($dni, $conexion);
        }
    }
}

function procesarCompra($dni, $conexion)
{
    $ids = array();
    $cantidades = array();
    $precios = array();

    for ($i = 0; $i < sizeof($_SESSION["ids"]); $i++) {
        $ids[$i] = $_SESSION["ids"][$i];
        $cantidades[$i] = $_SESSION["cantidades"][$i];
        $precios[$i] = $_SESSION["precios"][$i];
    }

    $direccion = $_SESSION["direccion"] . ", ".$_SESSION["codigoPostal"] .", ". $_SESSION["ciudad"] .", ". $_SESSION["provincia"];
    $fecha = date("y/m/d/H:i:s");
    $total = $_SESSION["total"];
    $idCompra = rand(1, 9999); //Genera ID único automáticamente
    $consulta = "INSERT INTO compra values ( $idCompra , '$fecha ', '$total', '$direccion', '$fecha', '$dni');";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $ids = array_unique($ids); //Eliminamos ids de artículos duplicados
        for ($i = 0; $i < count($ids); $i++) {
            $consulta = 'UPDATE articulo SET cantidad =(cantidad - ' . $cantidades[$i] . ') WHERE IDArt = ' . $ids[$i];
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado) {
                $idLinea = rand(1, 9999); //Genera ID único automáticamente
                $precio = $precios[$i] * $cantidades[$i];
                $consulta = "INSERT INTO lineacompra values ( $idLinea ,  '$cantidades[$i]' , '$precio', '$idCompra ', ' $ids[$i]');";
                $resultado = mysqli_query($conexion, $consulta);

            }
        }
        if ($resultado) { //Pago con éxito
            mysqli_close($conexion);
            for ($i = 0; $i < sizeof($ids); $i++) {
                unset($_SESSION["ids"]); //Restablecemos los ids de los productos
                setcookie("compras$i", '', time() - 60, '/');
                setcookie("cantidades$i", '', time() - 60, '/');
                setcookie("precios$i", '', time() - 60, '/');

            }
            setcookie("items", '', time() - 60, '/');
            setcookie("total", '', time() - 60);

            echo '<script>alert("Compra procesada correctamente");
        document.location.href = "../Servidor/borrarCesta.php";
        </script>';
        }
    }
    mysqli_close($conexion);
    echo '<script>alert("Ha habido algún error en la compra");
                document.location.href = "../Interfaz/pagoSinExito.php";
                </script>';
}

//Conexion a BBDD
$email = $_COOKIE["email"];
$contraseña = $_COOKIE["contraseña"];
$consulta = "SELECT dni FROM cliente WHERE contrasena='$contraseña' AND correo='$email'";
$conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
} else {
    $resultado = mysqli_query($conexion, $consulta);
}
procesarCliente($resultado, $conexion);
