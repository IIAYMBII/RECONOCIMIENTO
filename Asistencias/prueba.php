<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Crear el objeto PhpWord
$phpWord = new PhpWord();

// Crear una sección en el documento
$section = $phpWord->addSection([
    'orientation' => 'portrait',
    'marginTop' => 800, // Margen superior en twips (1 cm = 567 twips)
    'marginBottom' => 800,
    'marginLeft' => 1200,
    'marginRight' => 1200,
]);

// Añadir encabezado
$header = $section->addHeader();
$header->addText(
    'Registro de Entradas y Salidas',
    ['bold' => true, 'size' => 16],
    ['align' => 'center']
);

// Añadir texto introductorio
$section->addText('Este documento contiene los detalles de los alumnos.', [
    'size' => 12,
    'italic' => true,
]);

// Datos de ejemplo (pueden venir de tu base de datos)
$alumnos = [
    ['nombre' => 'Juan Pérez', 'control' => '12345', 'materia' => 'Matemáticas', 'estado' => 'Activo'],
    ['nombre' => 'Ana Gómez', 'control' => '67890', 'materia' => 'Historia', 'estado' => 'Inactivo'],
];

// Añadir tabla con datos de alumnos
$table = $section->addTable([
    'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
    'borderSize' => 6,
    'borderColor' => '999999',
]);

// Encabezados de la tabla
$table->addRow();
$table->addCell(3000)->addText('Nombre', ['bold' => true]);
$table->addCell(2000)->addText('Número de Control', ['bold' => true]);
$table->addCell(3000)->addText('Materia', ['bold' => true]);
$table->addCell(2000)->addText('Estado', ['bold' => true]);

// Datos de la tabla
foreach ($alumnos as $alumno) {
    $table->addRow();
    $table->addCell(3000)->addText($alumno['nombre']);
    $table->addCell(2000)->addText($alumno['control']);
    $table->addCell(3000)->addText($alumno['materia']);
    $table->addCell(2000)->addText($alumno['estado']);
}

// Guardar y enviar el archivo al navegador
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="registro_alumnos.docx"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save("php://output");
exit;
