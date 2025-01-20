<?php
// Ruta completa al intérprete de Python desde Microsoft Store, con comillas dobles
$python = '"C:/Users/mendo/AppData/Local/Microsoft/WindowsApps/python3.11.exe"';  
$script = '"C:/xampp/htdocs/sistema_escolar/Asistencias/app.py"';
//$script = '"C:/xampp/htdocs/Asistencias_qr/app.py"'; // Asegúrate de que no haya espacio extra antes de la ruta

// Ejecuta el script de Python
$output = shell_exec("$python $script 2>&1"); // Ejecuta el archivo Python con shell_exec
echo $output; // Muestra la salida del script Python
?>
