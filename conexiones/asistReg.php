<?php
require_once "./funciones.php";

date_default_timezone_set("America/Caracas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn->prepare("INSERT INTO asistencias(AsistenciaCodigo, PersonalCodigo, AsistenciaFecha, AsistenciaSalida, AsistenciaNombre, PersonalCedula) 
            VALUES(:codigo, :personal, :fecha, :salida, :nombre, :cedula)");

        $sql->bindParam(":codigo", $codigo);
        $sql->bindParam(":personal", $personal);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":salida", $salida);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":cedula", $cedula);

        $personal = strClean($_POST['personal']);

        if ($personal == "") {
            echo "<script>new swal('¡Error!', 'Debes seleccionar un personal', 'error');</script>";
            exit();
        }

        $salida = date("0000-00-00 00:00:00");

        $consulta = ejecutar_consulta_simple("SELECT id FROM asistencias");
        $numero = ($consulta->rowCount()) + 1;
        $codigo = generar_codigo_aleatorio("AS", 7, $numero);

        $fecha = date("Y-m-d h:i:s");

        $stmt = "SELECT * FROM personal WHERE PersonalCodigo = '$personal'";
        $result = $conn->query($stmt);

        while ($rows = $result->fetch()) {
            $nombre = $rows['PersonalNombre'] . ' ' . $rows['PersonalApellido'];
            $cedula = $rows['PersonalCedula'];
        };

        $ultima = $conn->prepare("UPDATE personal SET PersonalUltimaEntrada = '$fecha' WHERE PersonalCodigo = '$personal'");
        $ultima->execute();

        if ($sql->execute()) {
            echo "<script>new swal('¡Éxito!', 'Asistencia registrada correctamente', 'success');</script>";
            echo '<script> window.location = "http://localhost/sistema-asistencias/asistencias"; </script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Hubo un error intente de nuevo.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
