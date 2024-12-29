$(document).ready(function () {
  $('.UpdateForm').submit(function (e) {
    e.preventDefault()

    var form = $('form').get(0)
    var formu = $(this)

    var tipo = formu.attr('data-form')
    var accion = formu.attr('action')
    var metodo = formu.attr('method')
    var respuesta = formu.children('.RespuestaAjax')

    var msjError = "<script>new swal('Ocurrió un error inesperado', 'Por favor actualice la página', 'error');</script>"
    var msjsuccess = "<script>new swal('¡Éxito!', 'Datos actualizados correctamente', 'success');</script>"

    new swal({
      title: '¿Estás seguro?',
      text: 'Los datos se actualizarán del sistema',
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

    setTimeout(() => {
      location.reload()
    }, 4000)
  })
})
