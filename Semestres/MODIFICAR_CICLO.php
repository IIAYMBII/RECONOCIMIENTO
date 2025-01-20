<?php
include 'conexion.php';

// Consultas para obtener datos
try {
    $result_asignaturas = $conn->query("SELECT id, nombre FROM asignaturas");
    $result_asignaturas1 = $conn->query("SELECT id, nombre FROM asignaturas");
    $result_asignaturas2 = $conn->query("SELECT id, nombre FROM asignaturas");
    $result_ciclos = $conn->query("SELECT id, nombre FROM ciclo_escolar");
    $result_ciclos1 = $conn->query("SELECT id, nombre FROM ciclo_escolar");
    $result_semestres = $conn->query("SELECT id, nombre FROM semestres");
    $result_semestres1 = $conn->query("SELECT id, nombre FROM semestres");
    $unidades_data = $conn->query("SELECT id, nombre_asignatura FROM unidades_asignatura");
    $unidades_data1 = $conn->query("SELECT id, nombre_asignatura FROM unidades_asignatura");
} catch (Exception $e) {
    // Guardar el mensaje de error en la sesión y redirigir a la página de error
    session_start();
    $_SESSION['mensaje_error'] = "Error de conexión: " . $e->getMessage();
    header("Location: pagina_error.php"); // Cambia esto por la URL de tu página de error
    exit;
}

