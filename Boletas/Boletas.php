<?php
include 'conexion.php';

// Obtener datos para los selects
$result_ciclo_escolar = $conn->query("SELECT id, nombre FROM ciclo_escolar");
$result_alumnos = $conn->query("SELECT id, numero_control, CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM alumnos");
$result_semestres = $conn->query("SELECT id, nombre FROM semestres");
$result_asignaturas = $conn->query("SELECT id, nombre FROM asignaturas"); // Obtener las asignaturas

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Validar que todos los campos obligatorios estén llenos
        if (empty($_POST['ciclo_escolar_id']) || empty($_POST['alumno_id']) || empty($_POST['semestre_id']) || empty($_POST['grupo']) || empty($_POST['asignatura_id'])) {
            throw new Exception("Por favor, complete todos los campos obligatorios.");
        }

        $ciclo_escolar_id = $_POST['ciclo_escolar_id'];
        $alumno_id = $_POST['alumno_id'];
        $semestre_id = $_POST['semestre_id'];
        $grupo = $_POST['grupo'];

        // Consultar los nombres y el número de control correspondientes
        $ciclo_escolar_nombre = $conn->query("SELECT nombre FROM ciclo_escolar WHERE id = $ciclo_escolar_id")->fetch_assoc()['nombre'];
        $alumno_data = $conn->query("SELECT numero_control, CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM alumnos WHERE id = $alumno_id")->fetch_assoc();
        $numero_control = $alumno_data['numero_control'];
        $alumno_nombre = $alumno_data['nombre_completo'];
        $semestre_nombre = $conn->query("SELECT nombre FROM semestres WHERE id = $semestre_id")->fetch_assoc()['nombre'];

        // Función para verificar si el número de control ya está registrado
        function verificarNumeroControl($conn, $numero_control, $semestre_id, $ciclo_escolar_id) {
            $stmt = $conn->prepare("SELECT id FROM boletas WHERE numero_control = ? AND semestre_nombre = (SELECT nombre FROM semestres WHERE id = ?) AND ciclo_escolar_nombre = (SELECT nombre FROM ciclo_escolar WHERE id = ?)");
            $stmt->bind_param("sss", $numero_control, $semestre_id, $ciclo_escolar_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                throw new Exception("El número de control ya está registrado en este semestre y ciclo escolar.");
            }
            $stmt->close();
        }

        // Verificar si el número de control ya existe
        verificarNumeroControl($conn, $numero_control, $semestre_id, $ciclo_escolar_id);

        // Calcular el promedio final
        $promedio_final = 0;
        $total_asignaturas = count($_POST['asignatura_id']);
        $sumatoria_promedio = 0;

        foreach ($_POST['asignatura_id'] as $key => $asignatura_id) {
            $asignatura_nombre = $conn->query("SELECT nombre FROM asignaturas WHERE id = $asignatura_id")->fetch_assoc()['nombre'];
            $unidad_1 = $_POST['unidad_1'][$key];
            $unidad_2 = $_POST['unidad_2'][$key];
            $unidad_3 = $_POST['unidad_3'][$key];
            
            // Calcular el promedio por asignatura
            $promedio_asignatura = ($unidad_1 + $unidad_2 + $unidad_3) / 3;
            $sumatoria_promedio += $promedio_asignatura;

            // Insertar en la base de datos incluyendo el ID de la asignatura
            $stmt = $conn->prepare("INSERT INTO boletas (numero_control, alumno_nombre, semestre_nombre, grupo, ciclo_escolar_nombre, asignatura_id, asignatura_nombre, unidad_1, unidad_2, unidad_3, promedio_final) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssii", $numero_control, $alumno_nombre, $semestre_nombre, $grupo, $ciclo_escolar_nombre, $asignatura_id, $asignatura_nombre, $unidad_1, $unidad_2, $unidad_3, $promedio_asignatura);
            $stmt->execute();
            $stmt->close();
        }

        // Calcular el promedio final
        $promedio_final = $sumatoria_promedio / $total_asignaturas;

        echo "<p>Boleta registrada exitosamente.  </p>";
    } catch (Exception $e) {
        // Mostrar mensaje de error
        echo '<div style="color: red; font-weight: bold;">' . $e->getMessage() . '</div>';
    }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, REGISTRO DE ALUMNOS​">
    <meta name="description" content="">
    <title>Regsitro de  Boletas</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Boletas.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.16.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    
    <style>
        
        form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 800px; /* Ajusta el ancho según sea necesario */
    margin: 21px auto 0 calc(((100% - 1800px) / 2)  + 600px);
}


        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50; /* Color verde */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049; /* Color verde más oscuro al pasar el mouse */
        }
        button {
            background-color: #4CAF50; /* Color verde */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049; /* Color verde más oscuro al pasar el mouse */
        }

        #alumno_list {
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            background-color: white;
            z-index: 10;
            position: absolute;
            width: calc(100% - 22px); /* Ajusta el ancho del dropdown */
        }

        #alumno_list div {
            padding: 10px;
            cursor: pointer;
        }

        #alumno_list div:hover {
            background-color: #f0f0f0; /* Color de fondo al pasar el mouse */
        }
        .btn-mostrar {
    background-color: #FE9900; /* Color de fondo */
    color: white; /* Color del texto */
    padding: 10px 15px; /* Espaciado interno */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar cursor al pasar el mouse */
    font-size: 16px; /* Tamaño de fuente */
}

