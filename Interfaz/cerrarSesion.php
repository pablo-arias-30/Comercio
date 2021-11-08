<?php
//Borramos las cookies para que cuando intentemos ir a nuestro perfil, no nos deje, ya que nos llevará a iniciar sesión
unset($_COOKIE["usuario"]);
setcookie("usuario", "", time() - 3600, '/');
unset($_COOKIE["email"]);
setcookie("email", "", time() - 3600, '/');
unset($_COOKIE["contrasena"]);
setcookie("contrasena", "", time() - 3600, '/');
echo '<script type="text/javascript">
    alert("Sesión cerrada correctamente");
    window.location.href="index.html";
    </script>';