// Manejo de formularios para actualizar y eliminar datos
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'] ?? '';

    try {
        if ($accion == 'actualizar_asignatura') {
            $asignatura_id = $_POST['asignatura_id'];
            $nombre_asignatura = $_POST['nombre_asignatura'];

            $stmt = $conn->prepare("UPDATE asignaturas SET nombre = ? WHERE id = ?");
            $stmt->bind_param("si", $nombre_asignatura, $asignatura_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_asignatura = "Asignatura actualizada exitosamente.";

        } elseif ($accion == 'eliminar_asignatura') {
            $asignatura_id = $_POST['asignatura_id'];

            $stmt = $conn->prepare("DELETE FROM asignaturas WHERE id = ?");
            $stmt->bind_param("i", $asignatura_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_asignatura = "Asignatura eliminada exitosamente.";

        } elseif ($accion == 'actualizar_ciclo') {
            $ciclo_id = $_POST['ciclo_id'];
            $nombre = $_POST['nombre'];

            $stmt = $conn->prepare("UPDATE ciclo_escolar SET nombre = ? WHERE id = ?");
            $stmt->bind_param("si", $nombre, $ciclo_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_ciclo = "Ciclo escolar actualizado exitosamente.";

        } elseif ($accion == 'eliminar_ciclo') {
            $ciclo_id = $_POST['ciclo_id'];

            $stmt = $conn->prepare("DELETE FROM ciclo_escolar WHERE id = ?");
            $stmt->bind_param("i", $ciclo_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_ciclo = "Ciclo escolar eliminado exitosamente.";

        } elseif ($accion == 'actualizar_semestre') {
            $semestre_id = $_POST['semestre_id'];
            $nombre = $_POST['nombre'];

            $stmt = $conn->prepare("UPDATE semestres SET nombre = ? WHERE id = ?");
            $stmt->bind_param("si", $nombre, $semestre_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_semestre = "Semestre actualizado exitosamente.";

        } elseif ($accion == 'eliminar_semestre') {
            $semestre_id = $_POST['semestre_id'];

            $stmt = $conn->prepare("DELETE FROM semestres WHERE id = ?");
            $stmt->bind_param("i", $semestre_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_semestre = "Semestre eliminado exitosamente.";

        } elseif ($accion == 'actualizar_unidades') {
            $unidades_id = $_POST['unidades_id'];
            $asignatura_id = $_POST['asignatura_id'];
            $asignatura_nombre = '';

            // Consulta para obtener el nombre de la asignatura
            $stmt = $conn->prepare("SELECT nombre FROM asignaturas WHERE id = ?");
            $stmt->bind_param("i", $asignatura_id);
            $stmt->execute();
            $result_asignatura = $stmt->get_result();
            if ($row = $result_asignatura->fetch_assoc()) {
                $asignatura_nombre = $row['nombre'];
            }
            $stmt->close();

            $unidades = [];
            for ($i = 1; $i <= 6; $i++) {
                $unidades[$i] = $_POST['unidad_' . $i];
            }

            $stmt = $conn->prepare("UPDATE unidades_asignatura SET asignatura_id = ?, nombre_asignatura = ?, unidad_1 = ?, unidad_2 = ?, unidad_3 = ?, unidad_4 = ?, unidad_5 = ?, unidad_6 = ? WHERE id = ?");
            $stmt->bind_param("isiiiiiii", $asignatura_id, $asignatura_nombre, $unidades[1], $unidades[2], $unidades[3], $unidades[4], $unidades[5], $unidades[6], $unidades_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_unidades = "Unidades de la asignatura actualizadas exitosamente.";

        } elseif ($accion == 'eliminar_unidades') {
            $unidades_id = $_POST['unidades_id'];

            $stmt = $conn->prepare("DELETE FROM unidades_asignatura WHERE id = ?");
            $stmt->bind_param("i", $unidades_id);

            if (!$stmt->execute()) {
                throw new Exception("Error: " . $stmt->error);
            }
            $stmt->close();
            $mensaje_unidades = "Unidades de la asignatura eliminadas exitosamente.";
        }
    } catch (Exception $e) {
        // Guardar el mensaje de error en la sesión y redirigir a la página de error
        session_start();
        $_SESSION['mensaje_error'] = "Error: " . $e->getMessage();
        header("Location: pagina_error.php"); // Cambia esto por la URL de tu página de error
        exit;
    }
}

// Función para imprimir opciones del select
function print_options($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value=\"{$row['id']}\">{$row['nombre']}</option>";
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MODIFICAR_CICLO</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="MODIFICAR_CICLO.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    
   <style>
    form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745; /* Color verde del botón */
            color: #fff; /* Color del texto del botón */
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838; /* Color verde más oscuro en hover */
        }

        
        select,
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            color: #000; /* Texto en color negro */
        }

        button {
            background-color: #28a745; /* Color verde del botón */
            color: #fff; /* Color del texto del botón */
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838; /* Color verde más oscuro en hover */
        }

       
        .mensaje {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #f44336; /* Color rojo para errores */
    color: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.5s ease-out;
    font-size: 16px;
    max-width: 300px;
}

.mensaje.exito {
    background-color: #4caf50; /* Color verde para éxitos */
}

.mensaje.hidden {
    opacity: 0;
}
button {
            background-color: #28a745; /* Color verde del botón */
            color: #fff; /* Color del texto del botón */
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838; /* Color verde más oscuro en hover */
        }
        
   </style> 
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los mensajes
    const mensajes = document.querySelectorAll('.mensaje');
    
    // Función para ocultar el mensaje después de 3 segundos
    function hideMessage(messageElement) {
        setTimeout(() => {
            messageElement.classList.add('hidden');
        }, 3000);
    }

    // Aplica la función de ocultar a cada mensaje
    mensajes.forEach(mensaje => {
        hideMessage(mensaje);
    });
});
</script>

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MODIFICAR_CICLO">
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
   
    <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-default u-text-1">modificar el&nbsp; ciclo escolar</h1>
        <h1 class="u-custom-font u-text u-text-default u-text-2">Borra el&nbsp; ciclo escolar</h1>
        <div class="u-form u-form-1">
        
<form method="post" action="">
    <input type="hidden" name="accion" value="eliminar_ciclo">
    <div>
        <label for="ciclo_id">Ciclo Escolar:</label>
        <select id="ciclo_id" name="ciclo_id" required>
            <?php print_options($result_ciclos1); ?>
        </select>
    </div>
    <div>
        <button type="submit">Eliminar</button>
    </div>
    
</form>
        </div>
        <div class="u-form u-form-2">
       
<form method="post" action="">
    <input type="hidden" name="accion" value="actualizar_ciclo">
    <div>
        <label for="ciclo_id">Ciclo Escolar:</label>
        <select id="ciclo_id" name="ciclo_id" required>
            <?php print_options($result_ciclos); ?>
        </select>
    </div>
    <div>
        <label for="nombre">Nuevo Nombre del Ciclo Escolar:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <button type="submit">Actualizar</button>
        <?php if (isset($mensaje_ciclo)) echo "<p>$mensaje_ciclo</p>"; ?>
    
      </div>
   
</form>
        </div>
      </div>
      
    </section>



    <section class="u-clearfix u-custom-color-6 u-section-2" id="sec-7ed4">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-1">&nbsp;modificar semestres&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Borrar semestre</h1>
        <div class="u-form u-form-1">
      

<form method="post" action="">
    <input type="hidden" name="accion" value="eliminar_semestre">
    <div>
        <label for="semestre_id">Semestre:</label>
        <select id="semestre_id" name="semestre_id" required>
            <?php print_options($result_semestres1); ?>
        </select>
    </div>
    <div>
        <button type="submit">Eliminar</button>
    </div>
   <?php if (isset($mensaje_semestre)) echo "<p>$mensaje_semestre</p>"; ?>
</form>
        </div>
        <div class="u-form u-form-2">
        <form method="post" action="">
    <input type="hidden" name="accion" value="actualizar_semestre">
    <div>
        <label for="semestre_id">Semestre:</label>
        <select id="semestre_id" name="semestre_id" required>
            <?php print_options($result_semestres); ?>
        </select>
    </div>
    <div>
        <label for="nombre">Nuevo Nombre del Semestre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <button type="submit">Actualizar</button>
    </div>
   
</form>
        </div>
      </div>
      
    </section>


    <section class="u-clearfix u-custom-color-8 u-section-3" id="sec-9ada">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-1">&nbsp;modificar asignturas&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Borrar Asignaturas</h1>
        <div class="u-form u-form-1">
        <form method="post" action="">
    <input type="hidden" name="accion" value="eliminar_asignatura">
    <div>
        <label for="asignatura_id">Asignatura:</label>
        <select id="asignatura_id" name="asignatura_id" required>
            <?php print_options($result_asignaturas1); ?>
        </select>
    </div>
    <div>
        <button type="submit">Eliminar</button>
    </div>
  
</form>
        </div>
        <div class="u-form u-form-2">
        <form method="post" action="">
    <input type="hidden" name="accion" value="actualizar_asignatura">
    <div>
        <label for="asignatura_id">Asignatura:</label>
        <select id="asignatura_id" name="asignatura_id" required>
            <?php print_options($result_asignaturas); ?>
        </select>
    </div>
    <div>
        <label for="nombre_asignatura">Nuevo Nombre de la Asignatura:</label>
        <input type="text" id="nombre_asignatura" name="nombre_asignatura" required>
    </div>
    <div>
        <button  type="submit">Actualizar</button>
      
    </div>

</form>
        </div>
        <a href="Registro_ciclo.php" class="u-btn u-button-style u-hover-palette-3-base u-none u-btn-3"><span class="u-file-icon u-icon u-icon-1"><img src="../images/1176383.png" alt=""></span>
       
        </a>
        

<script>
   



    // Añade un evento click al botón para actualizar manualmente la página
    document.getElementById('refreshButton').addEventListener('click', function() {
        location.reload(); // Esto recargará la página
    });
</script>
      </div>
     

    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
   
  
</body></html>