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
        unset($_SESSION['acceso']);

        session_regenerate_id();
                     
        session_destroy();
      }
    ?>
    
<!DOCTYPE html>
<html
  lang="en"
  class="light-style"
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

    <title><?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <!-- Content -->

    <!--Under Maintenance -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
      <div class="d-flex flex-row justify-content-center align-items-center">
              <img class="img-fluid h-auto" style="width: 5%" src="<?php echo media; ?>assets/img/logo1.png" alt="">

            <h2 class="demo menu-text fw-bolder mb-0 ms-4"><?php echo NOMBRE; ?></h2>

      </div>
        <div class="mt-4 mb-4">
          <img
            src="<?php echo media; ?>assets/img/calendar.svg"
            alt="calendario"
            width="500"
            class="img-fluid"
          />
        </div>
        <a class="mt-5" href="login">
        <button class="btn btn-primary btn-lg" type="button">
          <i class="menu-icon tf-icons bx bx-log-in"></i>
            Iniciar Sesión
          </button>
        </a>
      </div>
    </div>
    <!-- /Under Maintenance -->

    <!-- / Content -->

    <?php include "./modulos/scripts.php"; ?>

  </body>
</html>
