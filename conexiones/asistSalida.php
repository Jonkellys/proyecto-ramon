<?php
  require_once "./funciones.php";
  date_default_timezone_set("America/Caracas");

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $codigo = $_GET['codigo'];

  if (isset($codigo)) {
    $salida = date("Y-m-d h:i:s");
    $sql = $conn->prepare("UPDATE asistencias SET AsistenciaSalida = '$salida' WHERE AsistenciaCodigo = '$codigo'");

    if ($sql->execute()) {
      echo '<script> window.location.href = "http://localhost/sistema-asistencias/asistencias"; </script>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
        Hubo un error intente de nuevo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  } else {
    echo '<script> window.location.href = "http://localhost/sistema-asistencias/asistencias"; </script>';
  }
?>