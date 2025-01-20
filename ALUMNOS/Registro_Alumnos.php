<?php
session_start(); // Inicia la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirige a la página de inicio de sesión si no está autenticado
    header("Location: ../login.php");
    exit();
}

// Aquí va el contenido protegido de la página
?>

<?php
include 'conexion.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nombre = $apellidos = $curp = $fecha_nacimiento = $telefono = $domicilio = $pais = $estado = $municipio = $localidad = $colonia = $numero_control = $correo = $grado = $grupo = '';
$fotografia = '';

if ($id) {
    $sql = "SELECT * FROM alumnos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
        $curp = $row['curp'];
        $fecha_nacimiento = $row['fecha_nacimiento'];
        $telefono = $row['telefono'];
        $domicilio = $row['domicilio'];
        $pais = $row['pais'];
        $estado = $row['estado'];
        $municipio = $row['municipio'];
        $localidad = $row['localidad'];
        $colonia = $row['colonia'];
        $numero_control = $row['numero_control'];
        $correo = $row['correo'];
        $grado = $row['grado'];
        $grupo = $row['grupo'];
        $fotografia = $row['fotografia'];
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, REGISTRO DE ALUMNOS​">
    <meta name="description" content="">
    <title>Registro_Alumnos</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Registro_Alumnos.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <style>
      /* Estilos para pantallas de 600px o menos */
@media (max-width: 600px) {
  .container {
    padding: 10px;
  }
  .header {
    font-size: 18px;
  }
}

/* Estilos para pantallas mayores de 600px */
@media (min-width: 601px) {
  .container {
    padding: 20px;
  }
  .header {
    font-size: 24px;
  }
}
        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con 80% opacidad */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin-left: 0px;
    max-width: 1000px;
    box-sizing: border-box;
    backdrop-filter: blur(10px); /* Aplica un desenfoque de 10px al fondo detrás del contenedor */
    -webkit-backdrop-filter: blur(10px); /* Compatibilidad con Safari */
    border: 1px solid rgba(0, 0, 0, 0.1); /* Opcional: borde sutil para definir el contenedor */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input[type="file"] {
            padding: 0;
        }
        .form-group input[type="submit"] {
            background-color: #4C7045;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
        }
        .form-group input[type="submit"]:hover {
            background-color:#089643;
        }
        .form-group img {
            max-width: 200px;
            height: auto;
            display: block;
            margin-top: 10px;
        }
        .form-steps {
            display: none;
        }
        .form-steps.active {
            display: block;
        }
        .navigation-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .navigation-buttons button {
            background-color:#050539;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            margin: 0 10px;
        }
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50; /* Color verde por defecto */
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            transition: opacity 0.5s ease;
        }
        .notification.error {
            background-color: #f44336; /* Color rojo para errores */
        }
        .notification.show {
            display: block;
            opacity: 1;
        }
        .notification.hide {
            opacity: 0;
            display: none;
        }
    </style>
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registro_Alumnos">
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
    <section class="u-clearfix u-image u-section-1" id="sec-a9cd" data-image-width="1920" data-image-height="1047">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-custom-color-1 u-text-1">REGISTRO DE ALUMNOS </h2>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="../images/8339965.png" alt="" data-image-width="128" data-image-height="128">
        <div class="u-carousel u-carousel-duration-250 u-carousel-fade u-form u-form-1" data-interval="0" data-u-ride="false" id="carousel-79ec">
        <div class="form-container">
        <h2><?php echo $id ? 'Editar Alumno' : 'Añadir Alumno'; ?></h2>
        <form id="multiStepForm" action="guardar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


         
            <div class="form-steps active" id="step1">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($apellidos); ?>" required>
                </div>
                <div class="form-group">
                    <label for="curp">CURP:</label>
                    <input type="text" id="curp" name="curp" value="<?php echo htmlspecialchars($curp); ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($fecha_nacimiento); ?>" required>
                </div>
            </div>

            <!-- Paso 2 -->
            <div class="form-steps" id="step2">
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required>
                </div>
                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" id="domicilio" name="domicilio" value="<?php echo htmlspecialchars($domicilio); ?>" required>
                </div>
                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais" value="<?php echo htmlspecialchars($pais); ?>" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($estado); ?>" required>
                </div>
                <div class="form-group">
                    <label for="municipio">Municipio:</label>
                    <input type="text" id="municipio" name="municipio" value="<?php echo htmlspecialchars($municipio); ?>" required>
                </div>
            </div>

            <!-- Paso 3 -->
            <div class="form-steps" id="step3">
                <div class="form-group">
                    <label for="localidad">Localidad:</label>
                    <input type="text" id="localidad" name="localidad" value="<?php echo htmlspecialchars($localidad); ?>" required>
                </div>
                <div class="form-group">
                    <label for="colonia">Colonia:</label>
                    <input type="text" id="colonia" name="colonia" value="<?php echo htmlspecialchars($colonia); ?>" required>
                </div>
                <div class="form-group">
                    <label for="numero_control">Número de Control:</label>
                    <input type="text" id="numero_control" name="numero_control" value="<?php echo htmlspecialchars($numero_control); ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                </div>
               
            </div>

            <!-- Paso 4 -->
            <div class="form-steps" id="step4">
                <div class="form-group">
                    <label for="fotografia">Fotografía:</label>
                    <input type="file" id="fotografia" name="fotografia">
                    <?php if ($fotografia): ?>
                        <img src="uploads/<?php echo htmlspecialchars($fotografia); ?>" alt="Fotografía Actual">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="submit" value="<?php echo $id ? 'Actualizar Alumno' : 'Añadir Alumno'; ?>">
                </div>
                
            </div>

            <!-- Botones de Navegación -->
            <div class="navigation-buttons">
                <button type="button" id="prevBtn" onclick="changeStep(-1)">Anterior</button>
                <button type="button" id="nextBtn" onclick="changeStep(1)">Siguiente</button>
            </div>
        </form>
    </div>

    <script>
        let currentStep = 0;
        showStep(currentStep);

        function showStep(step) {
            const steps = document.querySelectorAll('.form-steps');
            steps.forEach((s, index) => {
                s.style.display = (index === step) ? 'block' : 'none';
            });
            document.getElementById('prevBtn').style.display = (step === 0) ? 'none' : 'inline-block';
            document.getElementById('nextBtn').style.display = (step === steps.length - 1) ? 'none' : 'inline-block';
        }

        function changeStep(n) {
            const steps = document.querySelectorAll('.form-steps');
            if (n === 1 && !validateForm()) return false; // Validar antes de avanzar
            currentStep += n;
            if (currentStep >= steps.length) currentStep = steps.length - 1;
            if (currentStep < 0) currentStep = 0;
            showStep(currentStep);
        }

        function validateForm() {
            const currentStepElement = document.querySelectorAll('.form-steps')[currentStep];
            const inputs = currentStepElement.querySelectorAll('input, select, textarea');
            let valid = true;
            inputs.forEach(input => {
                if (input.required && !input.value) {
                    input.style.border = '2px solid red';
                    valid = false;
                } else {
                    input.style.border = '';
                }
            });
            return valid;
        }
    </script>
    <div id="notification" class="notification"></div>

