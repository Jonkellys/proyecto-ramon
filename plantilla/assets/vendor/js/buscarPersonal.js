$(document).ready(function () {
  $('#buscarBoton').click(function (e) {
    e.preventDefault();

    let valor = document.getElementById('buscarPersonal').value;
    let tipo = document.getElementById('tipoBuscar').value;
    let respuesta = document.getElementById('respuesta');

    $.ajax({
      url: 'http://localhost/sistema-asistencias/conexiones/buscarPersonal.php?personal=' + valor + '&tipo=' + tipo,
      type: 'GET',
      data: $(this).val(),
      dataType: 'html',
      processData: false,
      contentType: false,
      success: function (data) {
        respuesta.innerHTML = data;
        // console.log(valor);
      },
      error: function (error) {
        respuesta.html('Error: ' + error);
        // console.log("Error: " + error);
      }
    });
  });
});
