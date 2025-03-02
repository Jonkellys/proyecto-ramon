<?php

require_once "./funciones.php";
date_default_timezone_set("America/Caracas");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuarioLogin = strClean($_POST['usuario']);
    $passwordLogin = strClean($_POST['password']);
    $passwordHash = password_hash($passwordLogin, PASSWORD_DEFAULT);
    $claveLogin = password_verify($passwordLogin, $passwordHash);


    if ($usuarioLogin == "" || $passwordLogin == "") {
        echo "<script>new swal('¡Error!', 'Debes llenar todos los campos', 'error');</script>";
        exit();
    }

    $iniciar = iniciarSesion($usuarioLogin);

    if ($iniciar->rowCount() == 1) {
        $row = $iniciar->fetch(PDO::FETCH_ASSOC);

        if ($row['CuentaUsuario'] == $usuarioLogin && password_verify($passwordLogin, $row['CuentaClave'])) {

            echo "<script>new swal('¡Éxito!', 'Iniciando sesión...', 'success');</script>";

            session_start(['name' => 'Sistema']);

            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['CuentaNombre'];
            $_SESSION['apellido'] = $row['CuentaApellido'];
            $_SESSION['usuario'] = $row['CuentaUsuario'];
            $_SESSION['email'] = $row['CuentaEmail'];
            $_SESSION['clave'] = $row['CuentaClave'];
            $_SESSION['tipo'] = $row['CuentaTipo'];
            $_SESSION['genero'] = $row['CuentaGenero'];
            $_SESSION['codigo'] = $row['CuentaCodigo'];
            $_SESSION['token'] = md5(uniqid(mt_rand(), true));
            $_SESSION["acceso"] = date("Y-n-j h:i:s");

            echo '<script> window.location = "http://localhost/sistema-asistencias/dashboard" </script>';
        } else {
            echo "<script>new swal('¡Error!', 'El usuario o contraseña son incorrectos', 'error');</script>";
        }
    } else {
        echo "<script>new swal('¡Error!', 'El usuario no existe', 'error');</script>";
    }
}