.btn-mostrar:hover {
    background-color: #FFFA01; /* Color de fondo al pasar el mouse */
}
#asignaturas-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.asignatura-tabla {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 15px;
    width: 100%;
    max-width: 350px;
}

.asignatura-tabla h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.asignatura-tabla table {
    width: 100%;
    border-collapse: collapse;
}

.asignatura-tabla th,
.asignatura-tabla td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.asignatura-tabla th {
    background-color: #007BFF;
    color: white;
    font-weight: bold;
}

.asignatura-tabla td {
    color: #555;
}

.asignatura-tabla tbody tr:last-child td {
    border-bottom: none;
}

.asignatura-tabla tbody tr:hover {
    background-color: #f1f1f1;
}

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
      <h2 class="u-text u-text-body-color u-text-default u-text-1">Seleccione el alumno </h2>
      <form method="post" action="">
    <div>
        <label for="ciclo_escolar_id">Periodo:</label>
        <select id="ciclo_escolar_id" name="ciclo_escolar_id" required>
            <?php while ($row = $result_ciclo_escolar->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div>
        <label for="alumno_search">Buscar Alumno:</label>
        <input type="text" id="alumno_search" name="alumno_search" placeholder="Ingrese número de control o nombre" onkeyup="buscarAlumno()" autocomplete="off">
        <input type="hidden" id="alumno_id" name="alumno_id">
        <div id="alumno_list" style="border: 1px solid #ddd; max-height: 200px; overflow-y: auto;"></div>
    </div>
    
    <script>
        function buscarAlumno() {
            const query = document.getElementById('alumno_search').value;
            
            if (query.length > 2) {  // Ejecutar la búsqueda solo si hay más de 2 caracteres
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'buscar_alumno.php?query=' + query, true);
                xhr.onload = function() {
                    if (this.status == 200) {
                        document.getElementById('alumno_list').innerHTML = this.responseText;
                    }
                }
                xhr.send();
            } else {
                document.getElementById('alumno_list').innerHTML = '';
            }
        }

        function seleccionarAlumno(id, numero_control, nombre_completo) {
            document.getElementById('alumno_search').value = numero_control + ' - ' + nombre_completo;
            document.getElementById('alumno_id').value = id;
            document.getElementById('alumno_list').innerHTML = '';
        }
    </script>

    <div>
        <label for="semestre_id">Semestre:</label>
        <select id="semestre_id" name="semestre_id" required onchange="fetchAsignaturas(this.value)">
            <?php while ($row = $result_semestres->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div>
        <label for="grupo">Grupo:</label>
        <select id="grupo" name="grupo" required>
            <option value="101">101</option>
            <option value="102">102</option>
            <option value="201">201</option>
            <option value="202">202</option>
            <option value="301">301</option>
            <option value="302">302</option>
            <option value="401">401</option>
            <option value="402">402</option>
            <option value="501">501</option>
            <option value="502">502</option>
            <option value="601">601</option>
            <option value="602">602</option>
        </select>
    </div>
   
    <h2 class="u-text u-text-body-color u-text-default u-text-1">Registrar Calificaciones </h2>
    <div id="asignaturas-container">
        <!-- Las asignaturas aparecerán aquí tras seleccionar un semestre -->
    </div>

    <div>
        <button type="submit">Registrar Boleta</button>
    </div>
    
    <div>
        <button class="btn-mostrar" type="button" onclick="location.href='Mostrar_Boletas.php'">Mostrar Boletas</button>
    </div>
</form>


    <script>
        function fetchAsignaturas(semestreId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_asignaturas.php?semestre_id=' + semestreId, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('asignaturas-container').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }
    </script>
      <a href="../Semestres/Asignaturas-Unidades.html" class="u-border-none u-btn u-btn-round u-button-style u-hover-grey-70 u-radius u-white u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="../images/1176383.png" alt=""></span>&nbsp;Salir
      </a>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
   
  
</body></html>