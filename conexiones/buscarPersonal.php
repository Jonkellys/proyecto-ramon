<?php
date_default_timezone_set("America/Caracas");
require_once "./funciones.php";

$personal = strClean($_GET['personal']);
$tipo = strClean($_GET['tipo']);
$dia = date("d");
$mes = date("m");
$ano = date("Y");

if ($tipo == "none") {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
    Debes seleccionar un tipo de busqueda
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  exit();
}

if ($tipo == "Nombre") {
  $query = conectar()->query("SELECT * FROM personal WHERE (PersonalNombre LIKE '%" . $personal . "%') AND PersonalEstado = 'Activo' AND DAY(PersonalUltimaEntrada) != '$dia' AND MONTH(PersonalUltimaEntrada) != '$mes' AND YEAR(PersonalUltimaEntrada) != '$ano' ORDER BY PersonalNombre");
} else if ($tipo == "Cedula") {
  $cedulaArr = str_split($personal);

  function addDots($arr)
  {
    $newArr = array();

    if (count($arr) == 7) {
      array_push($newArr, $arr[0], ".", $arr[1], $arr[2], $arr[3], ".", $arr[4], $arr[5], $arr[6]);
    } else if (count($arr) == 8) {
      array_push($newArr, $arr[0], $arr[1], ".", $arr[2], $arr[3], $arr[4], ".", $arr[5], $arr[6], $arr[7]);
    } else {
      $newArr = $arr;
    }

    return $newArr;
  }

  $dots = addDots($cedulaArr);

  $cedula = implode("", $dots);

  $query = conectar()->query("SELECT * FROM personal WHERE PersonalCedula = '$cedula' AND PersonalEstado = 'Activo' AND DAY(PersonalUltimaEntrada) != '$dia' AND MONTH(PersonalUltimaEntrada) != '$mes' AND YEAR(PersonalUltimaEntrada) != '$ano'");
}

if ($query->rowCount() == 0) {
  echo '<div class="alert alert-primary" role="alert">Personal no encontrado o ya registrado</div>';
} else {
  while ($rows = $query->fetch()) {
    echo '
    <div class="input-group my-2">
      <div class="input-group-text">
        <input class="form-check-input mt-0" type="radio" value="' . $rows['PersonalCodigo'] . '" name="personal">
      </div>
      <input type="text" readonly class="form-control" value="' . $rows['PersonalNombre'] . ' ' . $rows['PersonalApellido'] . '  |  ' . $rows['PersonalCedula'] . ' - ' . $rows['PersonalCargo'] . '">
    </div>
    ';
  }
}
