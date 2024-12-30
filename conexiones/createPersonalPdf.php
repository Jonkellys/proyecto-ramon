<?php
date_default_timezone_set("America/Caracas");

require_once "./funciones.php";
require "../plantilla/assets/fpdf/fpdf.php";

class PDF extends FPDF
{
  function Header()
  {
    $this->Image("../plantilla/assets/img/logo1.png", 10, 10, 10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(15);
    $this->Cell(30, 10, mb_convert_encoding("Alcaldia de Benítez", "ISO-8859-1", "UTF-8"), 0, 1, 'L');
    $this->Ln(10);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}' . 0, 0, 'C');
  }
}

$pdf = new PDF("P", "mm", 'Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle("Registro del Personal - " . date('d/m/Y'), false);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 0, 'Registro del Personal', 0, 1, 'C');
$pdf->Ln(10);

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

$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(10, 8, mb_convert_encoding('N°', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(20, 8, 'Nombre', 1);
$pdf->Cell(20, 8, 'Apellido', 1);
$pdf->Cell(20, 8, mb_convert_encoding('Cédula', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(15, 8, mb_convert_encoding('Género', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(50, 8, mb_convert_encoding('Dirección', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(23, 8, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(50, 8, mb_convert_encoding('Correo Electrónico', 'ISO-8859-1', 'UTF-8'), 1, 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Nacionalidad', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Título Académico', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Categoría', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Cargo', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(10, 8, mb_convert_encoding('Carga Familiar', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Fecha de Nacimiento', 'ISO-8859-1', 'UTF-8'), 1, 1);
// $pdf->Cell(50, 8, mb_convert_encoding('Lugar de Nacimiento', 'ISO-8859-1', 'UTF-8'), 1);
// $pdf->Cell(30, 8, mb_convert_encoding('Estado', 'ISO-8859-1', 'UTF-8'), 1);

$pdf->SetFont("Arial", "", 8);

if ($query->rowCount() <= 0) {
  $pdf->Write(10, "No hay personal registrado");
} else {

  while ($rows = $query->fetch()) {
    $pdf->Cell(10, 8, $num++, 1,);
    $pdf->Cell(20, 8, mb_convert_encoding($rows['PersonalNombre'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(20, 8, mb_convert_encoding($rows['PersonalApellido'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(20, 8, mb_convert_encoding($rows['PersonalCedula'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(15, 8, mb_convert_encoding($rows['PersonalGenero'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(50, 8, mb_convert_encoding($rows['PersonalDireccion'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(23, 8, mb_convert_encoding($rows['PersonalTelefono'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(50, 8, mb_convert_encoding($rows['PersonalCorreo'], 'ISO-8859-1', 'UTF-8'), 1, 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalNacionalidad'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalTituloAcad'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalCategoria'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalCargo'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(10, 8, mb_convert_encoding($rows['PersonalCargaFam'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalFechaNac'], 'ISO-8859-1', 'UTF-8'), 1, 1);
    // $pdf->Cell(50, 8, mb_convert_encoding($rows['PersonalLugarNac'], 'ISO-8859-1', 'UTF-8'), 1);
    // $pdf->Cell(30, 8, mb_convert_encoding($rows['PersonalEstado'], 'ISO-8859-1', 'UTF-8'), 1);
  };
}

$pdf->Output();
exit;
