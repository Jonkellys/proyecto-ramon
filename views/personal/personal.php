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
  
  $page = "personal";
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

    <title>Personal | <?php echo NOMBRE;?></title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / </span> Personal</h4>
              
              <div class="demo-inline-spacing">
                <?php
                  if($_SESSION['tipo'] == "Administrador") {
                    echo'<button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                      <span class="tf-icons bx bx-user-plus"></span>   Añadir Personal
                    </button>';
                  }
                ?>
                <a class="btn btn-md btn-info" href="conexiones/PersonalList.php" target="_blank"><i class='bx bxs-file-pdf'></i>   Generar reporte del Personal</a>
              </div>

              <?php
              if($_SESSION['tipo'] == "Administrador") {
                echo'
                <div class="card mt-4">
                  <div class="collapse" id="PerAdd">
                    <div class="card ">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Datos Personales</h4>
                      </div>
                      <div class="card-body form-resto">
                        <form action="' . SERVERURL . 'conexiones/personalReg.php" autocomplete="off" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax d-flex flex-row justify-content-center flex-wrap">
                        <input type="hidden" name="tipo" value="' . $_SESSION["tipo"] . '">
                        
                        <div class="row mb-4 col-4">
                          <label for="nombrePerAdd" class="form-label">Nombre</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" autocapitalize="words" onkeypress="return letras(event)" id="nombrePerAdd" class="form-control" placeholder="Ingresar Nombre" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="apellidoPerAdd" class="form-label">Apellido</label>
                          <div class="col-sm-10">
                            <input type="text" name="apellido" autocapitalize="words" onkeypress="return letras(event)" id="apellidoPerAdd" class="form-control" placeholder="Ingresar Apellido" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="cedulaPerAdd" class="form-label">Cédula</label>
                          <div class="col-sm-10">
                            <input type="text" onkeypress="return numeros(event)" name="cedula" id="cedula" class="form-control" placeholder="Ingresar Cédula" />
                          </div>
                        </div>
                        
                        <div class="row mb-4 col-4">
                          <label for="tituloper" class="form-label">Titulo Académico:</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="titulo" id="tituloper">
                              <option selected disabled="" >Selecciona una opción</option>
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

                        <div class="row mb-4 col-4">
                          <label for="nacionalidadAdd" class="form-label">Nacionalidad</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="nacionalidad" id="nacionalidadper">
                              <option selected disabled="" >Selecciona una opción</option>
                              <option value="Venezolano">Venezolano</option>
                              <option value="Extranjero">Extranjero</option>
                            </select>
                            </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="categoriaper" class="form-label">Categoría:</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="categoria" id="categoriaper">
                              <option selected disabled="" >Selecciona una opción</option>
                              <option value="Diplomático">Diplomático</option>
                              <option value="Profesional">Profesional</option>
                              <option value="Asociado">Asociado</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="cargaFPerAdd" class="form-label">Carga Familiar</label>
                          <div class="col-sm-10">
                            <input type="text" onkeypress="return numeros(event)" name="cargaF" id="cargaF" class="form-control" placeholder="Ingresar Carga Familiar" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="cargoAdd" class="form-label">Cargo</label>
                          <div class="col-sm-10">
                            <input type="text" name="cargo" onkeypress="return letras(event)" class="form-control" placeholder="Ingresar Cargo" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <div class="row-md">
                            <label for="genero" class="form-label">Género</label>
                            <div class="form-check mt-0">
                              <input name="genero" class="form-check-input" type="radio" value="Femenino" id="femeninoPerAdd" checked="">
                              <label class="form-check-label" for="femenino"> Femenino </label>
                            </div>
                            <div class="form-check">
                              <input name="genero" class="form-check-input" type="radio" value="Masculino" id="masculinoPerAdd">
                              <label class="form-check-label" for="masculino"> Masculino </label>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="telefonoPerAdd" class="form-label">Teléfono</label>
                          <div class="col-sm-10">
                            <input type="text" onkeypress="return numeros(event)" name="telefono" id="telefonoPerAdd" class="form-control" placeholder="Ingresar Teléfono" />
                          </div>
                          <div class="mt-2">
                            <div class="form-check">
                              <input class="form-check-input" value="No tiene teléfono" name="noTel" value="" type="checkbox" id="noTelf" />
                              <label class="form-check-label" for="noTelf"> No tiene teléfono </label>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="correoPerAdd" class="form-label">Correo</label>
                          <div class="col-sm-10">
                            <input type="email" name="correo" id="correoPerAdd" class="form-control" placeholder="Ingresar Correo" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="direccionPerAdd" class="form-label">Dirección</label>
                          <div class="col-sm-10">
                            <input type="text" name="direccion" autocapitalize="on" id="direccionPerAdd" class="form-control" placeholder="Ingresar Dirección" />
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="fechanacPerAdd" class="form-label">Fecha de Nacimiento</label>
                          <div class="col-sm-10">
                            <input class="form-control" name="fechaNac" type="date" value="" id="html5-date-input">
                          </div>
                        </div>

                        <div class="row mb-4 col-4">
                          <label for="lugarnacPerAdd" class="form-label">Lugar de Nacimiento</label>
                          <div class="col-sm-10">
                            <input type="text" name="lugarNac" onkeypress="return letras(event)" autocapitalize="words" id="correoAdminAdd" class="form-control" placeholder="Ingresar Lugar de Nacimiento" />
                          </div>
                        </div>

                        <br>
                        <div class="d-grid gap-2 col-12 mx-auto mt-2 bg-blue">
                          <button class="btn btn-primary col-6 mx-auto" id="btn" type="submit">Registrar Personal</button>
                        </div>
                        <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>';
              }
              ?>

              <div class="card mt-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista de Personal</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                  <div id="delete"></div>
                    <table class="table table-hover" style="margin-bottom: 2%;" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cédula</th>
                          <th>Cargo</th>
                          <th>Estado</th>
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
                          $sql = "SELECT * FROM personal";
                          $result = $conn->query($sql);

                          while ($rows = $result->fetch()) {
                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['PersonalNombre'] . "</td>
                                  <td>" . $rows['PersonalApellido'] . "</td>
                                  <td>" . $rows['PersonalCedula'] . "</td>
                                  <td>" . $rows['PersonalCargo'] . "</td>
                                  <td>" . $rows['PersonalEstado'] . "</td>";
                            if($_SESSION['tipo'] == "Administrador") {
                              echo"<td class='mt-0 h-100 d-flex flex-row justify-content-around'>
                                    <a class='btn btn-sm btn-info' href='editar?codigo=" . $rows['PersonalCodigo'] . "'>
                                      <span class='tf-icons bx bx-edit'></span>
                                    </a>

                                    <form action='" . SERVERURL . "conexiones/eliminarPersonal.php?codigo=" . $rows['PersonalCodigo'] . "' autocomplete='off' enctype='multipart/form-data' method='POST' class='DeleteForm'>
                                      <div class='RespuestaAjax'></div>
                                      <button class='btn btn-sm btn-danger'>
                                        <span class='tf-icons bx bx-trash'></span>
                                        </button>
                                    </form>

                                  </td>
                                </tr>";
                            }
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

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/config.js"></script>
    <script src="<?php echo media; ?>js/eliminar.js"></script>
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