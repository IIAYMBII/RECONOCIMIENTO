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

$redirect_url = 'Registro_ciclo.php'; // Asegúrate de que este sea el URL correcto del formulario

// Manejo de formularios para registrar datos
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'registrar_asignatura') {
        $semestre_id = $_POST['semestre_id'];
        $nombre_asignatura = $_POST['nombre_asignatura'];
        
        $stmt = $conn->prepare("INSERT INTO asignaturas (semestre_id, nombre) VALUES (?, ?)");
        $stmt->bind_param("is", $semestre_id, $nombre_asignatura);
        
        if ($stmt->execute()) {
            $mensaje_asignatura = "Asignatura registrada exitosamente.";
        } else {
            $mensaje_asignatura = "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($_POST['accion'] == 'registrar_ciclo') {
        $nombre = $_POST['nombre'];
        
        $stmt = $conn->prepare("INSERT INTO ciclo_escolar (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        
        if ($stmt->execute()) {
            $mensaje_ciclo = "Ciclo escolar registrado exitosamente.";
        } else {
            $mensaje_ciclo = "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($_POST['accion'] == 'registrar_semestre') {
        $ciclo_escolar_id = $_POST['ciclo_escolar_id'];
        $nombre = $_POST['nombre'];
        
        $stmt = $conn->prepare("INSERT INTO semestres (ciclo_escolar_id, nombre) VALUES (?, ?)");
        $stmt->bind_param("is", $ciclo_escolar_id, $nombre);
        
        if ($stmt->execute()) {
            $mensaje_semestre = "Semestre registrado exitosamente.";
        } else {
            $mensaje_semestre = "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($_POST['accion'] == 'registrar_unidades') {
        $asignatura_id = $_POST['asignatura_id'];
        $asignatura_nombre = '';
    
        $result_asignaturas = $conn->query("SELECT id, nombre FROM asignaturas");
        while ($row = $result_asignaturas->fetch_assoc()) {
            if ($row['id'] == $asignatura_id) {
                $asignatura_nombre = $row['nombre'];
                break;
            }
        }
        
        $unidades = [];
        // Verificar si las unidades están definidas antes de acceder a ellas para evitar el error de índice no definido
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST['unidad_' . $i])) {
                $unidades[$i] = $_POST['unidad_' . $i];
            } else {
                // Si falta alguna unidad, redirigir a una página de error
                $_SESSION['error_message'] = "Error: Faltan datos para la unidad $i.";
                header("Location: error.php");
                exit();
            }
        }
        
        // Verificar si ya existe un registro para la asignatura_id
        $check_stmt = $conn->prepare("SELECT COUNT(*) FROM unidades_asignatura WHERE asignatura_id = ?");
        $check_stmt->bind_param("i", $asignatura_id);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();
        
        // Si ya existe la asignatura, redirigir a una página de error
        if ($count > 0) {
            $_SESSION['error_message'] = "Error: La asignatura ya está registrada. No se puede registrar la misma asignatura más de una vez.";
            header("Location: error.php");
            exit();
        } else {
            // Si el registro no existe, inserta un nuevo registro
            $stmt = $conn->prepare("INSERT INTO unidades_asignatura (asignatura_id, nombre_asignatura, unidad_1, unidad_2, unidad_3) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isiii", $asignatura_id, $asignatura_nombre, $unidades[1], $unidades[2], $unidades[3]);
            $action = 'registrado';
            $mensaje_unidades = "Las unidades de la asignatura han sido registradas exitosamente.";
        
            if ($stmt->execute()) {
                echo $mensaje_unidades;
            } else {
                // Si ocurre un error durante la inserción, redirigir a una página de error
                $_SESSION['error_message'] = "Error en la inserción: " . $stmt->error;
                header("Location: error.php");
                exit();
            }
        
            // Cerrar la sentencia
            $stmt->close();
        }
    
        $stmt->close();
    }
    

    // Redireccionar al formulario con el mensaje
    $mensaje = isset($mensaje_asignatura) ? $mensaje_asignatura : (isset($mensaje_ciclo) ? $mensaje_ciclo : (isset($mensaje_semestre) ? $mensaje_semestre : (isset($mensaje_unidades) ? $mensaje_unidades : '')));
    header("Location: $redirect_url?mensaje=" . urlencode($mensaje));
    exit();
    
}

