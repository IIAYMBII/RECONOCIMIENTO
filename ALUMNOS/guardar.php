<?php
include 'conexion.php';

// Captura y sanitización de datos
$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$curp = $_POST['curp'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$localidad = $_POST['localidad'];
$colonia = $_POST['colonia'];
$numero_control = $_POST['numero_control'];
$correo = $_POST['correo'];
$fotografia = '';

if ($_FILES['fotografia']['name']) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fotografia"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fotografia"]["tmp_name"]);
    if ($check === false) {
        $status_message = "El archivo no es una imagen.";
        $status_type = "error";
        $uploadOk = 0;
    }

    // Check file size (5MB max)
    if ($_FILES["fotografia"]["size"] > 5000000) {
        $status_message = "El archivo es demasiado grande.";
        $status_type = "error";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $status_message = "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $status_type = "error";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $status_message = "El archivo no se pudo subir.";
        $status_type = "error";
    } else {
        if (move_uploaded_file($_FILES["fotografia"]["tmp_name"], $target_file)) {
            $fotografia = basename($_FILES["fotografia"]["name"]);
        } else {
            $status_message = "Hubo un error al subir el archivo.";
            $status_type = "error";
        }
    }
}

// Verificar si el numero_control ya existe
$check_query = "SELECT id FROM alumnos WHERE numero_control='$numero_control'";
if ($id) {
    $check_query .= " AND id != $id";
}
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    $status_message = "El número de control ya existe para otro estudiante.";
    $status_type = "error";
} else {
    if ($id) {
        // Actualizar registro existente
        $sql = "UPDATE alumnos SET nombre='$nombre', apellidos='$apellidos', curp='$curp', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', domicilio='$domicilio', pais='$pais', estado='$estado', municipio='$municipio', localidad='$localidad', colonia='$colonia', numero_control='$numero_control', correo='$correo'" . ($fotografia ? ", fotografia='$fotografia'" : "") . " WHERE id=$id";
    } else {
        // Crear nuevo registro
        $sql = "INSERT INTO alumnos (nombre, apellidos, curp, fecha_nacimiento, telefono, domicilio, pais, estado, municipio, localidad, colonia, numero_control, correo" . ($fotografia ? ", fotografia" : "") . ") VALUES ('$nombre', '$apellidos', '$curp', '$fecha_nacimiento', '$telefono', '$domicilio', '$pais', '$estado', '$municipio', '$localidad', '$colonia', '$numero_control', '$correo'" . ($fotografia ? ", '$fotografia'" : "") . ")";
    }

    if ($conn->query($sql) === TRUE) {
        $status_message = "Operación exitosa.";
        $status_type = "success";
    } else {
        $status_message = "Error: " . $conn->error;
        $status_type = "error";
    }
}

$conn->close();

// Redirige con mensaje de estado
header("Location: Registro_Alumnos.php?status=" . urlencode($status_message) . "&type=" . urlencode($status_type));
exit();
?>
