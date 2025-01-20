<?php
session_start(); // Inicia la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirige a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit();
}

// Aquí va el contenido protegido de la página
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Portal Educativo, Control Escolar, Plataforma Estudiantil, What our customers say, Gestión Académica, faq, Portal Educativo, Nuestro increíble equipo, Control Escolar">
    <meta name="description" content="">
    <title>ADMINISTRACION</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="ADMINISTRACION.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <style>

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh; /* Ocupa el 70% de la altura de la ventana */
    background: rgb(14,39,84);
    background: linear-gradient(0deg, rgba(14,39,84,1) 0%, rgba(8,34,79,0.6) 10%, rgba(255,255,255,1) 100%), 
                url('./images/Estudiantes.jpg'); /* Reemplaza con la ruta de tu imagen */
    background-size: auto; /* La imagen se muestra en su tamaño original */
  
    
    height: 80vh; /* Asegura que el contenedor ocupe el 80% de la altura de la ventana */
}

.centered-box {
    background-color: #9fa1b9;
    border: 2px solid #0a134b;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 800px;
    text-align: center;
    box-sizing: border-box;
}

.centered-box p {
    margin: 0 0 15px;
    color: #333;
}

.button {
    display: inline-block;
    background-color: #0a134b;
    color: #ffffff;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    border: none;
}

.button:hover {
    background-color: #8588be;
}
    </style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="ADMINISTRACION">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="es"><header class="u-clearfix u-header u-header" id="sec-1054"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-group-elements u-group-elements-1" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
          <a href="#" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
            <img src="images/151852.png" class="u-logo-image u-logo-image-1">
          </a>
          <img class="u-image u-image-contain u-image-default u-image-2" src="images/elpoderdeservir.png" alt="" data-image-width="4590" data-image-height="1866">
        </div>
        <h1 class="u-align-center u-custom-font u-font-georgia u-text u-text-1" data-custom-animation="{&quot;animation&quot;:{&quot;XXL&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XL&quot;:{&quot;steps&quot;:[{&quot;dist&quot;:0.41,&quot;skip&quot;:0,&quot;blur&quot;:&quot;29&quot;,&quot;sticky&quot;:false,&quot;fixed&quot;:true,&quot;mx&quot;:0,&quot;my&quot;:0,&quot;op&quot;:0,&quot;rot&quot;:0,&quot;sx&quot;:3,&quot;sy&quot;:3,&quot;bgy&quot;:0}],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;middle&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;LG&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;MD&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:false,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;SM&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}},&quot;XS&quot;:{&quot;steps&quot;:[],&quot;hidden&quot;:true,&quot;start&quot;:{&quot;at&quot;:&quot;bottom&quot;,&quot;off&quot;:0},&quot;end&quot;:{&quot;at&quot;:&quot;top&quot;,&quot;off&quot;:0}}},&quot;container&quot;:&quot;&quot;}">Tecnológicos de Estudios Superiores De Jocotitlan <br>
          <span class="u-text-custom-color-1">_______________________________________________</span>
          <span class="u-text-custom-color-1"></span>
          <br>
          <span style="font-size: 1rem;">​Sistema de Control De Asistencias WEB&nbsp;</span>
          <br>
        </h1>
        <img class="u-image u-image-contain u-image-default u-image-3" src="images/369-3698095_escudo-de-mexico-png.png" alt="" data-image-width="1085" data-image-height="687" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0">
      </div></header> 
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="sec-b7ca" data-image-width="1920" data-image-height="1047">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-center u-text u-text-default u-title u-text-1"> Portal Educativo</h1>
        <p class="u-align-center u-large-text u-text u-text-variant u-text-2">Incluye funcionalidades para el seguimiento de la conducta y el rendimiento académico de los alumnos.</p>
        <div class="custom-expanded data-layout-selected u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-60">
                <div class="u-layout-col">
                  <div class="u-align-center u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1">
                      <h2 class="u-text u-text-white u-text-3">INFORMACIÓN DEL USUARIO </h2>
                      <div class="u-container-style u-custom-color-3 u-group u-radius u-shape-round u-group-1">
                        <div class="u-container-layout u-container-layout-2"><span class="u-file-icon u-icon u-icon-1"><img src="images/5065208.png" alt=""></span>
                          <h2 class="u-custom-font u-font-open-sans u-text u-text-default u-text-4">BIENVENIDO:<?php echo htmlspecialchars($_SESSION['usuario']); ?>! </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="logout.php" class="u-btn u-button-style u-none u-btn-1"><span class="u-file-icon u-icon u-icon-2"><img src="images/1176383.png" alt=""></span>&nbsp;SALIR
        </a>
      </div>
    </section>
    <section>
      <div class="container">
      <div class="centered-box">
      <h2 class="u-align-center u-text u-text-default u-text-1">Registro de datos personales de los estudiantes</h2>
        <img src="./images/40358.png" alt="Imagen de Registro">
        <p>En esta sección se registrarán los estudiantes para que nos brinden la información personal solicitada por la institución, permitiendo conocer más sobre el estudiante.</p>
        <a href="./DATOS_PERSONALES/REGISTRO_DATOS.php" class="button">Registar Estudiantes</a>
        <a href="./DATOS_PERSONALES/obtener.php" class="button">Consultar informacion</a>
        
      
    </div>
