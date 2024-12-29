<?php
require_once "./funciones.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $conn->prepare("UPDATE admins SET AdminUsuario = :usuario, AdminEmail = :correo  WHERE CuentaCodigo = :codigo");
$sql->bindParam(":usuario", $usuario);
$sql->bindParam(":correo", $correo);
$sql->bindParam(":codigo", $codigo);

$stmt = $conn->prepare("UPDATE cuentas SET CuentaNombre = :nombre, CuentaEmail = :correo, CuentaApellido = :apellido, CuentaUsuario = :usuario, CuentaGenero = :genero WHERE CuentaCodigo = :codigo");
$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":correo", $correo);
$stmt->bindParam(":apellido", $apellido);
$stmt->bindParam(":usuario", $usuario);
$stmt->bindParam(":genero", $genero);
$stmt->bindParam(":codigo", $codigo);

$nombre = strClean($_POST['nombre']);
$apellido = strClean($_POST['apellido']);
$genero = strClean($_POST['genero']);
$codigo = strClean($_POST["codigo"]);

$usuario = strClean($_POST['usuario']);
$correo = strClean($_POST['correo']);


// $updateAdmin = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);

if ($sql->execute() && $stmt->execute()) {
    echo "<script>new swal('¡Éxito!', 'Datos actualizados correctamente', 'success');</script>";
    echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
} else {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Hubo un error intente de nuevo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
