<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos enviados desde el formulario
$numero_control = $_POST['numero_control'];
$alumno_nombre = $_POST['alumno_nombre'];
$semestre_nombre = $_POST['semestre_nombre'];
$grupo = $_POST['grupo'];
$ciclo_escolar_nombre = $_POST['ciclo_escolar_nombre'];
$observaciones_generales = $_POST['observaciones'];

// Verificar si el número de control ya existe en la base de datos
$sql_verificar = "SELECT COUNT(*) AS conteo FROM alumnos_por_grupos WHERE numero_control = '$numero_control'";
$resultado_verificacion = $conexion->query($sql_verificar);
$fila_verificacion = $resultado_verificacion->fetch_assoc();

if ($fila_verificacion['conteo'] > 0) {
    // Mostrar mensaje de error estilizado
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #f8d7da;
            }
            .error-message {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                padding: 20px;
                max-width: 500px;
                text-align: center;
            }
            .error-message h1 {
                font-size: 24px;
                margin: 0;
            }
            .error-message p {
                font-size: 18px;
                margin: 10px 0;
            }
            .error-message a {
                color: #004085;
                text-decoration: underline;
            }
            .error-message a:hover {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="error-message">
            <h1>Error</h1>
            <p>El número de control <strong>' . htmlspecialchars($numero_control) . '</strong> ya existe en la base de datos.</p>
            <p><a href="javascript:history.back()">Volver al formulario</a></p>
        </div>
    </body>
    </html>';
} else {
    // Insertar los datos en la tabla `alumnos_por_grupos`
    $sql_insertar = "INSERT INTO alumnos_por_grupos (numero_control, alumno_nombre, semestre, grupo, ciclo_escolar, observaciones)
                     VALUES ('$numero_control', '$alumno_nombre', '$semestre_nombre', '$grupo', '$ciclo_escolar_nombre', '$observaciones_generales')";

    if (!$conexion->query($sql_insertar)) {
        echo "Error: " . $sql_insertar . "<br>" . $conexion->error;
    } else {
        // Redirigir después de guardar los datos si la inserción fue exitosa
        header("Location: registro_exitoso.php");
        exit;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
