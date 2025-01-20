<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
            color: #721c24;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .error-message {
            padding: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            background-color: #f8d7da;
            animation: shake 0.5s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        @keyframes shake {
            0% { transform: translate(1px, 0); }
            25% { transform: translate(-1px, 0); }
            50% { transform: translate(1px, 0); }
            75% { transform: translate(-1px, 0); }
            100% { transform: translate(0, 0); }
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="error-message">
        <h2>Error: El número de control ya está registrado.</h2>
        <p>Por favor, verifica el número de control e intenta nuevamente.</p>
        <a href="REGISTRO_DATOS.php" class="button">Volver a intentar</a>
    </div>
</body>
</html>
