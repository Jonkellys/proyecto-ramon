<?php
  require_once "./funciones.php";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $tipo = $_GET['tipo'];
  $codigo = $_GET['codigo'];

  if($tipo == "personal") {
    $sql = "DELETE FROM personal WHERE PersonalCodigo = '$codigo'";

    // $conn->query($sql);

    if($conn->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" role="alert">
              Personal eliminado correctamente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      // echo "<script>new swal('¡Éxito!', 'Cuenta eliminada correctamente', 'success');</script>";
      // echo '<script> window.location.href = "http://localhost/sistema-asistencias/personal"; </script>';
    } else {
      echo "<span class='badge badge-center rounded-pill bg-danger' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='right' data-bs-html='true' title='' data-bs-original-title='<span>No se pudo eliminar el usuario</span>'><span class='tf-icons bx bx-x'></span></span>";
    }
  }
?>