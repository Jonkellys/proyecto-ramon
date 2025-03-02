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

    <title>Editar | <?php echo NOMBRE;?></title>

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

            <?php              
              $servername = "localhost";
              $dbname = "sistema-asistencias";
              $username = "root";
              $password = "";
                          
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          
              $codigo = $_GET['codigo'];
                          
              $sql = $conn->prepare("SELECT * FROM admins WHERE CuentaCodigo = '$codigo'");
              $sql->execute();
              $data = $sql->fetch(PDO::FETCH_OBJ);

              $sql1 = $conn->prepare("SELECT * FROM cuentas WHERE CuentaCodigo = '$codigo'");
              $sql1->execute();
              $data1 = $sql1->fetch(PDO::FETCH_OBJ);
            ?>

            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold mt-4">Editar los datos de "<?php echo $data->AdminUsuario; ?>"</h4>

                <div class="row g-0 card" style="flex-direction: row;">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="<?php echo media; ?>assets/img/edit.svg">
                        <div class="d-grid gap-2 col-lg-8 mx-auto">
                      
                        <a href="administradores" style="margin-bottom: 20%;" class="btn btn-outline-secondary">Volver</a>
                        
                      </div>
                      </div>

                      <div class="col-md-8">
                        <div class="card-body">


                        <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#verDatosPerfil" aria-controls="verDatosPerfil" aria-selected="true">
                      <i class="menu-icon tf-icons bx bx-show"></i>
                      Datos
                    </button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#editarDatosPerfil" aria-controls="editarDatosPerfil" aria-selected="false">
                      <i class="menu-icon tf-icons bx bx-edit"></i>  
                      Editar
                    </button>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane fade show active" style="height: 100%;" id="verDatosPerfil" role="tabpanel">
                    <div class="col-lg-6">                    
                      <div class="mb-4">
                        <div class="mt-1">
                          <div class="list-group list-group-flush">
                            <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Nombre: </strong><?php echo $data1->CuentaNombre; ?></a>
                            <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Apellido: </strong><?php echo $data1->CuentaApellido; ?></a>
                            <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Usuario: </strong><?php echo $data->AdminUsuario; ?></a>
                            <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Correo: </strong><?php echo $data->AdminEmail; ?></a>
                            <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Genero: </strong><?php echo $data1->CuentaGenero; ?></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="editarDatosPerfil" role="tabpanel">
                    <h4>Editar Datos</h4>
                    <form action="<?php echo SERVERURL; ?>conexiones/updateAdmin.php" enctype="multipart/form-data" method="POST" class="UpdateForm">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nombreper" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" autocapitalize="on" value="<?php echo $data1->CuentaNombre; ?>"/>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nombreper" class="form-label">Apellido:</label>
                                <input type="text" name="apellido" class="form-control" autocapitalize="on" value="<?php echo $data1->CuentaApellido; ?>"/>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col mb-3">
                                <label for="nombreper" class="form-label">Usuario:</label>
                                <input type="text" name="usuario" class="form-control" autocapitalize="on" value="<?php echo $data->AdminUsuario; ?>"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="apellidoper" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control" autocapitalize="on" value="<?php echo $data->AdminEmail; ?>"/>
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col mb-3">
                                <label for="generoper" class="form-label">Género:</label>
                                <?php
                                  if ($data1->CuentaGenero == "Femenino") {
                                    echo '
                                      <div class="form-check mt-0">
                                        <input name="genero" class="form-check-input" type="radio" value="Femenino" id="femeninoPerAdd" checked="">
                                        <label class="form-check-label" for="femenino"> Femenino </label>
                                      </div>
                                      <div class="form-check">
                                        <input name="genero" class="form-check-input" type="radio"  value="Masculino" id="masculinoPerAdd">
                                        <label class="form-check-label" for="masculino"> Masculino </label>
                                      </div>
                                    ';
                                  } else {
                                    echo '
                                      <div class="form-check mt-0">
                                        <input name="genero" class="form-check-input" type="radio" value="Femenino" id="femeninoPerAdd">
                                        <label class="form-check-label" for="femenino"> Femenino </label>
                                      </div>
                                      <div class="form-check">
                                        <input name="genero" class="form-check-input" type="radio"  value="Masculino" id="masculinoPerAdd" checked="">
                                        <label class="form-check-label" for="masculino"> Masculino </label>
                                      </div>
                                    ';
                                  }
                                ?>
                                
                              </div>
                            </div>                  
                            <input type="hidden" name="codigo" value="<?php echo $data->CuentaCodigo; ?>">
                            <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                          </form>
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
    </div>



      <?php include "./modulos/scripts.php"; ?>

      <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
      <script src="<?php echo media; ?>assets/datatables/config.js"></script>
      <script src="<?php echo media; ?>js/editar.js"></script>

  </body>
</html>
