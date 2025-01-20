<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

include 'conexion.php';
require_once 'vendor/autoload.php';

$conn = new mysqli('localhost', 'root', '', 'sistema_escolar');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Inicializar filtros
$filtro_numero_control = isset($_POST['numero_control']) ? $_POST['numero_control'] : '';
$filtro_nombre_completo = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
$filtro_fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$filtro_estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$filtro_materia = isset($_POST['materia']) ? $_POST['materia'] : '';

// Consulta SQL
$sql = "SELECT * FROM registro_estudiantes WHERE 1=1";

if (!empty($filtro_numero_control)) $sql .= " AND numero_control LIKE '%$filtro_numero_control%'";
if (!empty($filtro_nombre_completo)) $sql .= " AND nombre_completo LIKE '%$filtro_nombre_completo%'";
if (!empty($filtro_fecha)) $sql .= " AND fecha = '$filtro_fecha'";
if (!empty($filtro_estado)) $sql .= " AND estado LIKE '%$filtro_estado%'";
if (!empty($filtro_materia)) $sql .= " AND materias LIKE '%$filtro_materia%'";

$resultado = $conn->query($sql);

// Generar el documento PDF
if (isset($_POST['generar_pdf']) && $resultado->num_rows > 0) {
    // Cargar TCPDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false); // 'L' es para orientación Landscape
    
    // Agregar página
    $pdf->AddPage();
    
   
    // Título
    $pdf->SetFont('helvetica', 'B', 11);  // Ajustar tamaño de fuente
    $pdf->Cell(0, 10, 'Registro de Entradas y Salidas', 0, 1, 'C');
    
    // Salto de línea
    $pdf->Ln(6);  // Reducir el salto de línea
    
    // Establecer fuente para la tabla
    $pdf->SetFont('helvetica', '', 8);  // Ajustar tamaño de fuente para los datos
    
    // Encabezados de la tabla
    $pdf->Cell(15, 6, 'ID_CLAVE', 1, 0, 'C');
    $pdf->Cell(50, 6, 'Nombre completo', 1, 0, 'C');  // Aumentado a 50
    $pdf->Cell(30, 6, 'Numero de control', 1, 0, 'C');
    $pdf->Cell(50, 6, 'Carrera', 1, 0, 'C');  // Aumentado a 30
    $pdf->Cell(25, 6, 'Materias', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Estado', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Entrada', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Salida', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Fecha', 1, 1, 'C');
    
    // Agregar datos utilizando MultiCell para los campos con textos largos
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(15, 7.3, $row['id'], 1, 0, 'C');
        
        // Usar MultiCell para el nombre completo (más espacio)
        $pdf->MultiCell(50, 7.3, $row['nombre_completo'], 1, 'C', 0, 0);  // Aumentado a 50
        
        // Usar MultiCell para el número de control
        $pdf->MultiCell(30, 7.3, $row['numero_control'], 1, 'C', 0, 0);
        
        // Usar MultiCell para la carrera (más espacio)
        $pdf->MultiCell(50, 7.3, $row['carrera'], 1, 'C', 0, 0);  // Aumentado a 30
        
        // Usar MultiCell para materias (pueden ser largas)
        $pdf->MultiCell(25, 7.3, $row['materias'], 1, 'C', 0, 0);
        
        $pdf->Cell(25, 7.3, $row['estado'], 1, 0, 'C');
        $pdf->Cell(25, 7.3, $row['horario_entrada'], 1, 0, 'C');
        $pdf->Cell(25, 7.3, $row['horario_salida'], 1, 0, 'C');
        $pdf->Cell(25, 7.3, $row['fecha'], 1, 1, 'C');
    }

    // Output del PDF
    $fileName = "Registro_Entradas_Salidas_" . date('YmdHis') . ".pdf";
    $pdf->Output($fileName, 'D');
    exit();
}
?>




<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB">
    <meta name="description" content="">
    <title>Mostrar_Asistencias</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Mostrar_Asistencias.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    <style>
       
.search-container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 1000px; /* Puedes ajustar el ancho máximo según tus necesidades */
    box-sizing: border-box;
    transform: translateX(300px);
}

.search-container form {
    display: flex;
   
    flex-wrap: wrap; /* Permite que los elementos se envuelvan si el espacio es insuficiente */
    gap: 15px; /* Espacio entre los elementos */
}

