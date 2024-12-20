$(document).ready(function () {
  $('#deletePerBtn').click(function (e) {
    e.preventDefault()

    let valor = document.getElementById('deleteCodigo').value
    let tipo = document.getElementById('tipo').value

    var respuesta = document.getElementById('delete')

    $.ajax({
      url: 'http://localhost/sistema-asistencias/conexiones/delete.php?codigo=' + valor + '&tipo=' + tipo,
      type: 'GET',
      data: $(this).val(),
      dataType: 'html',
      processData: false,
      contentType: false,
      success: function (data) {
        respuesta.innerHTML = data
        // console.log(valor);
      },
      error: function (error) {
        respuesta.html('Error: ' + error)
        // console.log("Error: " + error);
      }
    })

    setTimeout(() => {
      location.reload()
    }, 2000)
  })
})