// Obtener los datos necesarios para los formularios
$result_semestres = $conn->query("SELECT * FROM semestres");
$result_ciclos = $conn->query("SELECT * FROM ciclo_escolar");
$result_asignaturas = $conn->query("SELECT id, nombre FROM asignaturas");

// Obtener todos los registros con filtros
$filter = '';
if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
}

$query_asignaturas = "SELECT * FROM asignaturas";
$query_ciclos = "SELECT * FROM ciclo_escolar";
$query_semestres = "SELECT * FROM semestres";
$query_unidades = "SELECT * FROM unidades_asignatura";

if ($filter) {
    $query_asignaturas .= " WHERE nombre LIKE '%$filter%'";
    $query_ciclos .= " WHERE nombre LIKE '%$filter%'";
    $query_semestres .= " WHERE nombre LIKE '%$filter%'";
    $query_unidades .= " WHERE nombre_asignatura LIKE '%$filter%'";
}

$asignaturas_data = $conn->query($query_asignaturas);
$ciclos_data = $conn->query($query_ciclos);
$semestres_data = $conn->query($query_semestres);
$unidades_data = $conn->query($query_unidades);

$conn->close(); // Cerrar la conexión aquí, después de usarla
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Registro_ciclo</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Registro_ciclo.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    <style>
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: all 0.3s ease;
        }

        form:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            transition: color 0.3s ease;
        }

        label:hover {
            color: #007bff;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
            color: black;
        }

        button {
            background-color: #8EB277;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        button:hover {
            background-color: #43703F;
        }

        button:active {
            transform: scale(0.98);
            background-color:#65BE2F;
        }

        p {
            color: #5EEA08;
            font-weight: bold;
            margin: 0;
            text-align: center;
        }
          select {
        color: black; /* Cambia el color del texto a negro */
    }
    .mensaje {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
        }

        .mensaje.exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .mensaje.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        input[type="number"] {
    color: #000; /* Establece el color del texto a negro */
}
table {
            width: 30%;
            border-collapse: collapse; /* Elimina el espacio entre bordes */
            margin: 20px 0; /* Margen superior e inferior */
            font-family: Arial, sans-serif; /* Fuente */
        }

        thead {
            background-color: #333; /* Color de fondo del encabezado */
            color: #fff; /* Color del texto del encabezado */
        }

        th, td {
            padding: 12px; /* Espaciado dentro de las celdas */
            text-align: left; /* Alineación del texto */
            border-bottom: 1px solid #ddd; /* Línea divisoria entre filas */
        }

        th {
            font-weight: bold; /* Negrita en el encabezado */
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Color de fondo para filas pares */
        }

        tbody tr:hover {
            background-color: #f1f1f1; /* Color de fondo al pasar el ratón sobre la fila */
        }

        /* Opcional: Estilo para el borde de la tabla */
        table {
            border: 1px solid #ddd; /* Borde alrededor de la tabla */
            border-radius: 4px; /* Bordes redondeados de la tabla */
            overflow: hidden; /* Para que el borde redondeado se aplique correctamente */
        }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var mensaje = document.getElementById('mensaje');
        if (mensaje) {
            mensaje.style.display = 'block'; // Mostrar el mensaje
            setTimeout(function() {
                mensaje.style.opacity = '0'; // Desvanecer el mensaje
                setTimeout(function() {
                    mensaje.style.display = 'none'; // Ocultar completamente después de desvanecer
                }, 1000); // Esperar 1 segundo para que el desvanecimiento se complete
            }, 3000); // Esperar 3 segundos antes de iniciar el desvanecimiento
        }
    });
</script>
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registro_ciclo">
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
    <section class="u-clearfix u-custom-color-5 u-section-1" id="sec-461a">
      <div class="u-clearfix u-sheet u-valign-bottom u-sheet-1">
        <h1 class="u-custom-font u-text u-text-default u-text-1">Registro de ciclo escolar</h1>
        <div class="u-form u-form-1">
<?php
// Incluye el código de conexión aquí, si es necesario


