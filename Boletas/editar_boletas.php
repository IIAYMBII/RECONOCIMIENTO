

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, REGISTRO DE ALUMNOS​">
    <meta name="description" content="">
    <title>Mostrar_Alumnos</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Mostrar_Boletas.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.16.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
   
    <style>
        /* Estilos generales para el contenedor */
.editar {
    max-width: 500px; /* Ancho máximo del formulario */
    margin: 20px auto; /* Centrar el formulario */
    padding: 20px; /* Espacio interno */
    background-color: #f9f9f9; /* Fondo claro */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra */
}

/* Estilo para los encabezados */
h2 {
    text-align: center; /* Centrar el texto */
    color: #333; /* Color del texto */
}

/* Estilo para las etiquetas del formulario */
label {
    display: block; /* Hacer que cada etiqueta ocupe toda la línea */
    margin: 10px 0 5px; /* Margen superior e inferior */
    font-weight: bold; /* Negrita para las etiquetas */
}

/* Estilo para los campos de entrada */
input[type="text"],
input[type="number"] {
    width: 100%; /* Ancho completo */
    padding: 10px; /* Espacio interno */
    border: 1px solid #ccc; /* Borde gris claro */
    border-radius: 4px; /* Bordes redondeados */
    box-sizing: border-box; /* Incluir padding en el ancho total */
}

/* Estilo para el botón de envío */
input[type="submit"] {
    background-color: #007BFF; /* Color de fondo azul */
    color: white; /* Color del texto en blanco */
    border: none; /* Sin borde */
    padding: 10px 15px; /* Espacio interno */
    border-radius: 4px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar el cursor al pasar el ratón */
    font-size: 16px; /* Tamaño de fuente */
    display: block; /* Hacer que el botón ocupe toda la línea */
    margin: 20px auto; /* Centrando el botón */
    transition: background-color 0.3s; /* Transición suave para el color de fondo */
}

/* Cambiar el color del botón al pasar el ratón */
input[type="submit"]:hover {
    background-color: #0056b3; /* Color más oscuro en hover */
}

/* Estilo para el enlace de cancelación */
a {
    display: inline-block; /* Hacer que el enlace sea un bloque en línea */
    text-align: center; /* Centrar texto */
    margin-top: 10px; /* Margen superior */
    color: #007BFF; /* Color azul */
    text-decoration: none; /* Sin subrayado */
}

a:hover {
    text-decoration: underline; /* Subrayar al pasar el ratón */
}

    </style>
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Mostrar_Alumnos">
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
      <section class="u-clearfix u-gradient u-section-1" id="sec-b734">
    
    
      <?php
include 'conexion.php';

// Verificar si se recibieron el ID de la materia y el número de control
if (isset($_GET['id']) && isset($_GET['numero_control'])) {
    $asignatura_id = $_GET['id']; // ID de la asignatura
    $numero_control = $_GET['numero_control']; // Número de control del alumno

    // Consultar los detalles de la asignatura utilizando asignatura_id y numero_control
    $result = $conn->query("
        SELECT * FROM boletas 
        WHERE asignatura_id = '$asignatura_id' AND numero_control = '$numero_control'
    ");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No se encontró la asignatura para el alumno especificado.</p>";
        exit();
    }

    // Procesar el formulario al enviarse
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario
        $asignatura_nombre = $_POST['asignatura_nombre'];
        $unidad_1 = $_POST['unidad_1'];
        $unidad_2 = $_POST['unidad_2'];
        $unidad_3 = $_POST['unidad_3'];

        // Calcular el nuevo promedio final
        $promedio_final = ($unidad_1 + $unidad_2 + $unidad_3) / 3;

        // Actualizar la base de datos utilizando el ID de la asignatura y el número de control
        $update_query = "
            UPDATE boletas SET
                asignatura_nombre = '$asignatura_nombre',
                unidad_1 = '$unidad_1',
                unidad_2 = '$unidad_2',
                unidad_3 = '$unidad_3',
                promedio_final = '$promedio_final'
            WHERE asignatura_id = '$asignatura_id' AND numero_control = '$numero_control'";

        if ($conn->query($update_query) === TRUE) {
            echo "<p>Calificaciones actualizadas exitosamente.</p>";
            echo "<a href='Mostrar_Boletas.php'>Volver a las boletas</a>";
        } else {
            echo "<p>Error al actualizar: " . $conn->error . "</p>";
        }
    }
} else {
    echo "<p>Faltan parámetros necesarios.</p>";
    exit();
}
?>

<div class="editar">
    <h2>Editar Calificaciones</h2>
    <form method="post" action="">
        <label for="asignatura_nombre">Asignatura:</label>
        <input type="text" id="asignatura_nombre" name="asignatura_nombre" value="<?php echo htmlspecialchars($row['asignatura_nombre']); ?>" required><br>

        <label for="unidad_1">Unidad 1:</label>
        <input type="text" id="unidad_1" name="unidad_1" value="<?php echo htmlspecialchars($row['unidad_1']); ?>" required><br>

        <label for="unidad_2">Unidad 2:</label>
        <input type="text" id="unidad_2" name="unidad_2" value="<?php echo htmlspecialchars($row['unidad_2']); ?>" required><br>

        <label for="unidad_3">Unidad 3:</label>
        <input type="text" id="unidad_3" name="unidad_3" value="<?php echo htmlspecialchars($row['unidad_3']); ?>" required><br>

        <input type="submit" value="Actualizar Calificaciones">
    </form>
</div>

</div>

    <a href="Mostrar_Boletas.php">Cancelar</a>
    </section>
    
</div>
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
   
</body>
</html>
