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

        modelo = new ComprasApp();
        for (let i = 0; i < modelo.compras.length; i++) {
            document.cookie = "compras" + i + "" + '=' + modelo._compras[i]._id;
            document.cookie = "cantidades" + i + "" + '=' + modelo._compras[i]._cantidad;
        }

    }
    </script>
</head>

<body onload="inicio()">
</body>

<?php

//Comprobamos que haya stock

//Guardamos direccion, nombre y telefono
$_SESSION["direccion"] = $_POST["direccion"];
$_SESSION["nombre"] = $_POST["nombre"];
$_SESSION["telefono"] = $_POST["telefono"];
$_SESSION["codigoPostal"] = $_POST["zip"];
$_SESSION["pais"] = $_POST["lc"];
$_SESSION["ciudad"] = $_POST["ciudad"];



$ids = array();
$cantidades = array();
$i = 0;
while (isset($_COOKIE["compras" . $i])) {
    $ids[$i] = $_COOKIE["compras" . $i];
    $cantidades[$i] = $_COOKIE["cantidades" . $i];
    $i++;
}
$_SESSION["ids"] = $ids;
$_SESSION["cantidades"] = $cantidades;
//Borramos cookies ids compra y cantidades por seguridad y las pasamos a la sesión
setcookie("compras", '', time() - 60, '/');
setcookie("cantidades", '', time() - 60, '/');

//Conexion a BBDD
for ($i = 0; $i < count($ids); $i++) {
    $consulta = 'SELECT COUNT(*) FROM articulo WHERE IDArt=' . $ids[$i] . ' AND cantidad >=' . $cantidades[$i];
    $conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
    $conexion->set_charset('utf8');

    //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
    if ($conexion->connect_error) {
        die('Error en la conexion' . $connect_error);
    } else {
        $resultado = mysqli_query($conexion, $consulta);
        procesarCantidad($resultado, $conexion,$i);
    }
}


function procesarCantidad($resultado,$conexion,$i){
    while ($registro = $resultado->fetch_assoc()) {
        if ($registro > 0) { //Hay stock
            mysqli_close($conexion);
            //Podemos pagar
            echo '<script>document.location.href = "../Interfaz/paypal.php";
        </script>';
        } else {
            mysqli_close($conexion);
            '<script>alert("Lo sentimos, no hay el stock necesario para su compra");
        document.location.href = "../Interfaz/carrito.php";
        </script>';
        }
    }
}

?>

</html>