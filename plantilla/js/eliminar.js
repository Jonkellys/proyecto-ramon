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

  $('.AdminDelForm').submit(function (e) {
    e.preventDefault()

    var form = $('form').get(0)
    var formu = $(this)

    var tipo = formu.attr('data-form')
    var accion = formu.attr('action')
    var metodo = formu.attr('method')
    var respuesta = formu.children('.RespuestaAjax')

    var msjError = "<script>new swal('Ocurrió un error inesperado', 'Por favor actualice la página', 'error');</script>"

    new swal({
      title: '¿Estás seguro?',
      text: 'Los datos se eliminarán del sistema',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      confirmButtonColor: '#fc3c51',
      cancelButtonText: 'Cancelar'
    }).then(result => {
      if (result.isConfirmed) {
        $.ajax({
          url: accion,
          type: metodo,
          data: new FormData(form),
          processData: false,
          contentType: false,
          beforeSend: function () {},
          success: function (data) {
            respuesta.html(data)
          },
          error: function () {
            respuesta.html(msjError)
          }
        })
      } else if (result.isDenied) {
      }
    })
  })
})
