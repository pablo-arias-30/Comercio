<?php
//Conexion a BBDD
$sql = "SELECT * FROM compra";
$conexion = new mysqli('localhost', 'root', '','proyecto comercio');
$conexion->set_charset('utf8');
//establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
if ($conexion->connect_error) {
    die('Error en la conexion' . $connect_error);
}else{
$resultado = mysqli_query($conexion, $sql);
if (!$resultado) {
    die("No se puede realizar la consulta $conexion errno': $conexion->error");
}else{
while ($registro = $resultado->fetch_assoc()) {
    echo $registro['IDCompra']."\n";
    echo $registro['fechaCompra']."\n";
    echo $registro['precio']."\n";
    echo $registro['direccionEnvio']."\n";
    echo $registro['direccionEnvio']."\n";
    echo $registro['fechaPago']."\n";
    echo $registro['dniCliente']."\n";
}
    mysqli_close($conexion);
}
}
?>
