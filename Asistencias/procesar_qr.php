
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

if (isset($data['data'], $data['materia'])) {
    $qr_data = $data['data'];
    $materia = $data['materia'];

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

    // Definir los horarios para las clases
    $horarios = [
        'primera_clase' => ['inicio' => '07:01:00', 'puntual' => '07:10:00', 'retardo_inicio' => '07:16:00', 'retardo_fin' => '07:59:00', 'fin' => '08:00:00'],
        'segunda_clase' => ['inicio' => '08:01:00', 'puntual' => '08:10:00', 'retardo_inicio' => '08:16:00', 'retardo_fin' => '08:59:00', 'fin' => '09:00:00'],
        'tercera_clase' => ['inicio' => '09:01:00', 'puntual' => '09:10:00', 'retardo_inicio' => '09:16:00', 'retardo_fin' => '09:59:00', 'fin' => '10:00:00'],
        'cuarta_clase' => ['inicio' => '10:01:00', 'puntual' => '10:10:00', 'retardo_inicio' => '10:16:00', 'retardo_fin' => '10:59:00', 'fin' => '11:00:00'],
        'quinta_clase' => ['inicio' => '11:01:00', 'puntual' => '11:10:00', 'retardo_inicio' => '11:16:00', 'retardo_fin' => '11:59:00', 'fin' => '12:00:00'],
        'sexta_clase' => ['inicio' => '12:01:00', 'puntual' => '12:10:00', 'retardo_inicio' => '12:16:00', 'retardo_fin' => '12:59:00', 'fin' => '13:00:00'],
        'septima_clase' => ['inicio' => '13:01:00', 'puntual' => '13:10:00', 'retardo_inicio' => '13:16:00', 'retardo_fin' => '13:59:00', 'fin' => '14:00:00'],
        'octava_clase' => ['inicio' => '14:01:00', 'puntual' => '14:10:00', 'retardo_inicio' => '14:16:00', 'retardo_fin' => '14:59:00', 'fin' => '15:00:00'],
        'novena_clase' => ['inicio' => '15:00:00', 'puntual' => '15:10:00', 'retardo_inicio' => '15:16:00', 'retardo_fin' => '15:59:00', 'fin' => '16:00:00']
    ];


    // Función para determinar el estado de clase
    function getClaseEstado($hora, $horarios) {
        foreach ($horarios as $clave => $horario) {
            if ($hora >= $horario['inicio'] && $hora <= $horario['fin']) {
                if ($hora <= $horario['puntual']) {
                    return ['estado' => 'Puntual', 'clase' => $clave];
                } elseif ($hora >= $horario['retardo_inicio'] && $hora <= $horario['retardo_fin']) {
                    return ['estado' => 'Retardo', 'clase' => $clave];
                } else {
                    return ['estado' => 'No asistió', 'clase' => $clave];
                }
            }
        }
        return null;
    }

    // Obtener el estado de la clase actual
    $classInfo = getClaseEstado($hora, $horarios);
    if (!$classInfo) {
        echo json_encode(['message' => 'No hay clases activas en este momento.']);
        exit();
    }

    $estado = $classInfo['estado'];
    $horario_clase = $classInfo['clase'];

    // Verificar si ya existe un registro para esta clase y horario
    $stmt = $conn->prepare("
        SELECT * 
        FROM registro_estudiantes 
        WHERE numero_control = ? AND materias = ? AND fecha = ?
    ");
    $stmt->bind_param('sss', $numero_control, $materia, $fecha_hoy);
    $stmt->execute();
    $resultado_registro = $stmt->get_result();

    if ($resultado_registro->num_rows > 0) {
        echo json_encode(['message' => 'El alumno ya tiene registro para este horario.']);
    } else {
        // Insertar registro de entrada
        $stmt_insert = $conn->prepare("
            INSERT INTO registro_estudiantes (nombre_completo, numero_control, carrera, materias, estado, horario_entrada, fecha) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt_insert->bind_param('sssssss', $nombre_completo, $numero_control, $carrera, $materia, $estado, $hora, $fecha_hoy);
        if ($stmt_insert->execute()) {
            echo json_encode(['message' => 'Entrada registrada exitosamente.']);
        } else {
            echo json_encode(['message' => 'Error al registrar entrada.']);
        }
    }
}
?>
