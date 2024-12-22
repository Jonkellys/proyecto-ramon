<?php

  function dashboard($page) {
    if($page == "dashboard") {
      echo'
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
          </a>
        </li>
      ';
    } else {
      echo'
        <li class="menu-item">
          <a href="dashboard" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
          </a>
        </li>
      ';
    }
  }

  function personal($page) {
    if($page == "personal") {
      echo'
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Analytics">Personal</div>
          </a>
        </li>
      ';
    } else {
      echo'
        <li class="menu-item">
          <a href="personal" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Analytics">Personal</div>
          </a>
        </li>
      ';
    }
  }

  function asistencias($page) {
    if($page == "asistencias") {
      echo'
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div data-i18n="Analytics">Asistencias</div>
          </a>
        </li>
      ';
    } else {
      echo'
        <li class="menu-item">
          <a href="asistencias" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div data-i18n="Analytics">Asistencias</div>
          </a>
        </li>
      ';
    }
  }

  function registros($page) {
    if($page == "registros") {
      echo'
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Analytics">Registros</div>
          </a>
        </li>
      ';
    } else {
      echo'
        <li class="menu-item">
          <a href="registros" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Analytics">Registros</div>
          </a>
        </li>
      ';
    }
  }

  function usuarios($page) {
    if($page == "usuarios") {
      echo'
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Cuentas</span>
        </li>
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male"></i>
            <div data-i18n="Analytics">Usuarios</div>
          </a>
        </li>
      ';
    } else {
      echo'
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Cuentas</span>
        </li>
        <li class="menu-item">
          <a href="administradores" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male"></i>
            <div data-i18n="Analytics">Usuarios</div>
          </a>
        </li>
      ';
    }
  }

?>

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

    <ul class="menu-inner py-1 mt-2">
      <!-- Dashboard -->
      <?php dashboard($page) ?>

      <!-- Layouts -->
      
      <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Información</span>
      </li>

      <?php personal($page) ?>

      <?php asistencias($page) ?>

      <?php registros($page) ?>

      <?php
        if($_SESSION['tipo'] == "Administrador") {
          usuarios($page);
        }
      ?>

      <?php include "./modulos/logout.php"; ?>
    </ul>  
  </aside>