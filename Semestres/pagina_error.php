<?php
session_start();
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
            padding: 20px;
            text-align: center;
        }
        .mensaje {
            background-color: #f44336;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['mensaje_error'])): ?>
        <div class="mensaje">
            <?php echo htmlspecialchars($_SESSION['mensaje_error']); ?>
        </div>
        <?php unset($_SESSION['mensaje_error']); ?>
    <?php endif; ?>

    <p>Redirigiendo a la página principal...</p>

    <script>
        // Redirigir a la página principal después de 3 segundos
        setTimeout(function() {
            window.location.href = 'MODIFICAR_CICLO.php'; // Cambia esto por la URL de tu página principal
        }, 3000);
    </script>
</body>
</html>
