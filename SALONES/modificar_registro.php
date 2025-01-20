<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el ID del registro a modificar
$id = $_GET['id'];

// Consultar los datos del registro
$sql = "SELECT * FROM alumnos_por_grupos WHERE id = '$id'";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();

if (!$fila) {
    die("Registro no encontrado.");
}

// Mostrar el formulario de modificación
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input, textarea {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Modificar Registro</h2>
    <form method="post" action="actualizar_registro.php">
        <input type="hidden" name="id" value="' . htmlspecialchars($fila['id']) . '">
        <table border="1">
            <tr>
                <th><label for="numero_control">Número de Control:</label></th>
                <td><input type="text" id="numero_control" name="numero_control" value="' . htmlspecialchars($fila['numero_control']) . '" required></td>
            </tr>
            <tr>
                <th><label for="alumno_nombre">Nombre del Alumno:</label></th>
                <td><input type="text" id="alumno_nombre" name="alumno_nombre" value="' . htmlspecialchars($fila['alumno_nombre']) . '" required></td>
            </tr>
            <tr>
                <th><label for="semestre">Semestre:</label></th>
                <td><input type="text" id="semestre" name="semestre" value="' . htmlspecialchars($fila['semestre']) . '" required></td>
            </tr>
            <tr>
                <th><label for="grupo">Grupo:</label></th>
                <td><input type="text" id="grupo" name="grupo" value="' . htmlspecialchars($fila['grupo']) . '" required></td>
            </tr>
            <tr>
                <th><label for="ciclo_escolar">Ciclo Escolar:</label></th>
                <td><input type="text" id="ciclo_escolar" name="ciclo_escolar" value="' . htmlspecialchars($fila['ciclo_escolar']) . '" required></td>
            </tr>
            <tr>
                <th><label for="observaciones">Observaciones:</label></th>
                <td><textarea id="observaciones" name="observaciones" required>' . htmlspecialchars($fila['observaciones']) . '</textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Actualizar</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>';

// Cerrar la conexión a la base de datos
$conexion->close();
?>
