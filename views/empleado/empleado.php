<?php
require_once __DIR__ . "../../../conexiones/funciones.php";
session_start(['name' => 'Sistema']);

if (!isset($_SESSION['token']) || !isset($_SESSION['usuario'])) {
  unset($_SESSION['id']);
  unset($_SESSION['nombre']);
  unset($_SESSION['apellido']);
  unset($_SESSION['usuario']);
  unset($_SESSION['email']);
  unset($_SESSION['clave']);
  unset($_SESSION['tipo']);
  unset($_SESSION['genero']);

  session_destroy();
  header('Location: http://localhost/sistema-asistencias/login');
}

if (!isset($_GET['codigo'])) {
  header('Location: http://localhost/sistema-asistencias/personal');
} else {
  $codigo = $_GET['codigo'];

  $sql = conectar()->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$codigo'");
  $sql->execute();
  $data = $sql->fetch(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Empleado <?php echo $data->PersonalNombre . " " . $data->PersonalApellido; ?> | <?php echo NOMBRE; ?></title>

  <meta name="description" content="" />

  <?php include "./modulos/links.php"; ?>


</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include "./modulos/menu.php"; ?>

      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Content wrapper -->
        <div class="content-wrapper" id="place">
          <!-- Content -->
          <div class="">
            <div class="container-fluid flex-grow-1 container-p-y">
              <a href="personal" class="btn btn-outline-primary mb-3"><i class="bx bx-left-arrow-alt"></i> Volver</a>
              <h4 class="fw-bold my-4">Información de "<?php echo $data->PersonalNombre; ?> <?php echo $data->PersonalApellido; ?>"</h4>
              <?php
              if ($_SESSION['tipo'] == "Administrador") {
                echo '
                  <div class="mb-4 d-flex flex-row justify-content-around">
                    <a class="btn btn-info" href="editar?codigo=' . $data->PersonalCodigo . '">
                      <span class="tf-icons bx bx-edit"></span> Editar Empleado
                    </a>
                    <form action="' . SERVERURL . 'conexiones/eliminarPersonal.php?codigo=' . $data->PersonalCodigo . '" autocomplete="off" enctype="multipart/form-data" method="POST" class="DeleteForm">
                      <div class="RespuestaAjax"></div>
                      <button class="btn btn-danger">
                        <span class="tf-icons bx bx-trash"></span> Eliminar Empleado
                        </button>
                    </form>
                  </div>
                ';
              }
              ?>

              <div class="row g-0 card">

                <div class="">
                  <div class="card-body">
                    <div class="d-flex justify-content-around mt-3">
                      <div class="list-group list-group-flush col-5">
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Nombre: </strong><?php echo $data->PersonalNombre; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Apellido: </strong><?php echo $data->PersonalApellido; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Cédula: </strong><?php echo $data->PersonalCedula; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Titulo Académico: </strong><?php echo $data->PersonalTituloAcad; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Nacionalidad: </strong><?php echo $data->PersonalNacionalidad; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Categoría: </strong><?php echo $data->PersonalCategoria; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Carga Familiar: </strong><?php echo $data->PersonalCargaFam; ?></div>
                      </div>
                      <div class="list-group list-group-flush col-5">
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Género: </strong><?php echo $data->PersonalGenero; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Teléfono: </strong><?php echo $data->PersonalTelefono; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Correo: </strong><?php echo $data->PersonalCorreo; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Dirección: </strong><?php echo $data->PersonalDireccion; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Lugar de Nacimiento: </strong><?php echo $data->PersonalLugarNac; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Fecha de Nacimiento: </strong><?php echo $data->PersonalFechaNac; ?></div>
                        <div class="list-group-item list-group-item-action"><strong class="me-1">Estado: </strong><?php echo $data->PersonalEstado; ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php include "./modulos/scripts.php"; ?>
  <script src="<?php echo media; ?>js/eliminar.js"></script>
</body>

</html>