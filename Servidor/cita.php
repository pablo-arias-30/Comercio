<?php



function procesaResultado($consulta, $conexion)
{
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            //inserción correcta
            echo '<script type="text/javascript">
    alert("Cita asignada correctamente");
    window.location.href="../Interfaz/miperfil.php";
    </script>';
        }
        echo '<script type="text/javascript">
    alert("El DNI introducido es incorrecto");
    window.location.href="../Interfaz/pedirCita.php";
    </script>';

}

if ($_POST) {
    if (!empty($_POST["dniCliente"]) && !empty($_POST["fechaCita"]) && !empty($_POST["hora"])) {
        $id = rand(1, 9999); //Genera ID único automáticamente
        $dni = $_POST["dniCliente"];
        $fecha = $_POST["fechaCita"];
        $hora = $_POST["hora"];
        $consulta = "INSERT INTO cita (IDCita,fecha,hora,dniCliente) values ('$id','$fecha','$hora','$dni')";

//Conexion a BBDD
    //$consulta = "SELECT dni FROM cliente WHERE correo = '$email'  &&  contrasena = '$contrasena'";
    $conexion = new mysqli('localhost', 'root', '', 'proyecto comercio');
    $conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
    if ($conexion->connect_error) {
        die('Error en la conexion' . $connect_error);
    } else {
        procesaResultado($consulta, $conexion);
        mysqli_close($conexion);
    }


} else {
    echo '<script type="text/javascript">
    alert("Debes introducir todos los campos");
    window.location.href="../Interfaz/pedirCita.php";
    </script>';
}

}
echo '<script type="text/javascript">
    alert("Ha ocurrido algún error");
    window.location.href="../Interfaz/pedirCita.php";
    </script>';

?>