$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function () {   //. es clase  #id
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro de eliminar el registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });
    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    RRHH.notificaciones('El registro fue eliminado correctamente', 'RRHH', 'success');
                } else {
                    RRHH.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'RRHH', 'error');
                }
            },
            error: function () {
            }
        });
    }
});