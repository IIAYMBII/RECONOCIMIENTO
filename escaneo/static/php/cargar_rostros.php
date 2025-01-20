<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_escolar"; // Nombre de tu base de datos

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los rostros registrados
$sql = "SELECT numero_control, nombre_completo, rostro_encoding FROM registro_qr";
$result = $conn->query($sql);

$rostros_registrados = ["data" => [], "encodings" => []];

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Extraer los datos de los rostros registrados
    while ($row = $result->fetch_assoc()) {
        if (!empty($row['rostro_encoding'])) {
            $rostros_registrados["data"][] = [
                "numero_control" => $row['numero_control'],
                "nombre_completo" => $row['nombre_completo']
            ];
            $rostros_registrados["encodings"][] = json_decode($row['rostro_encoding']);
        }
    }
} else {
    echo json_encode(["error" => "No se encontraron rostros registrados."]);
    exit;
}

// Devolver los rostros registrados como JSON
header('Content-Type: application/json');
echo json_encode($rostros_registrados);

// Cerrar la conexión
$conn->close();
?>
