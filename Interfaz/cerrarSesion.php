<?php unset($_COOKIE["usuario"]);
unset($_COOKIE["email"]);
unset($_COOKIE["contrasena"]);
echo '<script type="text/javascript">
    alert("Sesión cerrada correctamente");
    window.location.href="index.html";
    </script>';
 ?>