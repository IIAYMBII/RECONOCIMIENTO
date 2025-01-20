<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_escolar";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Función para verificar si el número de control ya existe
function numeroControlDuplicado($conn, $numero_control) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM datos_alumno WHERE numero_control = ?");
    $stmt->bind_param("s", $numero_control);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0; // Retorna true si existe, false si no
}

// Obtener el número de control del formulario
$numero_control = $_POST['numero_control'];

// Verificar si el número de control ya existe
if (numeroControlDuplicado($conn, $numero_control)) {
    // Redirigir a la página de error
    header("Location: pagina_error.php"); // Cambia esto por la ruta de tu página de error
    exit(); // Asegúrate de llamar a exit() después de header()
}

// Manejar la subida de la foto
$foto = $_FILES['foto']['name'];
$mapa = $_FILES['mapa']['name'];
$target_dir = "uploads/"; // Asegúrate de que esta carpeta tenga permisos de escritura
$target_file = $target_dir . basename($mapa);
move_uploaded_file($_FILES['mapa']['tmp_name'], $target_file);
$target_file = $target_dir . basename($foto);
move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
// Preparar la declaración SQL
$stmt = $conn->prepare("INSERT INTO datos_alumno (
    numero_control,
    especialidad, 
    foto, 
    fecha, 
    nombre_completo, 
    fecha_nacimiento, 
    sexo, 
    lugar_de_nacimiento, 
    domicilio, 
    calle,  
    numero, 
    colonia, 
    municipio, 
    estado, 
    telefono_movil, 
    telefono_casa, 
    correo_personal, 
    facebook, 
    servicio_medico, 
    numero_afiliacion, 
    grupo_sanguinio, 
    eres_alergico, 
    problema_salud, 
    descripcion_salud, 
    medicamentos_ingeres, 
    tratamineto_medico, 
    descripcion_medico, 
    estado_civil_padres, 
    p_nombre_padre,  
    p_vive, 
    p_edad, 
    p_estudios, 
    p_ocupacion, 
    p_domicilio, 
    p_celular, 
    p_trabaja_en, 
    p_numero_trabajo, 
    m_nombre_madre, 
    m_vive,  
    m_edad, 
    m_estudios, 
    m_ocupacion, 
    m_domicilio, 
    m_celular, 
    m_trabaja_en, 
    m_numero_trabajo, 
    persona_problema, 
    relacion_tus_padres,
    relacion_llevas_padres,
    relacion_hermanos,
    ingreso_familiar_mes, 
    gasto_familiar_mes,  
    casa_propia, 
    vehiculo, 
    tiempo_libre, 
    practicas_deporte, 
    descripcion_deporte, 
    donde_practica, 
    organizacion_equipo, 
    descripcion_equipo, 
    leer, 
    tipo_lecturas,  
    libros_leidos, 
    leyendo_libros, 
    agrada_hacer, 
    disgusta_molestia, 
    tipo_peliculas, 
    nombre_pelicula, 
    amigos, 
    cuantos_amigos, 
    reunion_amigos, 
    quien_aporta,  
    apoyo_estudios, 
    trabajas, 
    enque_trabajas, 
    dias_trabajadas, 
    horario_entrada, 
    horario_salida, 
    actividades, 
    tel_trabajo, 
    nombre_jefe, 
    meta_vida,  
    piensas_lograrlo, 
    decision_cecytem, 
    carrera_gusta, 
    porque, 
    meta_cecytem, 
    lograrlo, 
    expectativas_colegio, 
    continuar_estudios, 
    porque_estudios, 
    estudiar_futuro,  
    pensar_no_estudiar, 
    traslado_casa_cecytem, 
    tomar_transporte, 
    cuantos_transportes, 
    mapa  
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?, ?, ?
)");

