<?php

    require_once "./funciones.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $set = $conn->prepare("SET @@SQL_MODE = REPLACE(@@SQL_MODE, 'NO_ZERO_DATE', '');");
    $set->execute();

            $stmt = $conn->prepare("INSERT INTO personal(PersonalNombre, PersonalApellido, PersonalCedula, PersonalCargaFam, PersonalTituloAcad, PersonalNacionalidad, PersonalCategoria, PersonalCargo, PersonalFechaNac, PersonalLugarNac, PersonalGenero, PersonalDireccion, PersonalTelefono, PersonalCorreo, PersonalCodigo, PersonalEstado, PersonalUltimaEntrada) 
            VALUES(:nombre, :apellido, :cedula, :cargaF, :titulo, :nacionalidad, :categoria, :cargo, DATE_FORMAT(:fechaNac, '%Y-%m-%d'), :lugarNac, :genero, :direccion, :telefono, :correo, :codigo, :estado, :ultima)");

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':cargaF', $cargaF);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':fechaNac', $fechaNac);
            $stmt->bindParam(':lugarNac', $lugarNac);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':ultima', $ultima);
            
            $nombre = strClean($_POST["name"]);
            $apellido = strClean($_POST["apellido"]);
            $cedula = strClean($_POST["cedula"]);
            $cargaF = strClean($_POST["cargaF"]);
            $titulo = strClean($_POST["titulo"]);
            $nacionalidad = strClean($_POST["nacionalidad"]);
            $categoria = strClean($_POST["categoria"]);
            $cargo = strClean($_POST["cargo"]);
            $fechaNac = strClean($_POST["fechaNac"]);
            $lugarNac = strClean($_POST["lugarNac"]);
            $genero = strClean($_POST["genero"]);
            $direccion = strClean($_POST["direccion"]);
            $telefono = strClean($_POST["telefono"]);
            $correo = strClean($_POST["correo"]);
            $ultima = $salida = date("0000-00-00 00:00:00");

            $tipo = strClean($_POST['tipo']);

            $noT = strClean($_POST["noTel"]);
            $estado = "Activo";

            if($telefono == "") {
                $telefono = $noT;
            }

            if($nombre == "" || $apellido == "" || $cedula == "" || $cargaF == "" || $titulo == "" || $nacionalidad == "" || $categoria == "" || $cargo == "" || $lugarNac == "" || $direccion == "" || $correo == "") {
                echo "<script>new swal('¡Error!', 'Debes llenar todos los campos', 'error');</script>";
                exit(); 
            }

            $consulta = ejecutar_consulta_simple("SELECT PersonalCedula FROM personal WHERE PersonalCedula = '$cedula'");
            if($consulta->rowCount()>=1) {
                echo "<script>new swal('¡Error!', 'La cédula ingresada ya está registrada en el sistema', 'error');</script>";
                exit();
            }

            $consulta1 = ejecutar_consulta_simple("SELECT PersonalCorreo FROM personal WHERE PersonalCorreo = '$correo'");
            if($consulta1->rowCount()>=1) {
                echo "<script>new swal('¡Error!', 'El correo ingresado ya está registrado en el sistema', 'error');</script>";
                exit();
            }

            $consulta2= ejecutar_consulta_simple("SELECT id FROM personal");
            $numero = ($consulta2->rowCount())+1;

            $codigo = generar_codigo_aleatorio("P", 7, $numero);

            if($stmt->execute()){
                echo "<script>new swal('¡Exito!', 'Personal registrado correctamente', 'success');</script>";
                echo '<script> window.location.href = "http://localhost/sistema-asistencias/personal"; </script>';
            } else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Hubo un error intente de nuevo.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

?>
