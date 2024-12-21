<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM Usuarios WHERE CuentaCodigo = '$codigo'";
    $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

    if($conn->query($sql) && $conn->query($stmt)) {
          echo "<script>new swal('¡Exito!', 'Usuario eliminado correctamente', 'success');</script>";
          echo '<script> window.location.href = "http://localhost/sistema-asistencias/users"; </script>';
    } else {
      echo "<span class='badge badge-center rounded-pill bg-danger' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='right' data-bs-html='true' title='' data-bs-original-title='<span>No se pudo eliminar el usuario</span>'><span class='tf-icons bx bx-x'></span></span>";
    }

?>

