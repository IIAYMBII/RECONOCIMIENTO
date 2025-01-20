<?php
include 'conexion.php';

$semestre_id = $_GET['semestre_id'];
$result_asignaturas = $conn->query("SELECT id, nombre FROM asignaturas WHERE semestre_id = $semestre_id");

if ($result_asignaturas->num_rows > 0) {
    while ($row_asignatura = $result_asignaturas->fetch_assoc()) {
        echo '<div>';
        echo '<h4>' . $row_asignatura['nombre'] . '</h4>';
        echo '<input type="hidden" name="asignatura_id[]" value="' . $row_asignatura['id'] . '">';
        for ($i = 1; $i <= 3; $i++) {
            echo '<label for="unidad_' . $i . '">Unidad ' . $i . ':</label>';
            echo '<input type="number" id="unidad_' . $i . '" name="unidad_' . $i . '[]" required min="0" max="10" step="0.1">';
        }
        echo '</div>';
    }
} else {
    echo '<p>No hay asignaturas disponibles para este semestre.</p>';
}

?>
