<?php
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

$page = "registros";
?>

<!DOCTYPE html>

<html
  lang="es"
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

  <title>Registros | <?php echo NOMBRE; ?></title>

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
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información /</span> Registros</h4>

            <?php
            if (isset($_GET['msg'])) {
              echo '
                  <div class="alert alert-success col-6 my-3 alert-dismissible" role="alert">
                    Registro creado correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                ';
            }
            ?>

            <div class="card align-center col-lg-11 my-4">
              <div class="card-body">
                <h5 class="card-title">Crea un registro</h5>
                <form action="<?php echo SERVERURL; ?>conexiones/createRegistros.php" enctype="multipart/form-data" method="POST" data-form="register" class="FormularioAjax">

                  <div class="ms-2 mb-2">
                    <h6>Elija un tema y las opciones para generar el informe</h6>

                    <div class="mb-3 mt-4 themeChoose">
                      <select class="form-select" name="tipo" id="themeChoose">
                        <option disabled selected="selected">Elija un tema</option>
                        <option value="Personal">Personal</option>
                        <option value="Asistencias">Asistencias</option>
                      </select>
                    </div>

                    <div class="my-3 mx-auto d-flex justify-content-start">
                      <div class="input-group w-auto mx-1">
                        <span class="input-group-text">Tipo de Archivo</span>
                      </div>
                      <div class="input-group mx-1 w-25">
                        <div class="input-group-text">
                          <input class="form-check-input mt-0" type="radio" value="pdf" name="fileRadio">
                        </div>
                        <input type="text" class="form-control" readonly value="PDF">
                      </div>
                      <div class="input-group mx-1 w-25">
                        <div class="input-group-text">
                          <input class="form-check-input mt-0" type="radio" value="excel" name="fileRadio">
                        </div>
                        <input type="text" class="form-control" readonly value="Excel">
                      </div>
                    </div>
                  </div>
                  <div style="margin-top: 3%;" class="RespuestaAjax"></div>

                  <div class="w-100 d-flex justify-content-around flex-wrap mx-auto" id="formBox">
                  </div>

                  <input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre']; ?>">
                  <input type="hidden" name="apellido" value="<?php echo $_SESSION['apellido']; ?>">


                  <div class="card-footer d-grid gap-6 col-lg-4 mx-auto">
                    <button class="btn btn-md btn-primary" type="submit"><i class='bx bx-download me-2'></i> Crear Registro</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <!-- / Content -->
        </div>
      </div>
    </div>
  </div>

  <?php include "./modulos/scripts.php"; ?>
  <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
  <script>
    $(document).ready(function() {
      $('#themeChoose').change(function(e) {
        e.preventDefault();

        let valor = document.getElementById('themeChoose').value;
        let respuesta = document.getElementById('formBox');

        $.ajax({
          url: "http://localhost/sistema-asistencias/conexiones/reportes.php?tipo=" + valor,
          type: 'GET',
          data: $(this).val(),
          dataType: 'html',
          processData: false,
          contentType: false,
          success: function(data) {
            respuesta.innerHTML = data;
            // console.log(valor);
          },
          error: function(error) {
            respuesta.html("Error: " + error);
            // console.log("Error: " + error);
          }
        });
      });
    });
  </script>
</body>

</html>