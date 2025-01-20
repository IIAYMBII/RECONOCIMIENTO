<?php
include 'conexion.php'; // Incluye tu archivo de conexión

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Hashear la contraseña antes de almacenarla
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta para evitar inyección SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $hashed_password);

    if ($stmt->execute()) {
        $mensaje = "¡Registro Exitoso!";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    // Enviar el mensaje de regreso al cliente
    echo $mensaje;
}
?>
