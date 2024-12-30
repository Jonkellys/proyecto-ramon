<?php
date_default_timezone_set("America/Caracas");

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once __DIR__ . '/../libraries/Bootstrap.php';
require_once "./funciones.php";

$nombre = strClean($_GET['nombre']);
$apellido = strClean($_GET['apellido']);

$personal = strClean($_GET['personal']);
$titulo = strClean($_GET['titulo']);
$nacion = strClean($_GET['nacion']);
$categoria = strClean($_GET['categoria']);
$genero = strClean($_GET['genero']);
$estado = strClean($_GET['estado']);

if ($personal == "Todos") {
  $personalQuery = "";
} else if ($personal != "Todos" && $personal != "Ninguno") {
  $personalQuery = " AND PersonalCodigo = '$personal'";
}

if ($titulo == "Todos") {
  $tituloQuery = "";
} else if ($titulo != "Todos" && $titulo != "Ninguno") {
  $tituloQuery = " AND PersonalTituloAcad = '$titulo'";
}

if ($nacion == "Todos") {
  $nacionQuery = "";
} else if ($nacion != "Todos" && $nacion != "Ninguno") {
  $nacionQuery = " AND PersonalNacionalidad = '$nacion'";
}

if ($categoria == "Todos") {
  $categoriaQuery = "";
} else if ($categoria != "Todos" && $categoria != "Ninguno") {
  $categoriaQuery = " AND PersonalCategoria = '$categoria'";
}

if ($genero == "Todos") {
  $generoQuery = "";
} else if ($genero != "Todos" && $genero != "Ninguno") {
  $generoQuery = " AND PersonalGenero = '$genero'";
}

if ($estado == "Todos") {
  $estadoQuery = "";
} else if ($estado != "Todos" && $estado != "Ninguno") {
  $estadoQuery = " AND PersonalEstado = '$estado'";
}

$resultQuery = "SELECT * FROM personal WHERE id != 0" . $personalQuery . $tituloQuery . $nacionQuery . $categoriaQuery . $generoQuery . $estadoQuery;
$query = conectar()->query($resultQuery);
$num = 1;

$helper = new Sample();
$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator($nombre . " " . $apellido)
  ->setTitle('Registro de Personal')
  ->setSubject('Registro de Personal');

$spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'N°')
  ->setCellValue('B1', 'Nombre')
  ->setCellValue('C1', 'Apellido')
  ->setCellValue('D1', 'Cédula')
  ->setCellValue('E1', 'Género')
  ->setCellValue('F1', 'Dirección')
  ->setCellValue('G1', 'Teléfono')
  ->setCellValue('H1', 'Correo Electrónico')
  ->setCellValue('I1', 'Nacionalidad')
  ->setCellValue('J1', 'Título Académico')
  ->setCellValue('K1', 'Categoría')
  ->setCellValue('L1', 'Cargo')
  ->setCellValue('M1', 'Carga Familiar')
  ->setCellValue('N1', 'Fecha de Nacimiento')
  ->setCellValue('O1', 'Lugar de Nacimiento')
  ->setCellValue('P1', 'Estado');

if ($query->rowCount() <= 0) {
  $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'No se ha encontrado');
} else {
  $index = 2;
  while ($row = $query->fetch()) {
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $index, $num++)
      ->setCellValue('B' . $index, $row['PersonalNombre'])
      ->setCellValue('C' . $index, $row['PersonalApellido'])
      ->setCellValue('D' . $index, $row['PersonalCedula'])
      ->setCellValue('E' . $index, $row['PersonalGenero'])
      ->setCellValue('F' . $index, $row['PersonalDireccion'])
      ->setCellValue('G' . $index, $row['PersonalTelefono'])
      ->setCellValue('H' . $index, $row['PersonalCorreo'])
      ->setCellValue('I' . $index, $row['PersonalNacionalidad'])
      ->setCellValue('J' . $index, $row['PersonalTituloAcad'])
      ->setCellValue('K' . $index, $row['PersonalCategoria'])
      ->setCellValue('L' . $index, $row['PersonalCargo'])
      ->setCellValue('M' . $index, $row['PersonalCargaFam'])
      ->setCellValue('N' . $index, $row['PersonalFechaNac'])
      ->setCellValue('O' . $index, $row['PersonalLugarNac'])
      ->setCellValue('P' . $index, $row['PersonalEstado']);
    $index++;
  }
}

$letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'];

foreach ($letras as $l) {
  $spreadsheet->getActiveSheet()->getColumnDimension($l)->setAutoSize(true);
}

unset($l);

$spreadsheet->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);
$spreadsheet->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Registro del Personal - ' . gmdate('d/m/Y') . '.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
