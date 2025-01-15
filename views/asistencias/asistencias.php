<?php
date_default_timezone_set("America/Caracas");
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
  header('Location: http://localhost/asistencias/login');
}

$page = "asistencias";
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

  <title>Asistencias | <?php echo NOMBRE; ?></title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información /</span> Asistencias</h4>

              <?php
              if ($_SESSION['tipo'] == "Administrador") {
                echo '<div class="demo-inline-spacing">
                    <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                      <span class="tf-icons bx bx-user-plus"></span>   Agregar Asistencia
                    </button>
                  </div>';
              }
              ?>

              <div class="card mb-4 mt-4">
                <div class="collapse" id="PerAdd">
                  <div class="card ">
                    <div class="card-body form-resto">
                      <form action="<?php echo SERVERURL; ?>conexiones/asistReg.php" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                        <div class="mb-3">
                          <label for="personlSelect" class="form-label">Personal:</label>
                          <div class="input-group">
                            <span class="input-group-text">
                              <select id="tipoBuscar" class="btn btn-outine-primary p-0">
                                <option selected value="none">Buscar por...</option>
                                <option value="Nombre">Nombre</option>
                                <option value="Cedula">Cédula</option>
                              </select>
                            </span>
                            <input type="text" name="buscar" id="buscarPersonal" class="form-control" placeholder="Buscar">
                            <button id="buscarBoton" class="btn btn-outline-primary">Buscar</button>
                          </div>
                        </div>

                        <div class="mb-3 mt-1" id="respuesta"></div>

                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                          <button class="btn btn-primary" id="btn" type="submit">Añadir Asistencia</button>
                        </div>
                        <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-4 mt-3">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista de Asistencias</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="asist">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Personal</th>
                          <th>Llegada</th>
                          <th>Salida</th>
                          <?php
                          if ($_SESSION['tipo'] == "Administrador") {
                            echo '<th>Eliminar</th>';
                          }
                          ?>
                          <th>Añadir Salida</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php
                        $servername = "localhost";
                        $dbname = "sistema-asistencias";
                        $username = "root";
                        $password = "";
                        $dia = date("d");
                        $mes = date("m");
                        $ano = date("Y");

                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                        $num = 1;
                        $stmt = "SELECT * FROM asistencias WHERE DAY(AsistenciaFecha) = '$dia' AND MONTH(AsistenciaFecha) = '$mes' AND YEAR(AsistenciaFecha) = '$ano' ORDER BY AsistenciaFecha ASC";
                        $stmtResult = $conn->query($stmt);

                        while ($rows = $stmtResult->fetch()) {

                          if ($rows['AsistenciaSalida'] == "0000-00-00 00:00:00") {
                            $hora = "No hay registro de salida";
                            $sal =  "<a href='conexiones/asistSalida.php?codigo=" . $rows['AsistenciaCodigo'] . "' class='btn btn-sm btn-info' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='top' data-bs-html='true' title='' data-bs-original-title='<span>Añadir Salida</span>'>
                                          <span class='tf-icons bx bx-log-out'></span>
                                        </a>";
                          } else {
                            $hora = $rows['AsistenciaSalida'];
                            $sal = "";
                          }


                          echo "<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['AsistenciaNombre'] . "</td>
                                  <td>" . $rows['AsistenciaFecha'] . "</td>
                                  <td>" . $hora . "</td>";
                          if ($_SESSION['tipo'] == "Administrador") {
                            echo "
                                          <td>
                                            <a class='btn btn-sm btn-danger' href= 'conexiones/eliminarAsist.php?codigo=" . $rows['AsistenciaCodigo'] . "'>
                                              <span class='tf-icons bx bx-trash'></span>
                                            </a>
                                          </td>";
                          }
                          echo "
                                  <td>" . $sal . "</td>
                                  </tr>";
                        };
                        ?>
                      </tbody>
                    </table>
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

  <script src="<?php echo media; ?>assets/vendor/js/buscarPersonal.js"></script>
  <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
  <script src="<?php echo media; ?>assets/datatables/asist.js"></script>


</body>

</html>