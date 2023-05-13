<?php

include('../conexion/conexion.php');

$conexion = conectar();

$query = $conexion->prepare('SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor');
$query->execute();
$resultado = $query->get_result();

desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>
<body>
    <h1>Autores</h1>
    <a href="agregar.html">Nuevo autor:</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php

        while ($autor = $resultado->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $autor['autor_id'] . '</td>';
            echo '<td>' . $autor['nombres'] . '</td>';
            echo '<td>' . $autor['ape_paterno'] . '</td>';
            echo '<td>' . $autor['ape_materno'] . '</td>';
            echo '<td><a href="editar.php?autor_id=' . $autor['autor_id'] . '">Editar</a> | <a href="eliminar.php?autor_id='.$autor['autor_id'].'" >Eliminar</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</body>
</html>
</html>