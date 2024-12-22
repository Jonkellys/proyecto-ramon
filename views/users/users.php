<?php 
  session_start(['name' => 'Sistema']);

  if(!isset($_SESSION['token']) || !isset($_SESSION['usuario'])) {
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

  $page = "usuarios";
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Usuarios | <?php echo NOMBRE; ?></title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuentas / Personas /</span> Usuarios</h4>


              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="administradores"> Administradores</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"> Usuarios</a>
                    </li>
                  </ul>
                </div>
              </div>

              <?php
                if($_SESSION['tipo'] == "Administrador") {
                  echo'<button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#UserAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                    <span class="tf-icons bx bx-user-plus"></span>   Añadir Usuario
                  </button>';
                }
              ?>

              <?php
                if($_SESSION['tipo'] == "Administrador") {
                  echo'<div class="card mb-4">
                    <div class="collapse" id="UserAdd">
                      <div class="card ">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h4 class="mb-0">Datos de la Cuenta</h4>
                        </div>
                        <div class="card-body form-resto">
                          <form action="' . SERVERURL . 'conexiones/userReg.php" autocomplete="off" id="adminForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                            <div class="row mb-3">
                              <label for="nombreAdminAdd" class="form-label">Nombre</label>
                              <div class="col-sm-10">
                                <input type="text" autocapitalize="" onkeypress="return letras(event)" name="nombre" class="form-control" placeholder="Ingresar Nombre" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="apellidoAdminAdd" class="form-label">Apellido</label>
                              <div class="col-sm-10">
                                <input type="text" autocapitalize="" onkeypress="return letras(event)" name="apellido" class="form-control" placeholder="Ingresar Apellido" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="usuarioAdminAdd" class="form-label">Nombre de Usuario</label>
                              <div class="col-sm-10">
                                <input type="text" autocapitalize="" name="usuario" class="form-control" placeholder="Ingresar Nombre de Usuario" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="correoAdminAdd" class="form-label">Correo</label>
                              <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Ingresar Correo" />
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="clave1AdminAdd" class="form-label">Contraseña</label>
                              <div class="col-sm-10">
                                <input type="password" name="clave" class="form-control" placeholder="Ingresar Contraseña" />    
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="clave2AdminAdd" class="form-label">Repetir Contraseña</label>
                              <div class="col-sm-10">
                                <input type="password" name="confirmar"  class="form-control" placeholder="Ingresar Contraseña Nuevamente" />
                              </div>
                            </div>

                            <div class="row">
                              <div class="row-md">
                                <label for="genero" class="form-label">Género</label>
                                <div class="form-check mt-3">
                                  <input name="genero" class="form-check-input" type="radio" value="Femenino" checked="">
                                  <label class="form-check-label" for="femenino"> Femenino </label>
                                </div>
                                <div class="form-check">
                                  <input name="genero" class="form-check-input" type="radio" value="Masculino">
                                  <label class="form-check-label" for="masculino"> Masculino </label>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                              <button class="btn btn-primary" value="Submit" type="submit">Registrar Usuario</button>
                            </div>

                            <div style="margin-top: 3%;" class="RespuestaAjax"></div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>';
                }
              ?>
              
              <div class="card mb-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista de Usuarios</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre de Usuario</th>
                          <th>Correo Electrónico</th>
                          <?php
                          if($_SESSION['tipo'] == "Administrador") {
                            echo'<th>Acciones</th>';
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php
                          $servername = "localhost";
                          $dbname = "sistema-asistencias";
                          $username = "root";
                          $password = "";
                          $num = 1;

                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $sql = "SELECT * FROM Usuarios";
                          $result = $conn->query($sql);

                          while ($rows = $result->fetch()) {
                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['UserName'] . "</td>
                                  <td>" . $rows['UserEmail'] . "</td>";
                            if($_SESSION['tipo'] == "Administrador") {
                              echo"<td class='mt-0 h-100 d-flex flex-row justify-content-center'>
                                  <a class='btn btn-sm btn-info me-2' href='editarUser?codigo=" . $rows['CuentaCodigo'] . "'>
                                  <span class='tf-icons bx bx-edit'></span>
                                </a>
                                
                                <form action='" . SERVERURL . "conexiones/eliminarUser.php?codigo=" . $rows['CuentaCodigo'] . "' autocomplete='off' enctype='multipart/form-data' method='POST' class='DeleteForm'>
                                    <div class='RespuestaAjax'></div>
                                    <button class='btn btn-sm btn-danger'>
                                      <span class='tf-icons bx bx-trash'></span>
                                      </button>
                                  </td>";
                            }
                            echo"</tr>";
                          };  
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>

            <!-- / Content -->
      </div>
    </div>
      
    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/config.js"></script>
      <script src="<?php echo media; ?>js/eliminar.js"></script>

    <script>
      function letras(e) {
        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla == 8) {
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron = /[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>

  </body>
</html>