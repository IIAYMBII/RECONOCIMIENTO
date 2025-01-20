<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Registro_Grupos</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Registro_Grupos.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    
    <style>
     
/* Contenedor de la tabla */
.table-container {
width: 80%;
margin: 20px auto;
padding: 10px;
border-radius: 10px;
box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
background: #f9f9f9;
}

/* Estilos para la tabla */
table {
width: 100%;
border-collapse: collapse;
}

th, td {
padding: 10px;
text-align: left;
}

th {
background-color: #25118b;
color: white;
border: 1px solid #ddd;
}

td {
background-color: #ffffff;
border: 1px solid #ddd;
}

input[type="text"], textarea {
width: 100%;
padding: 8px;
border: 1px solid #ccc;
border-radius: 5px;
box-sizing: border-box;
}

textarea {
height: 100px;
resize: vertical;
}

/* Estilos para botones */
button {
background-color: #0b156e;
color: white;
border: none;
padding: 10px 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
border-radius: 5px;
cursor: pointer;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
transition: background-color 0.3s, box-shadow 0.3s;
}

button:hover {
background-color: #6260a999;
box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}
bu::hover {
background-color: #9e97d4;
box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

button:focus {
outline: none;
}

/* Estilos para la tabla con enfoque en la celda activa */
td:focus-within {
box-shadow: 0 0 10px rgba(0, 150, 255, 0.5);
border: 1px solid #0099ff;
}

input:focus, textarea:focus {
outline: none;
box-shadow: 0 0 5px rgba(0, 150, 255, 0.5);
border: 1px solid #0099ff;
}
/* Estilo para el textarea */
#numero_control,#ciclo_escolar_nombre,#observaciones,#grupo,#semestre_nombre,#alumno_nombre{
     color: black; /* Color del texto */
     font-family: Arial, sans-serif; /* Fuente del texto */
     font-size: 16px; /* Tamaño de la fuente */
     width: 100%; /* Ancho del textarea */
     height: 60px; /* Alto del textarea */
     padding: 10px; /* Espaciado interno */
     border: 1px solid #ccc; /* Borde del textarea */
     box-sizing: border-box; /* Incluye padding y border en el ancho total */
 }
 .toast {
     visibility: hidden;
     position: fixed;
     bottom: 30px;
     left: 50%;
     transform: translateX(-50%);
     background-color: #ff0c0c;
     color: #fff;
     padding: 10px;
     border-radius: 5px;
     z-index: 1000;
 }
 .toast.show {
     visibility: visible;
     opacity: 0;
     animation: fadein 1s, fadeout 1s 4s;
 }
 @keyframes fadein {
     from { opacity: 0; }
     to { opacity: 1; }
 }
 @keyframes fadeout {
     from { opacity: 1; }
     to { opacity: 0; }
 }
    </style>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registro_Grupos">
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
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-6d84" data-image-width="1920" data-image-height="1047">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1">Registro de Alumnos por Grupos</h2>
        <div class="u-form u-form-1">
          <form id="registro-formulario" method="post" action="guardar_registro.php">
            <div class="table-container">
                <table>
                    <tr>  <div id="toast" class="toast"></div>
                        <th><label for="numero_control">Número de Control:</label></th>
                        <td>
                            <input type="text" id="numero_control" name="numero_control" required>
                            <button type="button" onclick="buscarDatos();">Buscar Alumno</button>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="alumno_nombre">Nombre del Alumno:</label></th>
                        <td><input type="text" id="alumno_nombre" name="alumno_nombre" readonly></td>
                    </tr>
                    <tr>
                        <th><label for="semestre_nombre">Semestre:</label></th>
                        <td><input type="text" id="semestre_nombre" name="semestre_nombre" readonly></td>
                    </tr>
                    <tr>
                        <th><label for="grupo">Grupo:</label></th>
                        <td><input type="text" id="grupo" name="grupo" readonly></td>
                    </tr>
                    <tr>
                        <th><label for="ciclo_escolar_nombre">Ciclo Escolar:</label></th>
                        <td><input type="text" id="ciclo_escolar_nombre" name="ciclo_escolar_nombre" readonly></td>
                    </tr>
                    <tr>
                        <th><label for="observaciones">Observaciones y Comportamientos:</label></th>
                        <td><textarea id="observaciones" name="observaciones"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit">Guardar</button>
                        </td>
                    </tr>
                </table>
               
            </div>
            
        </form>
        
        <script>
          function mostrarMensaje(mensaje) {
              const toast = document.getElementById('toast');
              toast.textContent = mensaje;
              toast.className = 'toast show';
              setTimeout(() => { toast.className = 'toast'; }, 3000); // Ocultar después de 3 segundos
          }
  
          function buscarDatos() {
              var numero_control = document.getElementById("numero_control").value;
  
              if (numero_control) {
                  var xhr = new XMLHttpRequest();
                  xhr.open("POST", "buscar_datos.php", true);
                  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                          var datos = JSON.parse(this.responseText);
  
                          if (datos.error) {
                              mostrarMensaje(datos.error);
                          } else {
                              document.getElementById("alumno_nombre").value = datos.alumno_nombre;
                              document.getElementById("semestre_nombre").value = datos.semestre_nombre;
                              document.getElementById("grupo").value = datos.grupo;
                              document.getElementById("ciclo_escolar_nombre").value = datos.ciclo_escolar_nombre;
                          }
                      }
                  };
                  xhr.send("numero_control=" + numero_control);
              } else {
                  alert("Por favor, ingrese un número de control.");
              }
          }
      </script>
        </div>
        <a href="../SALONES/listar_registros.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-btn-3"><span class="u-file-icon u-icon u-icon-1"><img src="../images/5065208.png" alt=""></span>&nbsp;MOSTRAR LISTA
        </a>
        <a href="../ADMINISTRACION.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-btn-3"><span class="u-file-icon u-icon u-icon-1"><img src="../images/2544087.png" alt=""></span>&nbsp;​​ADMINISTRACION
        </a>
      </div>
    </section>
    
   
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">TESJo -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>