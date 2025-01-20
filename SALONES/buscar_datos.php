<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el número de control desde la solicitud POST
$numero_control = $_POST['numero_control'];

// Consulta SQL para obtener los datos del alumno relacionado con el número de control
$sql = "SELECT alumno_nombre, semestre_nombre, grupo, ciclo_escolar_nombre
        FROM boletas 
        WHERE numero_control = '$numero_control'";

$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados y devolver los datos como JSON
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo json_encode($fila);
} else {
    // Si no se encuentra el número de control, devolver un JSON con un mensaje de error
    echo json_encode([
        "error" => "No se encontraron datos para el número de control proporcionado.",
        "alumno_nombre" => "", 
        "semestre_nombre" => "", 
        "grupo" => "", 
        "ciclo_escolar_nombre" => ""
    ]);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