// Asegúrate de que el número de parámetros en bind_param coincida con el número de columnas
$stmt->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
    $_POST['numero_control'],
    $_POST['especialidad'],
    $foto, // Asegúrate de que este campo esté en $_POST si se requiere
    $_POST['fecha'],
    $_POST['nombre_completo'],
    $_POST['fecha_nacimiento'],
    $_POST['sexo'],
    $_POST['lugar_de_nacimiento'],
    $_POST['domicilio'],
    $_POST['calle'],
    $_POST['numero'],
    $_POST['colonia'],
    $_POST['municipio'],
    $_POST['estado'],
    $_POST['telefono_movil'],
    $_POST['telefono_casa'],
    $_POST['correo_personal'],
    $_POST['facebook'],
    $_POST['servicio_medico'],
    $_POST['numero_afiliacion'],
    $_POST['grupo_sanguinio'],
    $_POST['eres_alergico'],
    $_POST['problema_salud'],
    $_POST['descripcion_salud'],
    $_POST['medicamentos_ingeres'],
    $_POST['tratamineto_medico'],
    $_POST['descripcion_medico'],
    $_POST['estado_civil_padres'],
    $_POST['p_nombre_padre'],
    $_POST['p_vive'],
    $_POST['p_edad'],
    $_POST['p_estudios'],
    $_POST['P_ocupacion'],
    $_POST['p_domicilio'],
    $_POST['p_celular'],
    $_POST['p_trabaja_en'],
    $_POST['p_numero_trabajo'],
    $_POST['m_nombre_madre'],
    $_POST['m_vive'],
    $_POST['m_edad'],
    $_POST['m_estudios'],
    $_POST['m_ocupacion'],
    $_POST['m_domicilio'],
    $_POST['m_celular'],
    $_POST['m_trabaja_en'],
    $_POST['m_numero_trabajo'],
    $_POST['persona_problema'],
    $_POST['relacion_tus_padres'],
    $_POST['relacion_llevas_padres'],
    $_POST['relacion_hermanos'],
    $_POST['ingreso_familiar_mes'],
    $_POST['gasto_familiar_mes'],
    $_POST['casa_propia'],
    $_POST['vehiculo'],
    $_POST['tiempo_libre'],
    $_POST['practicas_deporte'],
    $_POST['descripcion_deporte'],
    $_POST['donde_practica'],
    $_POST['organizacion_equipo'],
    $_POST['descripcion_equipo'],
    $_POST['leer'],
    $_POST['tipo_lecturas'],
    $_POST['libros_leidos'],
    $_POST['leyendo_libros'],
    $_POST['agrada_hacer'],
    $_POST['disgusta_molestia'],
    $_POST['tipo_peliculas'],
    $_POST['nombre_pelicula'],
    $_POST['amigos'],
    $_POST['cuantos_amigos'],
    $_POST['reunion_amigos'],
    $_POST['quien_aporta'],
    $_POST['apoyo_estudios'],
    $_POST['trabajas'],
    $_POST['enque_trabajas'],
    $_POST['dias_trabajadas'],
    $_POST['horario_entrada'],
    $_POST['horario_salida'],
    $_POST['actividades'],
    $_POST['tel_trabajo'],
    $_POST['nombre_jefe'],
    $_POST['meta_vida'],
    $_POST['piensas_lograrlo'],
    $_POST['decision_cecytem'],
    $_POST['carrera_gusta'],
    $_POST['porque'],
    $_POST['meta_cecytem'],
    $_POST['lograrlo'],
    $_POST['expectativas_colegio'],
    $_POST['continuar_estudios'],
    $_POST['porque_estudios'],
    $_POST['estudiar_futuro'],
    $_POST['pensar_no_estudiar'],
    $_POST['traslado_casa_cecytem'],
     $_POST['tomar_transporte'],
    $_POST['cuantos_transportes'],
    $mapa
);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Registro guardado exitosamente";
} else {
    echo "Error al guardar el registro: " . $stmt->error;
}

// Cerrar la declaración y conexión
$stmt->close();
$conn->close();
?>
