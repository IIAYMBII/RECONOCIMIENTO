<?php
session_start(); // Inicia la sesión

include 'conexion.php'; // Incluye tu archivo de conexión

// Inicializa la variable de error
$_SESSION['error_message'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar la consulta para evitar inyección SQL
    $stmt = $conn->prepare("SELECT id, contrasena FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($contrasena, $hashed_password)) {
            // Si la contraseña es correcta, guarda la sesión del usuario
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario'] = $usuario;

            // Redirigir a la página de administración
            header("Location: ADMINISTRACION.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
        }
    } else {
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Tecnológicos de Estudios Superiores De Jocotitlan _____​_______________________________________________​Sistema de Control De Asistencias WEB">
    <meta name="description" content="">
    <title>LOGIN</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="index.css" media="screen">
   
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    <style>
      
        /* Estilo para el mensaje flotante */
        body {
          background: rgb(6,7,48);
background: linear-gradient(0deg, rgba(6,7,48,1) 0%, rgba(255,255,255,0.7257352599242822) 91%), 
                url('./images/font.jpg'); /* Reemplaza con la ruta de tu imagen */
    background-size: cover; /* Asegura que la imagen cubra toda el área */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-position: center; /* Centra la imagen */
    margin: 0; /* Para eliminar el margen predeterminado */
    height: 100vh; /* Asegura que cubra toda la altura de la ventana */
}

        .error-message {
            display: none; /* Oculto por defecto */
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #f44336; /* Rojo */
            color: white;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
    </style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="LOGIN">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-home-page="login.html" data-home-page-title="LOGIN" data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="es"><header class="u-clearfix u-header u-header" id="sec-1054"><div class="u-clearfix u-sheet u-sheet-1">
  <?php
    // Incluir el mensaje de error si existe
    if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) {
        echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
        // Limpiar el mensaje después de mostrarlo
        unset($_SESSION['error_message']);
    }
    ?> 
  <div class="u-clearfix u-group-elements u-group-elements-1" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
          <a href="#" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
            <img src="images/151852.png" class="u-logo-image u-logo-image-1">
          </a>
          <img class="u-image u-image-contain u-image-default u-image-2" src="images/elpoderdeservir.png" alt="" data-image-width="4590" data-image-height="1866">
        </div>
        <h1 class="u-align-center u-custom-font u-font-georgia u-text u-text-1" data-custom-animation="{&quot;animation&quot;:{&quot;XXL&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XL&quot;:{&quot;steps&quot;:[{&quot;dist&quot;:0.41,&quot;skip&quot;:0,&quot;blur&quot;:&quot;29&quot;,&quot;sticky&quot;:false,&quot;fixed&quot;:true,&quot;mx&quot;:0,&quot;my&quot;:0,&quot;op&quot;:0,&quot;rot&quot;:0,&quot;sx&quot;:3,&quot;sy&quot;:3,&quot;bgy&quot;:0}],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;middle&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;LG&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;MD&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;SM&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XS&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}}},&quot;container&quot;:&quot;&quot;}">Tecnológicos de Estudios Superiores De Jocotitlan<br>
          <span class="u-text-custom-color-1">_______________________________________________</span>
          <span class="u-text-custom-color-1"></span>
          <br>
          <span style="font-size: 1rem;">​Sistema de Control De Asistencias WEB&nbsp;</span>
          <br>
        </h1>
        <img class="u-image u-image-contain u-image-default u-image-3" src="images/369-3698095_escudo-de-mexico-png.png" alt="" data-image-width="1085" data-image-height="687" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-cc57">
      <div class="u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/272456.png" alt=""></span>
        <div class="u-form u-form-1">
       
          <form method="post" action="login.php" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form" style="padding: 10px;" redirect="true">
            <div class="u-form-group u-form-name u-label-top">
              <label for="usuario" class="u-label u-text-custom-color-3 u-label-1">Usuario</label>
              <input type="text" placeholder="Introduzca su usuario" id="usuario" name="usuario" class="u-input u-input-rectangle u-radius u-input-1" required>
          </div>
          <div class="u-form-group u-form-email u-label-top">
              <label for="contrasena" class="u-label u-text-custom-color-3 u-label-2">Contraseña</label>
              <input type="password" placeholder="Introduzca su contraseña" id="contrasena" name="contrasena" class="u-input u-input-rectangle u-radius u-input-2" required>
          </div>
          <div class="u-align-center u-form-group u-form-submit">
              <button type="submit" class="u-btn u-btn-submit u-button-style u-custom-color-3 u-btn-1">Iniciar Sesión</button>
              <script>
        // Mostrar el mensaje de error si existe
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessage = document.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.style.display = 'block';
                // Ocultar el mensaje después de 5 segundos
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
            </div>
        
        </div>
        <a href="LOG/Registro_Usuarios.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-none u-text-palette-1-base u-btn-2"><span class="u-file-icon u-icon u-icon-2"><img src="images/40358.png" alt=""></span>&nbsp;registrarse 
        </a>
      </div>
      
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
   
  
</body></html>