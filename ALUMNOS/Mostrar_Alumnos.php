<?php include 'conexion.php'; ?>
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
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, REGISTRO DE ALUMNOS​">
    <meta name="description" content="">
    <title>Mostrar_Alumnos</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Mostrar_Alumnos.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Mostrar_Alumnos">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <style>
        /* Estilo para el modal de imagen */
        html, body {
            width: 110%;
            height: 110%;
            overflow: auto; /* Permite desplazamiento si el contenido es grande */
            margin: 0;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            background: #fff;
            border-radius: 8px;
            text-align: center;
        }
        .modal-content img {
            max-width: 100%;
            height: auto;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .table-container {
            width: 50%;
            overflow-x: auto; /* Desplazamiento horizontal */
        }
        .sky-blue-button {
  background-color: #87CEEB; /* Azul cielo */
  color: white; /* Texto en blanco */
  border: none; /* Sin borde */
  padding: 10px 20px; /* Espaciado interno */
  border-radius: 5px; /* Bordes redondeados */
  cursor: pointer; /* Cambia el cursor a una mano */
  font-size: 16px; /* Tamaño de letra */
  transition: background-color 0.3s ease; /* Animación suave al interactuar */
}

.sky-blue-button:hover {
  background-color: #00BFFF; /* Azul más intenso al pasar el mouse */
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
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-b734" data-image-width="1920" data-image-height="1047">
      <h2 class="u-text u-text-default u-text-1">Alumnos Registrados</h2>
      <a href="Registro_Alumnos.php">Añadir Nuevo Alumno</a>
      <div class="custom-expanded u-table u-table-responsive u-table-1 table-container">
        <table>
        <colgroup>
            <col width="7.1%">
            <col width="7.1%">
            <col width="8%">
            <col width="6.2%">
            <col width="7.1%">
            <col width="7.3%">
            <col width="7.1%">
            <col width="7.5%">
            <col width="7.1%">
            <col width="6.3%">
            <col width="8%">
            <col width="7.5%">
            <col width="6.7%">
            <col width="6.200000000000003%">
          </colgroup>
          <thead class="u-palette-4-base u-table-header u-table-header-1">
            <tr style="height: 72px;">
             
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Nombre</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Apellidos</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">CURP</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Fecha de Nacimiento</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Teléfono</th>
                  
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">País</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Estado</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Municipio</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Localidad</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Colonia</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Número de Control</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Correo Electrónico</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Fotografía</th>
                    <th class="u-border-1 u-border-palette-4-base u-table-cell">Acciones</th>
                
                  
            </tr>
        
            <tbody>
                <?php
                $sql = "SELECT id, nombre, apellidos, curp, fecha_nacimiento, telefono, domicilio, pais, estado, municipio, localidad, colonia, numero_control, correo, fotografia FROM alumnos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                     
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["curp"] . "</td>";
                        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                   
                        echo "<td>" . $row["pais"] . "</td>";
                        echo "<td>" . $row["estado"] . "</td>";
                        echo "<td>" . $row["municipio"] . "</td>";
                        echo "<td>" . $row["localidad"] . "</td>";
                        echo "<td>" . $row["colonia"] . "</td>";
                        echo "<td>" . $row["numero_control"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>";
                        if ($row["fotografia"]) {
                            echo "<button class='sky-blue-button' onclick='openModal(\"uploads/" . $row["fotografia"] . "\")'>Ver Fotografía</button>";
                        } else {
                            echo "No disponible";
                        }
                        echo "</td>";
                        echo "<td>
                            <a href='Editar_Alumno.php?id=" . $row["id"] . "'>Editar</a> |
                            <a href='eliminar.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\")'>Eliminar</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No hay registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="Registro_Alumnos.php" class="u-btn u-btn-round u-button-style u-custom-color-3 u-hover-custom-color-2 u-radius u-btn-1">
            <span class="u-file-icon u-icon u-icon-1"><img src="../images/1176383.png" alt=""></span>&nbsp;Salir
        </a>
      
    </section>

    <!-- Modal for image preview -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Fotografía">
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // Close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('imageModal')) {
                closeModal();
            }
        }
    </script>
       <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
</body>
</html>