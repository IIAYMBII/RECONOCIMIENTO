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
       .container {
        background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 600px; /* Ajusta el ancho según sea necesario */
    margin: 0 auto; /* Centrará el formulario horizontalmente */
}
        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 50%;
            border-collapse: collapse;
           
            margin: 20px auto; 
            
        }

        table, th, td {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombreado */
        }

        th, td {
            padding: 12px;
            text-align: left;
            background-color: #B0D0B0;
        }

        th {
            background-color: #f2f2f2;
        }

        h3, h4 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            color: #e74c3c;
            font-weight: bold;
        }
        .promedio-general {
        background-color: #e7f3fe; /* Fondo suave */
        border-left: 6px solid #2196F3; /* Barra lateral azul */
        color: #0c5460; /* Color del texto */
        padding: 10px; /* Espaciado interno */
        margin: 20px auto; /* Margen para centrar el texto */
        width: 80%; /* Ajusta el ancho según sea necesario */
        max-width: 600px; /* Limita el ancho máximo */
        border-radius: 5px; /* Bordes redondeados */
        text-align: center; /* Centrar el texto */
        font-weight: bold; /* Texto en negrita */
        font-size: 1.2em; /* Tamaño de fuente */
    }
    </style>
    </style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
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
      
      <div class="container">
        <h2>Buscar Boleta por Número de Control</h2>
        <form method="post" action="">
            <label for="numero_control">Número de Control:</label>
            <input type="text" id="numero_control" name="numero_control" required>
            <button type="submit">Buscar</button>
        </form>
        </div>
        <?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_control = $_POST['numero_control'];

    // Consultar boletas filtradas por número de control
    $result_boletas = $conn->query("
        SELECT 
            numero_control, 
            alumno_nombre, 
            semestre_nombre, 
            grupo, 
            ciclo_escolar_nombre, 
            asignatura_id,  -- Agregar el ID de la asignatura
            asignatura_nombre, 
            unidad_1, 
            unidad_2, 
            unidad_3, 
            promedio_final 
        FROM 
            boletas 
        WHERE 
            numero_control = '$numero_control'
    ");

    if ($result_boletas->num_rows > 0) {
        // Obtener los datos comunes del primer registro
        $first_row = $result_boletas->fetch_assoc();
        
        // Mostrar la primera tabla con los datos generales del alumno
        echo "<h3>Datos del Alumno</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Número de Control</th>
                <th>Alumno</th>
                <th>Semestre</th>
                <th>Grupo</th>
                <th>Ciclo Escolar</th>
            </tr>";

        echo "<tr>
                <td>{$first_row['numero_control']}</td>
                <td>{$first_row['alumno_nombre']}</td>
                <td>{$first_row['semestre_nombre']}</td>
                <td>{$first_row['grupo']}</td>
                <td>{$first_row['ciclo_escolar_nombre']}</td>
            </tr>";
        echo "</table>";

        // Mostrar la segunda tabla con las asignaturas y calificaciones
        echo "<h3>Asignaturas y Calificaciones</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Asignatura</th>
                <th>primer parcial</th>
                <th>segundo parcial</th>
                <th>tercer parcial</th>
                <th>Promedio Asignatura</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>";

        // Inicializar variables para el cálculo del promedio
        $total_promedio = 0;
        $total_asignaturas = 0;

        // Mostrar la primera asignatura
        do {
            $unidad_1 = $first_row['unidad_1'];
            $unidad_2 = $first_row['unidad_2'];
            $unidad_3 = $first_row['unidad_3'];

            // Calcular el nuevo promedio de la asignatura
            $nuevo_promedio_asignatura = ($unidad_1 + $unidad_2 + $unidad_3) / 3;

            echo "<tr>
                    <td>{$first_row['asignatura_nombre']}</td>
                    <td>{$unidad_1}</td>
                    <td>{$unidad_2}</td>
                    <td>{$unidad_3}</td>
                    <td>" . number_format($nuevo_promedio_asignatura, 2) . "</td>
                    <td>
                        <a href='editar_boletas.php?id={$first_row['asignatura_id']}&numero_control={$first_row['numero_control']}'>Editar</a>
                    </td>
                </tr>";

            // Actualizar el promedio final en la base de datos
            $asignatura_id = $first_row['asignatura_id'];
            $conn->query("UPDATE boletas SET promedio_final = '$nuevo_promedio_asignatura' WHERE asignatura_id = '$asignatura_id'");

            // Sumar al total
            $total_promedio += $nuevo_promedio_asignatura;
            $total_asignaturas++;

        } while ($first_row = $result_boletas->fetch_assoc());

        $promedio_general = $total_asignaturas > 0 ? $total_promedio / $total_asignaturas : 0;

        echo "</table>";
        echo "<div class='promedio-general'>Promedio General: " . number_format($promedio_general, 2) . "</div>";
    } else {
        echo "<div class='promedio-general'>No hay asignaturas para calcular el promedio.</div>";
    }
}
?>




    
      <a href="Boletas.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-grey-70 u-radius u-white u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="../images/1176383.png" alt=""></span>&nbsp;Salir
      </a>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
   
</body></html>