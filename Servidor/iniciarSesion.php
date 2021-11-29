<?php
session_start();
function procesaResultado($resultado)
{
    while ($registro = $resultado->fetch_assoc()) {
        if (!empty($registro["nombre"])) { //Se ha encontrado a esa persona
            $nombre = $registro["nombre"];
            setcookie("usuario", "$nombre", time() + 86400, "/");
            header("Location: ../Interfaz/miperfil.php");
        }
    }
    echo '<script type="text/javascript">
    alert("Las credenciales introducidas son incorrectas");
    window.location.href="../Interfaz/iniciarSesion.html";
    </script>';
}
if ($_POST) {
    if (!empty($_POST["email"]) && !empty($_POST["contraseña"])) {
        $email = $_POST["email"];
        $contrasena = $_POST["contraseña"];
        setcookie("email", "$email", time() + 86400, "/");
        setcookie( "contraseña", "$contrasena", time() + 86400, "/");

        //SACAR DNI DEL CLIENTE PARA SABER QUIEN ES Y YA BUSCAR SU CONTRASEÑA

//Conexion a BBDD
        $consulta = "SELECT nombre FROM cliente WHERE correo = '$email'  &&  contrasena = '$contrasena'";
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
    alert("Debes introducir todos los campos");
    window.location.href="../Interfaz/iniciarSesion.html";
    </script>';
    }
} 
echo '<script type="text/javascript">
    alert("Ha ocurrido algún error");
    window.location.href="../Interfaz/iniciarSesion.html";
    </script>';
?>
