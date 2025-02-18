<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .message {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .spinner {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">¡Registro Exitoso!</div>
        <div class="spinner"></div>
        <p>Redirigiendo en <span id="countdown">3</span> segundos...</p>
    </div>

    <script>
        // Redirigir después de un tiempo
        let countdownElement = document.getElementById('countdown');
        let countdown = parseInt(countdownElement.textContent);

        setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown <= 0) {
                window.location.href = 'Registro_Grupos.php'; // Cambia 'index.php' a la página a la que quieras redirigir
            }
        }, 1000);
    </script>
</body>
</html>
