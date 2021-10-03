<?php
//Conexion a BBDD
$sql = "SELECT * FROM factura";
$conexion = new mysqli('localhost', 'root', '','comercioprueba');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
}
$resultado = mysqli_query($conexion, $sql);
if (!$resultado) {
    die("No se puede realizar la consulta $conexion errno': $conexion->error");
}
while ($registro = $resultado->fetch_assoc()) {
    echo $registro['id']."\n";
    echo $registro['id_producto']."\n";
    echo $registro['cantidad']."\n";
    echo $registro['precio_total']."\n";
}

mysqli_close($conexion);
?>