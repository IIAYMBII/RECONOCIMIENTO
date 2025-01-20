<?php
// Habilitar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ruta completa al intérprete de Python
$python = escapeshellarg("C:/Users/mendo/AppData/Local/Microsoft/WindowsApps/python3.11.exe");

// Ruta completa al script de Python
$script = escapeshellarg("C:/xampp/htdocs/sistema_escolar/escaneo/facial.py");

// Ejecutar el script de Python
$output = shell_exec("$python $script 2>&1");

// Verificar la salida
if (empty($output)) {
    // Responder en caso de que no haya salida
    echo json_encode([ 
        "status" => "error", 
        "message" => "No se recibió ninguna salida del script Python." 
    ]);
} else {
    // Devolver la salida del script como JSON
    echo json_encode([ 
        "status" => "success", 
        "message" => $output 
    ]);
}
?>
