<?php

function procesaResultado($resultado)
{
    if ($resultado) {
        //inserción correcta
        header("Location: ../Interfaz/miperfil.html");
    }
    echo '<script type="text/javascript">
    alert("Las credenciales introducidas son incorrectas. Es posible que el DNI o correo ya esté en uso. Vuelva a intentarlo porfavor");
    window.location.href="../Interfaz/registro.html";
    </script>';
}

if ($_POST) {
    if (!empty($_POST["dni"]) && !empty($_POST["nombre"])
        && !empty($_POST["telefono"]) && !empty($_POST["email"]) && !empty($_POST["contraseña"]) && !empty($_POST["nacimiento"]) && !empty($_POST["direccion"])) {

        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $nacimiento = $_POST["nacimiento"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $contrasena = $_POST["contraseña"];
        $direccion = $_POST["direccion"];

//Conexion a BBDD
        $consulta = "INSERT INTO cliente(dni,nombre,telefono,direccion,correo,contrasena,nacimiento,graduacion) VALUES('$dni','$nombre','$telefono','$direccion','$email','$contrasena','$nacimiento','');";
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
        procesaResultado($resultado);

    } else {
        echo '<script type="text/javascript">
    alert("Debe introducir todos los campos, vuelva a intentarlo porfavor");
    window.location.href="../Interfaz/registro.html";
    </script>';
    }
}
?>