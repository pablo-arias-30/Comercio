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
    $ids = $_SESSION["ids"];
    $cantidades = array();
    $cantidades = $_SESSION["cantidades"];
    for ($i = 0; $i < count($ids); $i++) {
        $consulta = 'UPDATE articulo SET cantidad =(cantidad - ' . $cantidades[$i] . ') WHERE IDArt = ' . $ids[$i];
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            $direccion = $_SESSION["direccion"];
            $fecha = date("y/m/d");
            $total = $_SESSION["total"];
            $idCompra = rand(1, 9999); //Genera ID único automáticamente
            $consulta = "INSERT INTO compra values ( $idCompra , '$fecha ', '$total', '$direccion ', '$fecha', ' $dni');";
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado) {
                $unidades = $cantidades[$i]; //Numero de artículos
                $idLinea = rand(1, 9999); //Genera ID único automáticamente
                $consulta = "INSERT INTO lineacompra values ( $idLinea , '$unidades', '$total', '$idCompra ', ' $ids[$i]');";
                $resultado = mysqli_query($conexion, $consulta);
                if ($resultado && $i==(count($ids)-1)) { //Pago con éxito
                    echo "hola3";
                    mysqli_close($conexion);
                    echo '<script>alert("Compra procesada correctamente");
                document.location.href = "../Interfaz/miperfil.php";
                </script>';
                } else {

                }
            }
        }
        mysqli_close($conexion);
      /*  echo '<script>alert("Ha habido algún error en la compra");
                document.location.href = "../Interfaz/pagoSinExito.php";
                </script>';*/

    }
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