</div>
      </section>
    <section class="u-align-center u-clearfix u-section-2" id="sec-9594">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-default u-text-1">Control Escolar</h2>
        <p class="u-align-center u-text u-text-default u-text-2">Finalmente, asegúrate de proporcionar un sistema de notificaciones y reportes automatizados para los docentes.</p>
        <div class="custom-expanded u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-container-align-center u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-align-center u-file-icon u-icon u-icon-circle u-white u-icon-1"><img src="images/8245303.png" alt=""></span>
                <h4 class="u-align-center u-text u-text-body-alt-color u-text-3">INFORMACIÓN PERSONAL </h4>
                <p class="u-align-center u-text u-text-body-alt-color u-text-4">Para administrar los alumnos, tanto registrar los nuevos alumnos dentro del plantel</p>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-2">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2"><span class="u-align-center u-file-icon u-icon u-icon-circle u-white u-icon-2"><img src="images/10162914.png" alt=""></span>
                <h4 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-5">Asistencias</h4>
                <p class="u-align-center u-text u-text-body-alt-color u-text-default u-text-6">administrar como registrar las asistencias de los alumnos de todos los dias</p>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-3">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3"><span class="u-align-center u-file-icon u-icon u-icon-circle u-white u-icon-3"><img src="images/4645247.png" alt=""></span>
                <h4 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-7">Boletas </h4>
                <p class="u-align-center u-text u-text-body-alt-color u-text-default u-text-8">Ofrece herramientas para la gestión de boletas tanto consulta de semestres y asiganturas</p>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-custom-color-3 u-list-item u-repeater-item u-list-item-4">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4"><span class="u-align-center u-file-icon u-icon u-icon-circle u-white u-icon-4"><img src="images/10490472.png" alt=""></span>
                <h4 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-9">Control Escolar</h4>
                <p class="u-align-center u-text u-text-body-alt-color u-text-default u-text-10">Además, considera integrar un sistema de gestión de matrícula y expedientes académicos electrónicos.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="u-list u-list-2">
          <div class="u-repeater u-repeater-2">
            <div class="u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-5">
                <a href="ALUMNOS/Registro_Alumnos.php" class="u-align-center u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-custom-item u-none u-text-palette-1-base u-btn-1"> Consultar </a>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-6">
                <a href="escaneo/reconocimiento.html" class="u-align-center u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-custom-item u-none u-text-palette-1-base u-btn-2"> Consultar </a>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-7">
                <a href="Semestres/Asignaturas-Unidades.html" class="u-align-center u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-custom-item u-none u-text-palette-1-base u-btn-3"> Consultar </a>
              </div>
            </div>
            <div class="u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-8">
                <a href="SALONES/Registro_Grupos.php" class="u-align-center u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-custom-item u-none u-text-palette-1-base u-btn-4"> Consultar </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
</body></html>