<?php
require_once "./funciones.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$check = ejecutar_consulta_simple("SELECT * FROM admins");

if ($check->rowCount() <= 1) {
  echo "<script>new swal('Error!', 'Debe existir mínimo un administrador en el sistema', 'error');</script>";
  exit();
} else {
  $codigo = $_GET['codigo'];
  $sesion = $_GET['sesion'];

  if ($sesion == $codigo) {
    echo "<script>new swal('Error!', 'No puedes eliminar la cuenta activa', 'error');</script>";
    exit();
  } else {

    $sql = "DELETE FROM admins WHERE CuentaCodigo = '$codigo'";
    $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

    if ($conn->query($sql) && $conn->query($stmt)) {
      echo "<script>new swal('¡Éxito!', 'Administrador eliminado correctamente', 'success');</script>";
      echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
    } else {
      echo "<span class='badge badge-center rounded-pill bg-danger' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='right' data-bs-html='true' title='' data-bs-original-title='<span>No se pudo eliminar el usuario</span>'><span class='tf-icons bx bx-x'></span></span>";
    }
  }
}
