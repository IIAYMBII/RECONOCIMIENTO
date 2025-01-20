<?php
include 'conexion.php';

try {
    if (!isset($_GET['query']) || empty($_GET['query'])) {
        throw new Exception("Error: Por favor, ingrese un valor de búsqueda.");
    }

    $query = $_GET['query'];

    // Evitar SQL Injection
    $query = $conn->real_escape_string($query);

    // Buscar alumnos que coincidan con la consulta
    $sql = "SELECT id, numero_control, CONCAT(nombre, ' ', apellidos) AS nombre_completo 
            FROM alumnos 
            WHERE numero_control LIKE '%$query%' OR CONCAT(nombre, ' ', apellidos) LIKE '%$query%' 
            LIMIT 10";

    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div onclick="seleccionarAlumno(\'' . htmlspecialchars($row['id']) . '\', \'' . htmlspecialchars($row['numero_control']) . '\', \'' . htmlspecialchars($row['nombre_completo']) . '\')">';
            echo htmlspecialchars($row['numero_control']) . ' - ' . htmlspecialchars($row['nombre_completo']);
            echo '</div>';
        }
    } else {
        echo '<div>No se encontraron resultados</div>';
    }
} catch (Exception $e) {
    // Mostrar mensaje de error
    echo '<div style="color: red; font-weight: bold;">' . $e->getMessage() . '</div>';
}
?>
