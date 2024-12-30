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
$desde = strClean($_GET['desde']);
$hasta = strClean($_GET['hasta']);

if ($personal == "Todos") {
  $personalQuery = "";
} else if ($personal != "Todos" && $personal != "Ninguno") {
  $personalQuery = " AND PersonalCodigo = '$personal'";
}

$resultSQL = "SELECT * FROM asistencias WHERE id != 0" . $personalQuery . " AND AsistenciaFecha BETWEEN '$desde' AND '$hasta'";
$query = conectar()->query($resultSQL);
$num = 1;

$helper = new Sample();
$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator($nombre . " " . $apellido)
  ->setTitle('Registro de Asistencias')
  ->setSubject('Registro de Asistencias');

$spreadsheet->setActiveSheetIndex(0)
  ->setCellValue('A1', 'N°')
  ->setCellValue('B1', 'Nombre y Apellido')
  ->setCellValue('C1', 'Cédula')
  ->setCellValue('D1', 'Fecha')
  ->setCellValue('E1', 'Hora de Entrada')
  ->setCellValue('F1', 'Hora de Salida');

if ($query->rowCount() <= 0) {
  $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'No se ha encontrado');
} else {
  $index = 2;
  while ($row = $query->fetch()) {
    $fecha = strtotime($row['AsistenciaFecha']);
    $horaSalida = strtotime($row['AsistenciaFecha']);

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $index, $num++)
      ->setCellValue('B' . $index, $row['AsistenciaNombre'])
      ->setCellValue('C' . $index, $row['PersonalCedula'])
      ->setCellValue('D' . $index, date('d-m-Y', $fecha))
      ->setCellValue('E' . $index, date('h:i:s', $fecha))
      ->setCellValue('F' . $index, date('h:i:s', $horaSalida));
    $index++;
  }
}

$letras = ['A', 'B', 'C', 'D', 'E', 'F'];

foreach ($letras as $l) {
  $spreadsheet->getActiveSheet()->getColumnDimension($l)->setAutoSize(true);
}

unset($l);

$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
$spreadsheet->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Registro de Asistencias - ' . gmdate('d/m/Y') . '.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
