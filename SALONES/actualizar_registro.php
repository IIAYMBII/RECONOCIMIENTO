<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos enviados desde el formulario
$id = $_POST['id'];
$numero_control = $_POST['numero_control'];
$alumno_nombre = $_POST['alumno_nombre'];
$semestre = $_POST['semestre'];
$grupo = $_POST['grupo'];
$ciclo_escolar = $_POST['ciclo_escolar'];
$observaciones = $_POST['observaciones'];

// Actualizar el registro en la base de datos
$sql = "UPDATE alumnos_por_grupos 
        SET numero_control = '$numero_control', alumno_nombre = '$alumno_nombre', semestre = '$semestre', grupo = '$grupo', ciclo_escolar = '$ciclo_escolar', observaciones = '$observaciones'
        WHERE id = '$id'";

if ($conexion->query($sql) === TRUE) {
    // Redirigir después de actualizar los datos
    header("Location: listar_registros.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