// Leer el mensaje de la URL, si está presente
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>

          <form method="post" action="">
        <input type="hidden" name="accion" value="registrar_ciclo">
        <div>
            <label   for="nombre">Nombre del Ciclo Escolar:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
            
        </div>
        <?php if ($mensaje): ?>
        <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>" id="mensaje">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>
    </form>



        </div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-6 u-section-2" id="sec-7ed4">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-1">&nbsp;Registrar semestres por ciclo escolar</h1>
        <div class="u-form u-form-1">
       
      
    <form method="post" action="">
        <input type="hidden" name="accion" value="registrar_semestre">
        <div>
            <label for="ciclo_escolar_id">Ciclo Escolar:</label>
            <select id="ciclo_escolar_id" name="ciclo_escolar_id" required>
                <?php while ($row = $result_ciclos->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label for="nombre">Nombre del Semestre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
        <?php if ($mensaje): ?>
        <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>" id="mensaje">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>
    </form>


        </div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-8 u-section-3" id="sec-9ada">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-1">&nbsp;Registrar asignturas por semestre</h1>
        <div class="u-form u-form-1">
   
    <form method="post" action="">
        <input type="hidden" name="accion" value="registrar_asignatura">
        <div>
            <label for="semestre_id">Semestre:</label>
            <select id="semestre_id" name="semestre_id" required>
                <?php while ($row = $result_semestres->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label for="nombre_asignatura">Nombre de la Asignatura:</label>
            <input type="text" id="nombre_asignatura" name="nombre_asignatura" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
        <?php if ($mensaje): ?>
        <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>" id="mensaje">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>
    </form>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-9 u-section-4" id="carousel_08a7">
    <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-1">Registrar unidades por semestres</h1>
        <div class="u-form u-form-1">
            <form method="post" action="">
                <input type="hidden" name="accion" value="registrar_unidades">
                <div>
                    <label for="asignatura_id">Asignatura:</label>
                    <select id="asignatura_id" name="asignatura_id" required>
                        <?php while ($row = $result_asignaturas->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['nombre']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Registrar Unidades</button>
                </div>
                <?php if (isset($mensaje) && $mensaje): ?>
                    <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>" id="mensaje">
                        <?php echo htmlspecialchars($mensaje); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

    <section class="u-clearfix u-section-5" id="sec-acd9">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-default u-text-1">registros totales</h1>
        <h2>Filtrar Registros</h2>
    <form method="post" action="">
        <div class="filter-input">
            <label for="filter">Buscar:</label>
            <input type="text" id="filter" name="filter" value="<?php echo htmlspecialchars($filter); ?>">
        </div>
        <div>
            <button type="submit">Filtrar</button>
        </div>
    </form>

    <h2>Listado de Asignaturas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $asignaturas_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Listado de Ciclos Escolares</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $ciclos_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Listado de Semestres</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ciclo Escolar ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $semestres_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ciclo_escolar_id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Listado de Unidades de Asignatura</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Asignatura ID</th>
                <th>Nombre de Asignatura</th>
                <th>Unidad 1</th>
                <th>Unidad 2</th>
                <th>Unidad 3</th>
               
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $unidades_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['asignatura_id']; ?></td>
                <td><?php echo $row['nombre_asignatura']; ?></td>
                <td><?php echo $row['unidad_1']; ?></td>
                <td><?php echo $row['unidad_2']; ?></td>
                <td><?php echo $row['unidad_3']; ?></td>
                
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
      </div>
    </section>
    <section class="u-clearfix u-section-6" id="sec-ae0f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="MODIFICAR_CICLO.php" class="u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-btn-1"><span class="u-file-icon u-icon u-icon-1"><img src="../images/8080670.png" alt=""></span> MODIFICAR_CICLO
        </a>
        <a href="../Boletas/Boletas.php" class="u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-btn-2"> &nbsp; <span class="u-file-icon u-icon u-icon-2"><img src="../images/1176383.png" alt=""></span>REGISTROS_BOLETAS
        </a>
        <a href="../ADMINISTRACION.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-btn-3"><span class="u-file-icon u-icon u-icon-3"><img src="../images/2544087.png" alt=""></span>&nbsp;​​ADMINISTRACION
        </a>
      </div>
      
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>