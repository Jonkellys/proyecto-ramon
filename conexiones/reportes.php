<?php
  require_once "./funciones.php";

  if(isset($_GET['tipo'])) {
    $tipo = strClean($_GET['tipo']);

    if($tipo == "Personal") {
      echo '
        <p class="w-100 ms-2 mt-3">Opciones</p>
        <div class="mb-3 mx-1">
          <label class="form-label">Personal</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="personalRadio">
            </div>
            <select class="form-select" name="personalInput">
              <option value="Todos" selected>Todos</option>';

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                              
                $query = "SELECT * FROM personal ORDER BY PersonalNombre ASC";
                $result = $conn->query($query);
                              
                while ($rows = $result->fetch()) {
                  echo '<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                };  

            echo ' 
            </select>
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Título Académico</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="tituloRadio">
            </div>
            <select class="form-select" name="tituloInput">
              <option value="Todos" selected>Todos</option>
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

        <div class="mb-3 mx-1">
          <label class="form-label">Nacionalidad</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="nacionRadio">
            </div>
            <select class="form-select" name="nacionInput">
              <option value="Todos" selected>Todos</option>
              <option value="Venezolano">Venezolano</option>
              <option value="Extranjero">Extranjero</option>
            </select>
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Categoría</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="categoriaRadio">
            </div>
            <select class="form-select" name="categoriaInput">
              <option value="Todos" selected>Todos</option>
              <option value="Diplomático">Diplomático</option>
              <option value="Profesional">Profesional</option>
              <option value="Asociado">Asociado</option>
            </select>
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Género</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="generoRadio">
            </div>
            <select class="form-select" name="generoInput">
              <option value="Todos" selected>Todos</option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
            </select>
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Estado</label>
          <div class="input-group">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="checkbox" value="on" name="estadoRadio">
            </div>
            <select class="form-select" name="estadoInput">
              <option value="Todos" selected>Todos</option>
              <option value="Activo">Activo</option>
              <option value="Con Permiso Médico">Con Permiso Médico</option>
            </select>
          </div>
        </div>
      ';
    } else if($tipo == "Asistencias") {
      echo '
        <p class="w-100 ms-2 mt-3">Opciones</p>
        <div class="mb-3 mx-1">
          <label class="form-label">Personal</label>
          <div class="input-group">
            <select class="form-select" name="personalInput">
              <option value="Todos" selected>Todos</option>';

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                              
                $query = "SELECT * FROM personal ORDER BY PersonalNombre ASC";
                $result = $conn->query($query);
                              
                while ($rows = $result->fetch()) {
                  echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                };
                 
            echo '
            </select>
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Desde:</label>
          <div class="input-group">
            <input class="form-control" required name="desdeInput" type="date">
          </div>
        </div>

        <div class="mb-3 mx-1">
          <label class="form-label">Hasta:</label>
          <div class="input-group">
          <input class="form-control" required name="hastaInput" type="date">
          </div>
        </div>
      </div>
      ';
    }
  }

?>