<?php

include('../conexion/conexion.php');

$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$conexion = conectar();

$query = $conexion->prepare('INSERT INTO autor (nombres, ape_paterno, ape_materno) VALUE (?, ?, ?)');
$query->bind_param('sss', $nombres, $ape_paterno, $ape_materno);
$msg = '';
if ($query->execute()) {
    $msg = 'Se registro al autor';
}
else {
    $msg = 'No se pudo registrar al autor';
}

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autores</title>
</head>
<body>
    <h1>Agregar Autor</h1>
    <h3><?php echo $msg ?></h3>
    <a href="autores.php">Regresar</a>
</body>
</html>