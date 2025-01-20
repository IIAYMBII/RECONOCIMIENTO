<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el ID del registro a eliminar
$id = $_GET['id'];

// Eliminar el registro de la base de datos
$sql = "DELETE FROM alumnos_por_grupos WHERE id = '$id'";

if ($conexion->query($sql) === TRUE) {
    // Redirigir después de eliminar el registro
    header("Location: listar_registros.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
