<?php


function procesarCliente($resultado,$conexion)
{
    if ($resultado) {
        while ($registro = $resultado->fetch_assoc()) {
            $dni = $registro["dni"];
            procesarCompra($dni,$conexion);
    }
}
}
function procesarCompra($dni,$conexion){
    $consulta = 'SELECT * FROM cliente WHERE contrasena='.$_COOKIE["contrasena"]. 'AND correo='.$_COOKIE["email"];
}

if ($_POST) {

//Conexion a BBDD
        $consulta = 'SELECT * FROM cliente WHERE contrasena='.$_COOKIE["contrasena"]. 'AND correo='.$_COOKIE["email"];
        echo $consulta;
        $conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
        $conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
        if ($conexion->connect_error) {
            die('Error en la conexion' . $connect_error);
        } else {
            $resultado = mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
        }
        procesarCliente($resultado,$conexion);
    }




echo '<script type="text/javascript">
    alert("Ha ocurrido algún error");
    window.location.href="../Interfaz/registro.html";
    </script>';