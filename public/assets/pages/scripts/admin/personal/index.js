$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarPersonal', form);//cuando aceptamos eliminar, la funcion se llamara eliminarPersonal
            }
        });
    }); 

    $('.ver-personal').on('click', function (event) { //.ver-personal es el nombre de la clase del icono de foto
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verPersonal');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'eliminarPersonal') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        RRHH.notificaciones('El registro fue eliminado correctamente', 'RRHH', 'success');
                    } else {
                        RRHH.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'RRHH', 'error');
                    }
                } else if (funcion == 'verPersonal') {
                    $('#modal-ver-personal .modal-body').html(respuesta)
                    $('#modal-ver-personal').modal('show');
                }
            },
            error: function () {
            }
        });
    }
});