<script>
    function showNotification(message, isError) {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.classList.add('show');
        if (isError) {
            notification.classList.add('error');
        }
        setTimeout(() => {
            notification.classList.add('hide');
            setTimeout(() => {
                notification.classList.remove('show', 'hide', 'error');
            }, 500); // Tiempo para completar la transición de ocultar
        }, 5000); // Mostrar durante 5 segundos
    }

    const urlParams = new URLSearchParams(window.location.search);
    const statusMessage = urlParams.get('status');
    const statusType = urlParams.get('type');
    if (statusMessage) {
        showNotification(statusMessage, statusType === 'error');
    }
</script>

    </div>
        <a href="../ADMINISTRACION.php" class="u-btn u-button-style u-hover-custom-color-4 u-none u-btn-4"><span class="u-file-icon u-icon u-icon-1"><img src="../images/2544087.png" alt=""></span>&nbsp;​​ADMINISTRACION
        </a>
       
        <a href="Mostrar_Alumnos.php" class="u-btn u-btn-round u-button-style u-custom-color-3 u-hover-custom-color-2 u-radius u-btn-5"><span class="u-file-icon u-icon u-icon-2"><img src="../images/4961699.png" alt=""></span>&nbsp;mostrar Registros&nbsp;
        </a>
      </div>
      
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>