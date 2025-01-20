<?php
include 'conexion.php';

$id = $_GET['id'];

try {
    // Desactivar el autocommit para manejo de transacciones
    $conn->autocommit(FALSE);

    // Primero, elimina los registros en la tabla `asistencias` relacionados con el `alumno_id`
    $delete_asistencias_sql = "DELETE FROM asistencias WHERE alumno_id = ?";
    $stmt = $conn->prepare($delete_asistencias_sql);
    $stmt->bind_param('i', $id);
    
    if (!$stmt->execute()) {
        throw new Exception("Error al eliminar registros en `asistencias`: " . $stmt->error);
    }

    // Luego, elimina el registro en la tabla `alumnos`
    $delete_alumno_sql = "DELETE FROM alumnos WHERE id = ?";
    $stmt = $conn->prepare($delete_alumno_sql);
    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        throw new Exception("Error al eliminar el registro en `alumnos`: " . $stmt->error);
    }

    // Confirmar la transacción
    $conn->commit();

    // Redirigir a la página de listado de alumnos
    header("Location: mostrar_Alumnos.php");
    exit(); // Asegúrate de usar exit después de redirigir

} catch (Exception $e) {
    // Deshacer los cambios en caso de error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión
    $conn->close();
}
?>
