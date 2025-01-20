<?php
session_start(); // Inicia la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirige a la página de inicio de sesión si no está autenticado
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, Registros de Asistencias">
    <meta name="description" content="">
    <title>Registro_asistencias</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="escaneo.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    

   
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registro_asistencias">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="../" data-include-products="false" class="u-body u-xl-mode" data-lang="es"><header class="u-clearfix u-header u-header" id="sec-1054"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-group-elements u-group-elements-1" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
          <a href="#" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
            <img src="../images/151852.png" class="u-logo-image u-logo-image-1">
          </a>
          <img class="u-image u-image-contain u-image-default u-image-2" src="../images/elpoderdeservir.png" alt="" data-image-width="4590" data-image-height="1866">
        </div>
        <h1 class="u-align-center u-custom-font u-font-georgia u-text u-text-1" data-custom-animation="{&quot;animation&quot;:{&quot;XXL&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XL&quot;:{&quot;steps&quot;:[{&quot;dist&quot;:0.41,&quot;skip&quot;:0,&quot;blur&quot;:&quot;29&quot;,&quot;sticky&quot;:false,&quot;fixed&quot;:true,&quot;mx&quot;:0,&quot;my&quot;:0,&quot;op&quot;:0,&quot;rot&quot;:0,&quot;sx&quot;:3,&quot;sy&quot;:3,&quot;bgy&quot;:0}],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;middle&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;LG&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;MD&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;SM&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XS&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}}},&quot;container&quot;:&quot;&quot;}">Colegio de Estudios Científicos y Tecnológicos del Estado de México <br>
          <span class="u-text-custom-color-1">_______________________________________________</span>
          <span class="u-text-custom-color-1"></span>
          <br>
          <span style="font-size: 1rem;">Sistema de Control Escolar WEB&nbsp;</span>
          <br>
        </h1>
        <img class="u-image u-image-contain u-image-default u-image-3" src="../images/369-3698095_escudo-de-mexico-png.png" alt="" data-image-width="1085" data-image-height="687" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
      </div></header>
      <section class="u-clearfix u-image u-section-11" id="sec-9198" data-image-width="1920" data-image-height="1147">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="container">
            <h3>Registros de Asistencias</h3>
            <div class="qr-reader-box">
                <div id="qr-reader"></div>
            </div>
            <div class="result-box">
                <h3>Resultado del QR</h3>
                <p id="result">Esperando escaneo...</p>
                 <label for="materia">Nombre de la Materia:</label>
                <input type="text" id="materia" name="materia" class="form-control" placeholder="Escribe el nombre de la materia" required>
            </div>

            <!-- Campo de texto para la materia -->
            <div class="form-group">
               
            </div>

            <!-- Botones para validar entrada o registrar salida -->
            <div class="button">
                <button id="validate-btn" onclick="validateQr()">Registrar Entrada</button>
                <button id="exit-btn" onclick="registerExit()">Registrar Salida</button>
                <button id="menu-btn" onclick="menu()">registrar rostro</button>
            </div>
        </div>
    </div>
</section>

<script>
    let scannedQrText = ""; // Almacena el valor del QR escaneado

    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById('result').innerHTML = `QR Escaneado: ${decodedText}`;
        scannedQrText = decodedText; // Guarda el texto del QR escaneado
    }

    function onScanFailure(error) {
        console.warn(`Error de escaneo: ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", 
        { fps: 10, qrbox: { width: 250, height: 250 } }
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    // Función para registrar entrada
    function validateQr() {
        const materia = document.getElementById('materia').value.trim();

        if (!scannedQrText) {
            alert("No se ha escaneado ningún QR.");
            return;
        }

        if (!materia) {
            alert("Por favor, ingrese el nombre de la materia.");
            return;
        }

        // Mostrar mensaje de carga mientras se procesa
        document.getElementById('result').innerHTML = "Procesando entrada...";

        fetch('./procesar_qr.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                action: 'entrada',
                data: scannedQrText,
                materia: materia 
            }),
        })
        .then(response => response.json())
        .then(data => {
            switch (data.message) {
                case 'Entrada registrada exitosamente.':
                    window.location.href = '/sistema_escolar/Animated/registro_exitoso.html';
                    break;
                case 'El alumno ya tiene registro para este horario.':
                    window.location.href = '/sistema_escolar/Animated/asistencia_ya_registrada.html';
                    break;
                case 'No hay clases activas en este momento.':
                    window.location.href = '/sistema_escolar/Animated/fuera_de_horario.html';
                    break;
                case 'El número de control no está registrado.':
                    window.location.href = '/sistema_escolar/Animated/numero_de_control.html';
                    break;
                default:
                    window.location.href = '/sistema_escolar/Animated/error.html';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.href = '/sistema_escolar/Animated/pagina_error_procesamiento.html';
        });
    }

    // Función para registrar salida
    function registerExit() {
    if (!scannedQrText) {
        alert("No se ha escaneado ningún QR.");
        return;
    }

    // Mostrar mensaje de carga mientras se procesa
    document.getElementById('result').innerHTML = "Procesando salida...";

    fetch('./procesar_salida.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'salida',
            data: scannedQrText
        }),
    })
    .then(response => {
        // Verificar si la respuesta fue exitosa
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return response.json();
    })
    .then(data => {
        // Verificar el mensaje de respuesta del servidor
        switch (data.message) {
            case 'Salida registrada o actualizada exitosamente.':
                window.location.href = '/sistema_escolar/Animated/asistencias_de_salida.html';
                break;
            case 'Error al actualizar la salida.':
                window.location.href = '/sistema_escolar/Animated/error_salida.html';
                break;
            case 'El número de control no está registrado.':
                    window.location.href = '/sistema_escolar/Animated/numero_de_control.html';
                break;
            default:
                window.location.href = '/sistema_escolar/Animated/error.html';
                break;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        window.location.href = '/sistema_escolar/Animated/pagina_error_procesamiento.html';
    });
}
function menu() {
    // Redirigir a la página deseada
    window.location.href = 'http://127.0.0.1:5000'; // Cambia esta URL según la página que deseas redirigir
}


    
</script>


   </div>


        </a>
        <a href="../ADMINISTRACION.php" class="u-btn u-btn-round u-button-style u-custom-color-3 u-hover-custom-color-4 u-radius u-btn-3"><span class="u-file-icon u-icon u-icon-3"><img src="../images/2544087.png" alt=""></span>&nbsp;​​ADMINISTRACION
        </a>
        
      
    </section>

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
</body></html>