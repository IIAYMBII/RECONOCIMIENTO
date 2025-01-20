

<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Colegio de Estudios Científicos y Tecnológicos del Estado de México​_______________________________________________​Sistema de Control Escolar WEB, REGISTRO DE ALUMNOS​">
    <meta name="description" content="">
    <title>Registro_Alumnos</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="REGISTRO_DATOS.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.15.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700">
    <style>
      /* =================== Estilos Generales =================== */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

form {
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h3 {
    margin-bottom: 15px;
    font-size: 1.5em;
    color: #333;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
input[type="file"],
input[type="number"],
input[type="time"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

input[type="file"] {
    padding: 5px;
}

button {
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

/* =================== Estilos para el Contenedor del Formulario =================== */
.form-container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 1000px;
    margin-left: 0px;
    box-sizing: border-box;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px); /* Compatibilidad con Safari */
    border: 1px solid rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input, 
.form-group select, 
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-group input[type="file"] {
    padding: 0;
}

.form-group input[type="submit"] {
    background-color: #4C7045;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
}

.form-group input[type="submit"]:hover {
    background-color: #089643;
}

.form-group img {
    max-width: 200px;
    height: auto;
    display: block;
    margin-top: 10px;
}

/* =================== Estilos para Pasos del Formulario =================== */
.form-steps {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-steps.active {
    display: block;
}

.form-steps {
    display: none;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.navigation-buttons {
    text-align: center;
    margin-top: 20px;
}

.navigation-buttons button {
    background-color: #089643;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 4px;
    margin: 0 10px;
}

/* =================== Estilos para Notificaciones =================== */
.notification {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    display: none;
    z-index: 1000;
    transition: opacity 0.5s ease;
}

.notification.error {
    background-color: #f44336;
}

.notification.show {
    display: block;
    opacity: 1;
}

.notification.hide {
    opacity: 0;
    display: none;
}

/* =================== Media Queries =================== */
/* Estilos para pantallas menores de 600px */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }

    h3 {
        font-size: 1.2em;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="file"],
    input[type="number"],
    input[type="time"],
    textarea {
        font-size: 0.9em;
    }

    button {
        width: 100%;
        padding: 12px;
    }
}

/* Estilos para pantallas mayores de 600px */
@media (min-width: 601px) {
    .container {
        padding: 20px;
    }
    
    .header {
        font-size: 24px;
    }
}

    </style>
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "../images/151852.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registro_Alumnos">
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
    <section class="u-clearfix u-image u-section-1" id="sec-a9cd" data-image-width="1920" data-image-height="1047">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-custom-color-1 u-text-1">Registrio de informacion personal</h2>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="../images/8339965.png" alt="" data-image-width="128" data-image-height="128">
        <div class="u-carousel u-carousel-duration-250 u-carousel-fade u-form u-form-1" data-interval="0" data-u-ride="false" id="carousel-79ec">
        
                    

                    <form id="multiStepForm" action="guardar.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


                     <!-- IDENTIFICACION  -->
                        <div class="form-steps active" id="step1">
                       
                            <h3>Identificación</h3>
                            <label for="numero_control">Número de Control:</label>
                            <input type="text" id="numero_control" name="numero_control" required><br><br>

                            <label for="especialidad">Especialidad:</label>
                            <input type="text" id="especialidad" name="especialidad" required><br><br>

                            <label for="foto">Foto:</label>
                            <input type="file" id="foto" name="foto" accept="image/*" required><br><br>


                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" required><br><br>
                     
                        </div>

                         <!-- IDENTIFICACION ALUMNO -->
                        <div class="form-steps" id="step2">
                        <h3>Datos del Alumno</h3>
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

                            <label for="sexo">Sexo:</label>
                            <input type="text" id="sexo" name="sexo" required><br><br>

                            <label for="lugar_de_nacimiento">Lugar de Nacimiento:</label>
                            <input type="text" id="lugar_de_nacimiento" name="lugar_de_nacimiento" required><br><br>

                            <label for="domicilio">Domicilio:</label>
                            <input type="text" id="domicilio" name="domicilio" required><br><br>

                            <label for="calle">Calle:</label>
                            <input type="text" id="calle" name="calle" required><br><br>

                            <label for="numero">Número:</label>
                            <input type="text" id="numero" name="numero" required><br><br>

                            <label for="colonia">Colonia:</label>
                            <input type="text" id="colonia" name="colonia" required><br><br>

                            <label for="municipio">Municipio:</label>
                            <input type="text" id="municipio" name="municipio" required><br><br>

                            <label for="estado">Estado:</label>
                            <input type="text" id="estado" name="estado" required><br><br>

                            <label for="telefono_movil">Teléfono Móvil:</label>
                            <input type="tel" id="telefono_movil" name="telefono_movil" required><br><br>

                            <label for="telefono_casa">Teléfono de Casa:</label>
                            <input type="tel" id="telefono_casa" name="telefono_casa"><br><br>

                            <label for="correo_personal">Correo Electrónico Personal:</label>
                            <input type="email" id="correo_personal" name="correo_personal" required><br><br>

                            <label for="facebook">Facebook:</label>
                            <input type="text" id="facebook" name="facebook"><br><br>
                        </div>

                        <!-- II SALUD -->
                        <div class="form-steps" id="step3">
                            <h3>Salud</h3>
                            <label for="servicio_medico">Servicio Médico:</label>
                            <input type="text" id="servicio_medico" name="servicio_medico" required><br><br>

                            <label for="numero_afiliacion">Número de Afiliación:</label>
                            <input type="text" id="numero_afiliacion" name="numero_afiliacion"><br><br>

                            <label for="grupo_sanguinio">Grupo Sanguíneo:</label>
                            <input type="text" id="grupo_sanguinio" name="grupo_sanguinio" required><br><br>

                            <label for="eres_alergico">¿Eres alérgico?</label>
                            <input type="text" id="eres_alergico" name="eres_alergico"><br><br>

                            <label for="problema_salud">¿Tienes algún problema de salud?</label>
                            <input type="text" id="problema_salud" name="problema_salud"><br><br>

                            <label for="descripcion_salud">Descripción del Problema de Salud:</label>
                            <textarea id="descripcion_salud" name="descripcion_salud" rows="4"></textarea><br><br>

                            <label for="medicamentos_ingeres">Medicamentos que Ingeres:</label>
                            <textarea id="medicamentos_ingeres" name="medicamentos_ingeres" rows="4"></textarea><br><br>

                            <label for="tratamineto_medico">¿Estás bajo algún tratamiento médico?</label>
                            <input type="text" id="tratamineto_medico" name="tratamineto_medico"><br><br>

                            <label for="descripcion_medico">Descripción del Tratamiento Médico:</label>
                            <textarea id="descripcion_medico" name="descripcion_medico" rows="4"></textarea><br><br>
                        </div>
                        
                        </div>
                         <!-- III FAMILIA -->
                        <div class="form-steps" id="step4">
                        <h3>Familia</h3>
                            <label for="estado_civil_padres">Estado Civil de los Padres:</label>
                            <input type="text" id="estado_civil_padres" name="estado_civil_padres" required><br><br>

                            <label for="p_nombre_padre">Nombre del Padre:</label>
                            <input type="text" id="p_nombre_padre" name="p_nombre_padre"><br><br>

                            <label for="p_vive">¿El Padre Vive?</label>
                            <input type="text" id="p_vive" name="p_vive"><br><br>

                            <label for="p_edad">Edad del Padre:</label>
                            <input type="text" id="p_edad" name="p_edad"><br><br>

                            <label for="p_estudios">Grado de Estudios del Padre:</label>
                            <input type="text" id="p_estudios" name="p_estudios"><br><br>

                            <label for="P_ocupacion">Ocupación del Padre:</label>
                            <input type="text" id="P_ocupacion" name="P_ocupacion"><br><br>

                            <label for="p_domicilio">Domicilio del Padre:</label>
                            <input type="text" id="p_domicilio" name="p_domicilio"><br><br>

                            <label for="p_celular">Celular del Padre:</label>
                            <input type="tel" id="p_celular" name="p_celular"><br><br>

                            <label for="p_trabaja_en">Lugar de Trabajo del Padre:</label>
                            <input type="text" id="p_trabaja_en" name="p_trabaja_en"><br><br>

                            <label for="p_numero_trabajo">Teléfono de Trabajo del Padre:</label>
                            <input type="tel" id="p_numero_trabajo" name="p_numero_trabajo"><br><br>

                            <label for="m_nombre_madre">Nombre de la Madre:</label>
                            <input type="text" id="m_nombre_madre" name="m_nombre_madre"><br><br>

                            <label for="m_vive">¿La Madre Vive?</label>
                            <input type="text" id="m_vive" name="m_vive"><br><br>

                            <label for="m_edad">Edad de la Madre:</label>
                            <input type="text" id="m_edad" name="m_edad"><br><br>

                            <label for="m_estudios">Grado de Estudios de la Madre:</label>
                            <input type="text" id="m_estudios" name="m_estudios"><br><br>

                            <label for="m_ocupacion">Ocupación de la Madre:</label>
                            <input type="text" id="m_ocupacion" name="m_ocupacion"><br><br>

                            <label for="m_domicilio">Domicilio de la Madre:</label>
                            <input type="text" id="m_domicilio" name="m_domicilio"><br><br>

                            <label for="m_celular">Celular de la Madre:</label>
                            <input type="tel" id="m_celular" name="m_celular"><br><br>

                            <label for="m_trabaja_en">Lugar de Trabajo de la Madre:</label>
                            <input type="text" id="m_trabaja_en" name="m_trabaja_en"><br><br>

                            <label for="m_numero_trabajo">Teléfono de Trabajo de la Madre:</label>
                            <input type="tel" id="m_numero_trabajo" name="m_numero_trabajo"><br><br>

                            <label for="persona_problema">Persona a la que acudo cuando se me presenta un problema:</label>
                            <input type="teXT" id="persona_problema" name="persona_problema"><br><br>

                            



                        </div>
                            <div class="form-steps" id="step5">
                            <label for="relacion_tus_padres">¿Cómo es la relación de tus padres?</label>
                            <textarea id="relacion_tus_padres" name="relacion_tus_padres" rows="4"></textarea>

                            <label for="relacion_llevas_padres">¿Qué relación llevas con tus padres?</label>
                            <textarea id="relacion_llevas_padres" name="relacion_llevas_padres" rows="4"></textarea>

                            <label for="relacion_hermanos">¿Cómo es tu relación con tu(s) hermano(s)?</label>
                            <textarea id="relacion_hermanos" name="relacion_hermanos" rows="4"></textarea>

                            <label for="ingreso_familiar_mes">Ingreso familiar aproximado al mes:</label>
                            <input type="number" id="ingreso_familiar_mes" name="ingreso_familiar_mes">

                            <label for="gasto_familiar_mes">Gasto familiar aproximado al mes:</label>
                            <input type="number" id="gasto_familiar_mes" name="gasto_familiar_mes">

                            <label for="casa_propia">¿Cuentan con casa propia?</label>
                            <textarea id="casa_propia" name="casa_propia" rows="4"></textarea>
                                                     
                            <label for="vehiculo">¿Cuentan con vehiculo?</label>
                            <textarea id="vehiculo" name="vehiculo" rows="4"></textarea>
                           

                        </div>

                         <!-- IV FAMILIA -->
                        <div class="form-steps" id="step6">
                        <h3>Gastos e Intereses</h3>
                            <label for="tiempo_libre">¿Qué haces en tu tiempo libre?</label>
                            <textarea id="tiempo_libre" name="tiempo_libre" rows="4"></textarea><br><br>

                            <label for="practicas_deporte">¿Practicas algún deporte?</label>
                            <input type="text" id="practicas_deporte" name="practicas_deporte"><br><br>

                            <label for="descripcion_deporte">Descripción del Deporte que Practicas:</label>
                            <textarea id="descripcion_deporte" name="descripcion_deporte" rows="4"></textarea><br><br>

                            <label for="donde_practica">¿Dónde lo Practicas?</label>
                            <input type="text" id="donde_practica" name="donde_practica"><br><br>

                            <label for="organizacion_equipo">¿Perteneces a alguna organización o equipo?</label>
                            <input type="text" id="organizacion_equipo" name="organizacion_equipo"><br><br>

                            <label for="descripcion_equipo">Descripción del Equipo u Organización:</label>
                            <textarea id="descripcion_equipo" name="descripcion_equipo" rows="4"></textarea><br><br>

                            <label for="leer">¿Te gusta leer?</label>
                            <textarea id="leer" name="leer" rows="4"></textarea><br><br>

                            <label for="tipo_lecturas">Tipo de Lecturas que Prefieres:</label>
                            <textarea id="tipo_lecturas" name="tipo_lecturas" rows="4"></textarea><br><br>

                            <label for="libros_leidos">¿Qué libros has leído?</label>
                            <textarea id="libros_leidos" name="libros_leidos" rows="4"></textarea><br><br>

                            <label for="leyendo_libros">¿Qué libro estás leyendo actualmente?</label>
                            <textarea id="leyendo_libros" name="leyendo_libros" rows="4"></textarea><br><br>

                            <label for="agrada_hacer">¿Qué te agrada hacer?</label>
                            <textarea id="agrada_hacer" name="agrada_hacer" rows="4"></textarea><br><br>

                            <label for="disgusta_molestia">¿Qué te disgusta o te molesta?</label>
                            <textarea id="disgusta_molestia" name="disgusta_molestia" rows="4"></textarea><br><br>

                            <label for="tipo_peliculas">Tipo de Películas que Prefieres:</label>
                            <textarea id="tipo_peliculas" name="tipo_peliculas" rows="4"></textarea><br><br>

                            <label for="nombre_pelicula">¿Cómo se llama tu película favorita?</label>
                            <textarea id="nombre_pelicula" name="nombre_pelicula" rows="4"></textarea><br><br>

                            <label for="amigos">¿Tienes amigos?</label>
                            <input type="text" id="amigos" name="amigos"><br><br>

                            <label for="cuantos_amigos">¿Cuántos amigos tienes?</label>
                            <input type="text" id="cuantos_amigos" name="cuantos_amigos"><br><br>

                            <label for="reunion_amigos">¿Dónde se reúnen?</label>
                            <input type="text" id="reunion_amigos" name="reunion_amigos"><br><br>
                            
                        </div>
                        <!-- Paso  -->
                        <div class="form-steps" id="step4">
                        <h3>Situación Económica</h3>
                            <label for="quien_aporta">¿Quién aporta el sustento económico?</label>
                            <input type="text" id="quien_aporta" name="quien_aporta"><br><br>

                            <label for="apoyo_estudios">¿Recibes algún tipo de apoyo para tus estudios?</label>
                            <input type="text" id="apoyo_estudios" name="apoyo_estudios"><br><br>

                            <label for="trabajas">¿Trabajas actualmente?</label>
                            <input type="text" id="trabajas" name="trabajas"><br><br>

                            <label for="enque_trabajas">¿En qué trabajas?</label>
                            <input type="text" id="enque_trabajas" name="enque_trabajas"><br><br>

                            <label for="dias_trabajadas">¿Cuántos días a la semana trabajas?</label>
                            <input type="text" id="dias_trabajadas" name="dias_trabajadas"><br><br>

                            <label for="horario_entrada">Horario de Entrada:</label>
                            <input type="time" id="horario_entrada" name="horario_entrada"><br><br>

                            <label for="horario_salida">Horario de Salida:</label>
                            <input type="time" id="horario_salida" name="horario_salida"><br><br>

                            <label for="actividades">Actividades que realizas en el trabajo:</label>
                            <input type="text" id="actividades" name="actividades"><br><br>

                            <label for="tel_trabajo">Teléfono del Trabajo:</label>
                            <input type="tel" id="tel_trabajo" name="tel_trabajo"><br><br>

                            <label for="nombre_jefe">Nombre del Jefe:</label>
                            <input type="text" id="nombre_jefe" name="nombre_jefe"><br><br>
                            
                        </div>
                        <div class="form-steps" id="step5">
                        <h3>Trayectoria Académica</h3>
                            <label for="meta_vida">Meta en la Vida:</label>
                            <input type="text" id="meta_vida" name="meta_vida"><br><br>

                            <label for="piensas_lograrlo">¿Cómo piensas lograrlo?</label>
                            <input type="text" id="piensas_lograrlo" name="piensas_lograrlo"><br><br>

                            <label for="decision_cecytem">¿Por qué decidiste estudiar en el Cecytem?</label>
                            <input type="text" id="decision_cecytem" name="decision_cecytem"><br><br>

                            <label for="carrera_gusta">¿Qué carrera te gusta?</label>
                            <input type="text" id="carrera_gusta" name="carrera_gusta"><br><br>

                            <label for="porque">¿Por qué?</label>
                            <textarea id="porque" name="porque" rows="4"></textarea><br><br>

                            <label for="meta_cecytem">¿Cuál es tu meta en el Cecytem?</label>
                            <input type="text" id="meta_cecytem" name="meta_cecytem"><br><br>

                            <label for="lograrlo">¿Cómo piensas lograrlo?</label>
                            <textarea id="lograrlo" name="lograrlo" rows="4"></textarea><br><br>

                            <label for="expectativas_colegio">¿Cuáles son tus expectativas del colegio?</label>
                            <textarea id="expectativas_colegio" name="expectativas_colegio" rows="4"></textarea><br><br>
                            <label>Al terminar tu bachillerato tecnológico:</label>
        
                            <label>¿Piensas continuar tus estudios superiores?</label>
                            <input type="text" id="continuar_estudios" name="continuar_estudios">

                            <label>¿Por qué?</label>
                            <textarea id="porque_estudios" name="porque_estudios" rows="4"></textarea>

                            <label>¿Qué carrera o licenciatura piensas estudiar a futuro?</label>
                            <input type="text" id="estudiar_futuro" name="estudiar_futuro">

                            <label>¿A qué te piensas dedicar si decides no continuar con tus estudios superiores al concluir tu bachillerato tecnológico?</label>
                            <textarea id="pensar_no_estudiar" name="pensar_no_estudiar" rows="4"></textarea>
                        
                            
                        </div>
                        <div class="form-steps" id="step6">
                        <label>VII.- UBICACIÓN DE TU DOMICILIO</label>

                            <label>Tiempo de traslado de tu casa al colegio CECyTEM:</label>
                            <input type="text" id="traslado_casa_cecytem" name="traslado_casa_cecytem">

                            <label>¿Tomarás transporte público para llegar al colegio?</label>
                            <input type="text" id="tomar_transporte" name="tomar_transporte">
                            <label>¿Cuántos transportes tomarás para llegar al colegio desde tu casa?</label>
                            <input type="text" id="cuantos_transportes" name="cuantos_transportes">

                            <label for="mapa">Toma captura de la ubicacion de tu casa </label>
                            <a href="https://maps.google.com/"> ingresa google maps para realizarloS</a>
                            <input type="file" id="mapa" name="mapa" accept="image/*" required><br><br>

                            <input type="submit" value="Enviar">
                        </div>
                        <!-- Botones de Navegación -->
                        <div class="navigation-buttons">
                            <button type="button" id="prevBtn" onclick="changeStep(-1)">Anterior</button>
                            <button type="button" id="nextBtn" onclick="changeStep(1)">Siguiente</button>
                        </div>
                    </form>
              
                  
            

                                    <script>
                                        let currentStep = 0;
                                        showStep(currentStep);

                                        function showStep(step) {
                                            const steps = document.querySelectorAll('.form-steps');
                                            steps.forEach((s, index) => {
                                                s.style.display = (index === step) ? 'block' : 'none';
                                            });
                                            document.getElementById('prevBtn').style.display = (step === 0) ? 'none' : 'inline-block';
                                            document.getElementById('nextBtn').style.display = (step === steps.length - 1) ? 'none' : 'inline-block';
                                        }

                                        function changeStep(n) {
                                            const steps = document.querySelectorAll('.form-steps');
                                            if (n === 1 && !validateForm()) return false; // Validar antes de avanzar
                                            currentStep += n;
                                            if (currentStep >= steps.length) currentStep = steps.length - 1;
                                            if (currentStep < 0) currentStep = 0;
                                            showStep(currentStep);
                                        }

                                        function validateForm() {
                                            const currentStepElement = document.querySelectorAll('.form-steps')[currentStep];
                                            const inputs = currentStepElement.querySelectorAll('input, select, textarea');
                                            let valid = true;
                                            inputs.forEach(input => {
                                                if (input.required && !input.value) {
                                                    input.style.border = '2px solid red';
                                                    valid = false;
                                                } else {
                                                    input.style.border = '';
                                                }
                                            });
                                            return valid;
                                        }
                                    </script>
                                    <div id="notification" class="notification"></div>

                                <script>
                                    function showNotification(message, isError) {
                                        const notification = document.getElementById('notification');
                                        notification.textContent = message;
                                        notification.classList.add('show');
                                        if (isError) {
                                            notification.classList.add('error');
                                        }
                                        setTimeout(() => {
                                            notification.classList.add('hide');
                                            setTimeout(() => {
                                                notification.classList.remove('show', 'hide', 'error');
                                            }, 500); // Tiempo para completar la transición de ocultar
                                        }, 5000); // Mostrar durante 5 segundos
                                    }

                                    const urlParams = new URLSearchParams(window.location.search);
                                    const statusMessage = urlParams.get('status');
                                    const statusType = urlParams.get('type');
                                    if (statusMessage) {
                                        showNotification(statusMessage, statusType === 'error');
                                    }
                                </script>

                 </div>
                        </div>
                        </section>
                        <section>
                        <a href="../ADMINISTRACION.php" class="u-btn u-button-style u-hover-custom-color-4 u-none u-btn-4"><span class="u-file-icon u-icon u-icon-1"><img src="../images/2544087.png" alt=""></span>&nbsp;​​ADMINISTRACION
                            </a>

                        </section>
                <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1c58"><div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">CECyTEM -- Unidad de Informática -- Área de Sistemas de la Información </p>
      </div></footer>
    
  
</body></html>