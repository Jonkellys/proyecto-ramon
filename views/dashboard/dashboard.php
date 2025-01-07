    <?php
    require_once __DIR__ . "../../../conexiones/funciones.php";
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
      unset($_SESSION['acceso']);

      session_regenerate_id();

      session_destroy();
      header('Location: http://localhost/sistema-asistencias/login');
    }

    $page = "dashboard";
    ?>
    <!DOCTYPE html>

    <html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

      <title>Dashboard | <?php echo NOMBRE; ?></title>

      <meta name="description" content="" />

      <?php include "./modulos/links.php"; ?>

    </head>

    <body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->

          <?php include "./modulos/menu.php" ?>
          <!-- / Menu -->

          <!-- Layout container -->
          <div class="layout-page">

            <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->


              <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row mb-5">

                  <nav class="navbar">
                    <div class="container-fluid">
                      <h3 class="mb-0">Alcaldía del Municipio Benítez</h3>
                    </div>
                  </nav>

                  <div class="w-100 d-flex justify-content-around align-items-center flex-wrap">
                    <div class="col-md-6 col-lg-4 mt-3">
                      <div class="card h-100 p-4">
                        <img class="card-img card-img-left" src="<?php echo media; ?>assets/img/personal.svg">
                        <div class="card-body text-center pb-0">
                          <?php
                          $totalPersonalQuery = conectar()->query("SELECT * FROM personal");
                          $totalPersonal = $totalPersonalQuery->rowCount();
                          ?>
                          <h3 class="card-title">Personal Total</h3>
                          <p style="font-size: xx-large;">
                            <b>
                              <?php
                              echo $totalPersonal;
                              ?>
                            </b>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-column align-items-center" style="width: max-content;">
                      <div style="height: fit-content; width: max-content;" class="col-md-6 col-lg-6 mt-2">
                        <?php
                        $activoQuery = conectar()->query("SELECT id FROM personal WHERE PersonalEstado = 'Activo'");
                        $activo = $activoQuery->rowCount();

                        $permisoQuery = conectar()->query("SELECT id FROM personal WHERE PersonalEstado = 'Con Permiso Médico'");
                        $permiso = $permisoQuery->rowCount();
                        ?>
                        <div class="card h-100">
                          <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" disabled class="btn btn-outline-primary">
                              <i style="font-size: 40px;" class="tf-icons bx bx-briefcase"></i>
                              <h4>Personal Activo</h4>
                              <p style="font-size: xx-large;"><?php echo $activo; ?></p>
                            </button>
                            <button type="button" disabled class="btn btn-outline-primary">
                              <i style="font-size: 40px;" class="tf-icons bx bx-capsule"></i>
                              <h4>Personal Con Permiso</h4>
                              <p style="font-size: xx-large;"><?php echo $permiso; ?></p>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div style="height: fit-content; width: max-content;" class="col-md-6 col-lg-6 mb-2 mt-3">
                        <?php
                        $femaleQuery = conectar()->query("SELECT id FROM personal WHERE PersonalGenero = 'Femenino'");
                        $mujer = $femaleQuery->rowCount();

                        $maleQuery = conectar()->query("SELECT id FROM personal WHERE PersonalGenero = 'Masculino'");
                        $hombre = $maleQuery->rowCount();
                        ?>
                        <div class="card h-100">
                          <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" style="color: #e83e8c; border-color: #e83e8c; background: transparent;" disabled class="btn">
                              <i style="font-size: 40px;" class="tf-icons bx bx-female"></i>
                              <h4>Personal Femenino</h4>
                              <p style="font-size: xx-large;"><?php echo $mujer; ?></p>
                            </button>
                            <button type="button" style="color: #007bff; border-color: #007bff; background: transparent;" disabled class="btn">
                              <i style="font-size: 40px;" class="tf-icons bx bx-male"></i>
                              <h4>Personal Masculino</h4>
                              <p style="font-size: xx-large;"><?php echo $hombre; ?></p>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card col-10 h-50 my-5 p-4 d-flex flex-row flex-wrap justify-content-center">
                      <h5 class="card-title fw-semibold w-100">Asistencias de esta semana</h5>
                      <div>
                      	<canvas style="max-height: 25rem !important; width: 35rem !important;" id="weekDaysChart"></canvas>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- / Content -->


            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->


      <?php include "./modulos/scripts.php"; ?>
      <script type="module" src="<?php echo media; ?>assets/vendor/libs/chartjs/chart.umd.min.js"></script>
      <script type="module">
        const asisData = <?php echo weekDaysAttendance(); ?>;

        const data = {
          labels: [
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes'
          ],
          datasets: [{
            label: 'Asistencias',
            data: asisData,
            borderWidth: 1,
            barThickness: 15,
            borderRadius: 5
          }]
        };
        const config = {
          "maintainAspectRatio": false,
          type: 'bar',
          data: data,
          options: {
            indexAxis: 'y',
    				scales: {
      				y: {
        				beginAtZero: true
      				}
    				}
  				},
        };

        const barChart = new Chart(
          document.getElementById('weekDaysChart').getContext("2d"),
          config
        );
      </script>
    </body>

    </html>
