<?php

require_once "./funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {

    $tipo = strClean($_POST['tipo']);

    // $fileRadio = strClean($_POST['fileRadio']);

    if ($tipo == "") {
      echo "<script>new swal('¡Error!', 'Debes elegir un tema', 'error');</script>";
      exit();
    }

    // if ($fileRadio == "") {
    //   echo "<script>new swal('¡Error!', 'Debes elegir un tipo de archivo', 'error');</script>";
    //   exit();
    // } else {
    $personalInput = strClean($_POST['personalInput']); // asis
    $tituloInput = strClean($_POST['tituloInput']);
    $nacionInput = strClean($_POST['nacionInput']);
    $categoriaInput = strClean($_POST['categoriaInput']);
    $generoInput = strClean($_POST['generoInput']);
    $estadoInput = strClean($_POST['estadoInput']);

    $desdeInput = strClean($_POST['desdeInput']);
    $hastaInput = strClean($_POST['hastaInput']);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);

    if ($tipo == "Personal") {
      // if ($fileRadio == "pdf") {
      //   echo '<script> window.open("http://localhost/sistema-asistencias/conexiones/createPersonalPdf.php?personal=' . $personalInput . '&titulo=' . $tituloInput . '&nacion=' . $nacionInput . '&categoria=' . $categoriaInput . '&genero=' . $generoInput . '&estado=' . $estadoInput . '"); </script>';
      // } else if ($fileRadio == "excel") {
      echo '<script> window.open("http://localhost/sistema-asistencias/conexiones/createPersonalExcel.php?nombre=' . $nombre . '&apellido=' . $apellido . '&personal=' . $personalInput . '&titulo=' . $tituloInput . '&nacion=' . $nacionInput . '&categoria=' . $categoriaInput . '&genero=' . $generoInput . '&estado=' . $estadoInput . '"); </script>';
      // }
    } else if ($tipo == "Asistencias") {

      if ($desdeInput == "") {
        echo "<script>new swal('¡Error!', 'Debes elegir una fecha de inicio', 'error');</script>";
        exit();
      }

      if ($hastaInput == "") {
        echo "<script>new swal('¡Error!', 'Debes elegir una fecha de fin', 'error');</script>";
        exit();
      }

      // if ($fileRadio == "pdf") {
      //   $file = "Pdf";
      // } else if ($fileRadio == "excel") {
      echo '<script> window.open("http://localhost/sistema-asistencias/conexiones/createAsistenciasExcel.php?nombre=' . $nombre . '&apellido=' . $apellido . '&personal=' . $personalInput . '&desde=' . $desdeInput . '&hasta=' . $hastaInput . '"); </script>';
      // }
    }
    echo "<script>new swal('¡Éxito!', 'Registro generado correctamente', 'success');</script>";
    // }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
