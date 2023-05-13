<?php

include('../conexion/conexion.php');

$conexion = conectar();

$query = $conexion->prepare('SELECT libro_id, titulo, autor_id, anio, especialidad, editorial, urls FROM libro');
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
    <title>Libros</title>
</head>
<body>
    <div class="contenedor">
    <h1>Libros</h1>
    <a href="agregar.php">Nuevo libro</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo del Libro</th>
                <th>Id_Autor</th> 
                <th>Año</th>
                <th>Especialidad</th>
                <th>Editorial</th>
                <th>Propiedades</th>
            </tr>
        </thead>
        <tbody>
        <?php

        while ($libro = $resultado->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $libro['libro_id'] . '</td>';
            echo '<td>' . $libro['titulo'] . '</td>';
            echo '<td>' . $libro['autor_id'] . '</td>';
            echo '<td>' . $libro['anio'] . '</td>';
            echo '<td>' . $libro['especialidad'] . '</td>';
            echo '<td>' . $libro['editorial'] . '</td>';
            echo '<td><a href="editar.php?libro_id=' . $libro['libro_id'] . '">Editar</a> | <a href="eliminar.php?libro_id=' . $libro['libro_id'] . '">Eliminar</a> | <a class="url" onclick="window.open(\'' . $libro['urls'] . '\',\'_blank\')">URL</a></td>';

            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</body>
</html>