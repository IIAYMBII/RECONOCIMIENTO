<?php
header('Content-Type: application/json');
date_default_timezone_set('America/Mexico_City');

// Obtener datos enviados desde la petición fetch
$data = json_decode(file_get_contents('php://input'), true);

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'sistema_escolar');
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error al conectar con la base de datos: ' . $conn->connect_error]);
    exit();
}

if (isset($data['data'])) {
    $qr_data = $data['data'];
   

    // Extraer información del QR
    $lines = explode("\n", $qr_data);
    $nombre_completo = explode(': ', $lines[0])[1];
    $numero_control = explode(': ', $lines[1])[1];
    $carrera = explode(': ', $lines[2])[1];

    // Verificar si el alumno existe en la tabla 'alumnos'
    $stmt = $conn->prepare("SELECT * FROM alumnos WHERE numero_control = ?");
    $stmt->bind_param('s', $numero_control);
    $stmt->execute();
    $resultado_alumno = $stmt->get_result();

    if ($resultado_alumno->num_rows === 0) {
        echo json_encode(['message' => 'El número de control no está registrado.']);
        exit();
    }

    // Fecha y hora actuales
    $hora_actual = new DateTime();
    $fecha_hoy = $hora_actual->format('Y-m-d');
    $hora = $hora_actual->format('H:i:s');

    // Escapar variables
    $numero_control = $conn->real_escape_string($numero_control);
    $fecha_hoy = $conn->real_escape_string($fecha_hoy);

    // Actualizar el horario de salida
    $sqlUpdate = "UPDATE registro_estudiantes 
                  SET horario_salida = NOW() 
                  WHERE numero_control = '$numero_control' AND fecha = '$fecha_hoy'";

    if ($conn->query($sqlUpdate) === TRUE) {
        // Verificar si realmente se actualizó una fila
        if ($conn->affected_rows > 0) {
            echo json_encode(['message' => 'Salida registrada o actualizada exitosamente.']);
        } else {
            echo json_encode(['message' => 'No se encontró registro para actualizar.']);
        }
    } else {
        echo json_encode(['message' => 'Error al actualizar la salida.', 'error' => $conn->error]);
    }
} else {
    echo json_encode(['message' => 'Datos insuficientes en la solicitud.']);
}

$conn->close();
?>
