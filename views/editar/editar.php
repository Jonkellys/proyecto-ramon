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

  if($_SESSION['tipo'] == "Normal") {
    header('Location: http://localhost/sistema-asistencias/dashboard');
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

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="padding: 4%;">
            <a href="javascript:void(0);" class="app-brand-link">
            <span style="width: 18%; height: 25%;" class="app-brand-logo demo">
              <img style="width: 100%; height: 100%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
            </span>
            <h5 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h5>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Información</span>
            </li>
            <li class="menu-item">
              <a href="personal" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Personal">Personal</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="asistencias" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Registros">Asistencias</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Cuentas</span>
            </li>
            <li class="menu-item">
              <a href="administradores" class="menu-link">
                <i class="menu-icon tf-icons bx bx-male"></i>
                <div data-i18n="Usuarios">Usuarios</div>
              </a>
            </li>
            <?php include "./modulos/logout.php"; ?>
          </ul>
        </aside>
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
                          
                          $sql = $conn->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$codigo'");
                          $sql->execute();
                          $data = $sql->fetch(PDO::FETCH_OBJ);

            ?>

            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold mt-4">Editar los datos de "<?php echo $data->PersonalNombre; ?> <?php echo $data->PersonalApellido; ?>"</h4>

                <div class="row g-0 card" style="flex-direction: row;">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="<?php echo media; ?>assets/img/edit.svg">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                      
                        <a href="personal" class="btn btn-outline-secondary">Volver</a>
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
                  <div class="tab-pane fade show active" id="verDatosPerfil" role="tabpanel">
                    <div class="col-lg-6">                    
                      <div class="mb-4">
                        <div class="mt-1">
                          <div class="list-group list-group-flush" style="width: max-content;">
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Nombre: </strong><?php echo $data->PersonalNombre; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Apellido: </strong><?php echo $data->PersonalApellido; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Cédula: </strong><?php echo $data->PersonalCedula; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Titulo Académico: </strong><?php echo $data->PersonalTituloAcad; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Nacionalidad: </strong><?php echo $data->PersonalNacionalidad; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Categoría: </strong><?php echo $data->PersonalCategoria; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Carga Familiar: </strong><?php echo $data->PersonalCargaFam; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Género: </strong><?php echo $data->PersonalGenero; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Teléfono: </strong><?php echo $data->PersonalTelefono; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Correo: </strong><?php echo $data->PersonalCorreo; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Dirección: </strong><?php echo $data->PersonalDireccion; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Lugar de Nacimiento: </strong><?php echo $data->PersonalLugarNac; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Fecha de Nacimiento: </strong><?php echo $data->PersonalFechaNac; ?></div>
                            <div class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Estado: </strong><?php echo $data->PersonalEstado; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="tab-pane fade" id="editarDatosPerfil" role="tabpanel">
                    <h4>Editar Datos</h4>
                    <form action="<?php echo SERVERURL; ?>conexiones/updatePersonal.php" enctype="multipart/form-data" method="POST" data-form="update" class="FormularioAjax">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nombreper" class="form-label">Nombre:</label>
                          <input type="text" onkeypress="return letras(event)" name="nombre" class="form-control" autocapitalize="" value="<?php echo $data->PersonalNombre; ?>" placeholder="Cambiar Nombre"/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="apellidoper" class="form-label">Apellido:</label>
                          <input type="text" onkeypress="return letras(event)" name="apellido" class="form-control" autocapitalize="" value="<?php echo $data->PersonalApellido; ?>" placeholder="Cambiar Apellido"/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="cedulaper" class="form-label">Cédula</label>
                          <input type="text" onkeypress="return numeros(event)" name="cedula" class="form-control" id="cedula" value="<?php echo $data->PersonalCedula; ?>" placeholder="Cambiar Cédula"/>
                        </div>
                      </div>

                      <div class="row mb-3">
                          <label for="tituloper" class="form-label">Titulo Académico:</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="titulo" id="tituloper">
                              <option selected value="<?php echo $data->PersonalTituloAcad; ?>" ><?php echo $data->PersonalTituloAcad; ?></option>
                              <option value="Bachiller">Bachiller</option>
                              <option value="Técnico Medio">Técnico Medio</option>
                              <option value="TSU (Técnico Superior Universitario)">TSU (Técnico Superior Universitario)</option>
                              <option value="Licenciatura">Licenciatura</option>
                              <option value="Universitario">Universitario</option>
                              <option value="Especialidad">Especialidad</option>
                              <option value="Maestría">Maestría</option>
                              <option value="Doctorado">Doctorado</option>
                              <option value="Post Doctorado">Post Doctorado</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="nacionalidadAdd" class="form-label">Nacionalidad</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="nacionalidad" id="nacionaidadper">
                              <option selected value="<?php echo $data->PersonalNacionalidad; ?>" ><?php echo $data->PersonalNacionalidad; ?></option>
                              <option value="Venezolano">Venezolano</option>
                              <option value="Extranjero">Extranjero</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="categoriaper" class="form-label">Categoría:</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="categoria" id="categoriaper">
                              <option selected value="<?php echo $data->PersonalCategoria; ?>" ><?php echo $data->PersonalCategoria; ?></option>
                              <option value="Diplomático">Diplomático</option>
                              <option value="Profesional">Profesional</option>
                              <option value="Asociado">Asociado</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="cargaFPerAdd" class="form-label">Carga Familiar</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $data->PersonalCargaFam; ?>" onkeypress="return numeros(event)" name="cargaF" id="cargaF" class="form-control" placeholder="Ingresar Carga Familiar" />
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

                      <div class="row">
                        <div class="col mb-3">
                          <label for="telefonoper" class="form-label">Teléfono:</label>
                          <input type="text" onkeypress="return numeros(event)" name="telefono" class="form-control" value="<?php echo $data->PersonalTelefono; ?>" placeholder="Cambiar Teléfono"/>
                        </div>
                        <div class="mb-1">
                          <div class="form-check">
                            <input class="form-check-input" value="No tiene teléfono" name="noTel"  value="" type="checkbox" id="noTelf" />
                            <label class="form-check-label" for="noTelf"> No tiene teléfono </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="correoper" class="form-label">Correo:</label>
                          <input type="email" name="correo" class="form-control" value="<?php echo $data->PersonalCorreo; ?>" placeholder="Cambiar Correo"/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="direccionper" class="form-label">Dirección:</label>
                            <input type="text" name="direccion" class="form-control" autocapitalize="" value="<?php echo $data->PersonalDireccion; ?>" placeholder="Cambiar Dirección"/>
                          </div>
                        </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="lugarper" class="form-label">Lugar de Nacimiento:</label>
                          <input type="text" onkeypress="return letras(event)" name="lugarNac" class="form-control" autocapitalize="" value="<?php echo $data->PersonalLugarNac; ?>" placeholder="Ingresar Lugar de Nacimiento" />
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="fechaper" class="form-label">Fecha de Nacimiento:</label>
                          <input class="form-control" name="fechaNac" type="date"  value="<?php echo $data->PersonalFechaNac; ?>" id="html5-date-input">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col mb-3">
                          <label for="estadoper" class="form-label">Estado:</label>
                          <select class="form-select" name="estado" id="estadoper">
                            <option value="<?php echo $data->PersonalEstado; ?>" selected id="activo" ><?php echo $data->PersonalEstado; ?></option>
                            <option value="Activo" id="activo" >Activo</option>
                            <option value="Con Permiso Médico" id="medico">Con permiso médico</option>
                          </select>
                         </div>
                      </div>
                            
                      <div class="d-grid gap-2 col-lg-6 mx-auto">
                       <input type="hidden" name="codigo" value="<?php echo $data->PersonalCodigo; ?>">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                      </div>
                      <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
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
      <script>
      $("#cedula").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
          $(event.target).val(function (index, value ) {
                return value.replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
            }
      });

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

      function numeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8){
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>
  </body>
</html>
