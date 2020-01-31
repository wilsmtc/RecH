$('.usuario_rol').on('change', function () {
    var data = {
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/usuario-rol', data);
});

function ajaxRequest (url, data) {
    $.ajax({
        url: url,   
        type: 'POST',
        data: data,
        success: function (respuesta) {
            RRHH.notificaciones(respuesta.respuesta, 'RRHH', 'success');
        }
    });
}