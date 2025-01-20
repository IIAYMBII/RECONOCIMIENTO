<?php
session_start();
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    // Limpiar la variable de sesión después de usarla
    unset($_SESSION['error_message']);
} else {
    $error_message = "Las unidades de la materia ya se han registardo anteriormente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .error-container h1 {
            font-size: 2.5rem;
            color: #ff4d4d;
            margin-bottom: 20px;
        }

        .error-container p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .error-container a {
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .error-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error</h1>
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <a href="Registro_ciclo.php">Regresar al formulario</a>
    </div>
</body>
</html>
