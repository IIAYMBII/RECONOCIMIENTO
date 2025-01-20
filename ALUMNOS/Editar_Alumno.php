<?php
include 'conexion.php'; // Incluye tu archivo de conexión

// Inicia la sesión (opcional si estás manejando sesiones)
session_start();

$id = $_GET['id']; // Obtiene el ID del alumno desde la URL

// Consulta para obtener la información del alumno
$sql = "SELECT id, nombre, apellidos, curp, fecha_nacimiento, telefono, domicilio, pais, estado, municipio, localidad, colonia, numero_control, correo, fotografia FROM alumnos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $nombre, $apellidos, $curp, $fecha_nacimiento, $telefono, $domicilio, $pais, $estado, $municipio, $localidad, $colonia, $numero_control, $correo, $fotografia);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
} else {
    echo "No se encontró el registro.";
    exit();
}
$stmt->close();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Editar_Alumno</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Editar_Alumno.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <style>
       

       .container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 800px;
    box-sizing: border-box;
    transform: translateX(450px); 
    /* Asegúrate de que el contenedor se ajuste al tamaño del viewport si es necesario */
    min-height: 60vh; /* Opcional, para mantener una altura mínima */
}
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .photo {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }

        .form-controls {
            margin-top: 20px;
            text-align: right;
        }

        .form-controls button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-controls button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Editar_Alumno">
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
    <section class="u-clearfix u-section-1" id="sec-011c">
      <div class="u-clearfix u-sheet u-sheet-1">
     
        <div class="container">
        <h2>Editar Alumno</h2>
        <form id="editForm" method="post" action="actualizar.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <!-- Step 1: Personal Information -->
            <div class="step active">
                <h3>Información Personal</h3>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                
                <label>Apellidos:</label>
                <input type="text" name="apellidos" value="<?php echo htmlspecialchars($apellidos); ?>" required>
                
                <label>CURP:</label>
                <input type="text" name="curp" value="<?php echo htmlspecialchars($curp); ?>" required>
                
                <label>Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($fecha_nacimiento); ?>" required>
            </div>

            <!-- Step 2: Contact Information -->
            <div class="step">
                <h3>Información de Contacto</h3>
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required>
                
                <label>Domicilio:</label>
                <input type="text" name="domicilio" value="<?php echo htmlspecialchars($domicilio); ?>" required>
                
                <label>País:</label>
                <input type="text" name="pais" value="<?php echo htmlspecialchars($pais); ?>" required>
                
                <label>Estado:</label>
                <input type="text" name="estado" value="<?php echo htmlspecialchars($estado); ?>" required>
                
                <label>Municipio:</label>
                <input type="text" name="municipio" value="<?php echo htmlspecialchars($municipio); ?>" required>
                
                <label>Localidad:</label>
                <input type="text" name="localidad" value="<?php echo htmlspecialchars($localidad); ?>" required>
                
                <label>Colonia:</label>
                <input type="text" name="colonia" value="<?php echo htmlspecialchars($colonia); ?>" required>
            </div>

            <!-- Step 3: Academic Information -->
            <div class="step">
                <h3>Información Académica</h3>
                <label>Número de Control:</label>
                <input type="text" name="numero_control" value="<?php echo htmlspecialchars($numero_control); ?>" required>
                
                <label>Correo Electrónico:</label>
                <input type="email" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                
                <label>Fotografía:</label>
                <input type="file" name="fotografia">
                
                <?php if ($fotografia): ?>
                    <img src="uploads/<?php echo htmlspecialchars($fotografia); ?>" alt="Fotografía" class="photo">
                    <div>Foto actual: <?php echo htmlspecialchars($fotografia); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-controls">
                <button type="button" id="prevBtn" onclick="changeStep(-1)">Anterior</button>
                <button type="button" id="nextBtn" onclick="changeStep(1)">Siguiente</button>
                <input type="submit" id="submitBtn" value="Actualizar" style="display: none;">
            </div>
        </form>
        <a href="Mostrar_Alumnos.php" class="back-link">Volver a la lista</a>
    </div>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.style.display = index === stepIndex ? 'block' : 'none';
            });

            prevBtn.style.display = stepIndex === 0 ? 'none' : 'inline-block';
            nextBtn.style.display = stepIndex === steps.length - 1 ? 'none' : 'inline-block';
            submitBtn.style.display = stepIndex === steps.length - 1 ? 'inline-block' : 'none';
        }

        function changeStep(stepChange) {
            const newStep = currentStep + stepChange;
            if (newStep >= 0 && newStep < steps.length) {
                currentStep = newStep;
                showStep(currentStep);
            }
        }

        // Initialize the form to show the first step
        showStep(currentStep);
    </script>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>