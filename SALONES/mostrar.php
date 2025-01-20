<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= <section>
        <?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los filtros de búsqueda
$numero_control_filtro = isset($_POST['numero_control']) ? $_POST['numero_control'] : '';
$grupo_filtro = isset($_POST['grupo']) ? $_POST['grupo'] : '';
$semestre_filtro = isset($_POST['semestre']) ? $_POST['semestre'] : '';

// Construir la consulta SQL con filtros
$sql = "SELECT * FROM alumnos_por_grupos WHERE 1=1";

if (!empty($numero_control_filtro)) {
    $sql .= " AND numero_control LIKE '%" . $conexion->real_escape_string($numero_control_filtro) . "%'";
}
if (!empty($grupo_filtro)) {
    $sql .= " AND grupo LIKE '%" . $conexion->real_escape_string($grupo_filtro) . "%'";
}
if (!empty($semestre_filtro)) {
    $sql .= " AND semestre LIKE '%" . $conexion->real_escape_string($semestre_filtro) . "%'";
}

$resultado = $conexion->query($sql);

// Iniciar HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Registros</title>
   
</head>
<body>
    <h2 style="text-align: center;">Lista de Registros</h2>
    
    <form method="post" action="">
        <input type="text" name="numero_control" placeholder="Número de Control" value="' . htmlspecialchars($numero_control_filtro) . '">
        <input type="text" name="grupo" placeholder="Grupo" value="' . htmlspecialchars($grupo_filtro) . '">
        <input type="text" name="semestre" placeholder="Semestre" value="' . htmlspecialchars($semestre_filtro) . '">
        <button type="submit">Buscar</button>
    </form>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Control</th>
                <th>Nombre del Alumno</th>
                <th>Semestre</th>
                <th>Grupo</th>
                <th>Ciclo Escolar</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>
                <td>' . htmlspecialchars($fila['id']) . '</td>
                <td>' . htmlspecialchars($fila['numero_control']) . '</td>
                <td>' . htmlspecialchars($fila['alumno_nombre']) . '</td>
                <td>' . htmlspecialchars($fila['semestre']) . '</td>
                <td>' . htmlspecialchars($fila['grupo']) . '</td>
                <td>' . htmlspecialchars($fila['ciclo_escolar']) . '</td>
                <td>' . htmlspecialchars($fila['observaciones']) . '</td>
                <td>
                    <a href="modificar_registro.php?id=' . htmlspecialchars($fila['id']) . '" class="btn btn-edit">Modificar</a>
                    <a href="eliminar_registro.php?id=' . htmlspecialchars($fila['id']) . '" class="btn btn-delete" onclick="return confirm(\'¿Estás seguro de eliminar este registro?\');">Eliminar</a>
                </td>
            </tr>';
    }
} else {
    echo '<tr><td colspan="8">No se encontraron registros.</td></tr>';
}

echo '    </tbody>
    </table>
</body>
</html>';

// Cerrar la conexión a la base de datos
$conexion->close();
?>

    </section>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>