.search-container input[type="text"],
.search-container input[type="date"] {
    flex: 1;
    min-width: 200px; /* Ancho mínimo para los campos */
    padding: 10px;
    border: 1px solid #49703E;
    border-radius: 5px;
    box-sizing: border-box;
    color: black;
}

.search-container button {
    background-color: #49703E;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    min-width: 120px; /* Ancho mínimo para el botón */
}

.search-container button:hover {
    background-color: #FD2E09;
}

.search-container input[type="text"]::placeholder,
.search-container input[type="date"]::placeholder {
    color: #69865D;
}
.edit-button {
    display: inline-block;
    padding: 5px 10px;
    margin: 0;
    color: #007bff;
    text-decoration: none;
    border: 1px solid #007bff;
    border-radius: 4px;
    font-size: 14px;
}

.edit-button:hover {
    background-color: #007bff;
    color: white;
}
.custom-expanded {
        overflow: auto; /* Habilita el desplazamiento cuando sea necesario */
        max-height: 400px; /* Ajusta la altura máxima según tus necesidades */
    }

    .u-table-responsive {
        display: block; /* Hace que el contenedor de la tabla sea un bloque */
        overflow-x: auto; /* Habilita el desplazamiento horizontal */
        -webkit-overflow-scrolling: touch; /* Mejora el desplazamiento en dispositivos táctiles */
    }

    table {
        width: 100%; /* Asegura que la tabla ocupe todo el ancho del contenedor */
        border-collapse: collapse; /* Elimina el espacio entre bordes de celdas */
    }

    th, td {
        padding: 8px; /* Añade un poco de espacio dentro de las celdas */
        text-align: left; /* Alinea el texto a la izquierda */
    }

    th {
        background-color:  background-color: #007bff;; /* Color de fondo para los encabezados */
    }
    </style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}
</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Mostrar_Asistencias">
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
      <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="sec-f249" data-image-width="1920" data-image-height="1047">
    <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-default u-text-1">Registro de Entradas y Salidas</h1>
        <a href="../escaneo/reconocimiento.html" class="u-btn u-button-style u-none u-btn-1"><span class="u-file-icon u-icon u-icon-2"><img src="1176383.png" alt=""></span>&nbsp;SALIR
        </a>
        <div class="search-container">
        <form method="POST" action="">
    <input type="text" name="numero_control" placeholder="Buscar por número de control" value="<?php echo htmlspecialchars($filtro_numero_control); ?>">
    <input type="text" name="nombre_completo" placeholder="Buscar por nombre o apellidos" value="<?php echo htmlspecialchars($filtro_nombre_completo); ?>">
    <input type="date" name="fecha" value="<?php echo htmlspecialchars($filtro_fecha); ?>">
    <input type="text" name="estado" placeholder="Buscar por estado (activo/inactivo)" value="<?php echo htmlspecialchars($filtro_estado); ?>">
    <input type="text" name="materia" placeholder="Buscar por materia" value="<?php echo htmlspecialchars($filtro_materia); ?>">
    <button type="submit" name="buscar">Buscar</button>
    <button type="submit" name="generar_pdf">Generar PDF</button> <!-- Botón para PDF -->
</form>

           
        </div>

        <div class="custom-expanded u-table u-table-responsive u-table-1">
            <table class="u-table-entity u-table-entity-1">
                <thead class="u-palette-4-base u-table-header u-table-header-1">
                    <tr>
                        <th>ID_CLAVE</th>
                        <th>Nombre completo</th>
                        <th>Número de control</th>
                        <th>Carrera</th>
                        <th>Materias</th>
                        <th>Estado</th>
                        <th>Horario de entrada</th>
                        <th>Horario de salida</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fila['id']); ?></td>
                            <td><?php echo htmlspecialchars($fila['nombre_completo']); ?></td>
                            <td><?php echo htmlspecialchars($fila['numero_control']); ?></td>
                            <td><?php echo htmlspecialchars($fila['carrera']); ?></td>
                            <td><?php echo htmlspecialchars($fila['materias']); ?></td>
                            <td><?php echo htmlspecialchars($fila['estado']); ?></td>
                            <td><?php echo htmlspecialchars($fila['horario_entrada']); ?></td>
                            <td><?php echo htmlspecialchars($fila['horario_salida']); ?></td>
                            <td><?php echo htmlspecialchars($fila['fecha']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>